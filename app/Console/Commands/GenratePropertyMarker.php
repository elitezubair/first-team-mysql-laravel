<?php

namespace App\Console\Commands;

use App\Models\PropertyListing;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Rifrocket\LaravelCmsV2\Models\LbsAppSetting;

class GenratePropertyMarker extends Command
{

    protected $markerHolder=[];
    protected $markerCenterCoordinate=[];
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lbs:generate-map-markers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will generate json data for map marker';
 
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {


        $markers = $this->generateCluster();
        $center = $this->getCenterLatLng($this->markerCenterCoordinate);

        $markerFile = ('maps/map_marker.txt');
        $centerFile = ('maps/map_center.txt');
        Storage::disk('public_uploads')->put($markerFile,json_encode($markers));
        Storage::disk('public_uploads')->put($centerFile,json_encode($center));
        return 0;
    }


    protected function generateCluster()
    {
        $markers = [];

        PropertyListing::with(['images'])->orderBy('id', 'desc')
        ->select('id', 'szMLS_no', 'szCity_nm', 'longtitude', 'latitude', 'sStatus_cd', 'szPropType_cd', 'mListPrice_amt', 'szAddress_nm', 'iBR_no', 'dBath_no', 'iSqFt_no', 'iDaysOnMarket_no')
        ->chunk(50000, function ($clusters) {
            foreach ($clusters as $key => $cluster) {
                if ($key==0) {
                  $this->markerCenterCoordinate[]=['Location' => ['Latitude' => $cluster->latitude, 'Longitude' => $cluster->longtitude]];
                }
                $image = null;
                if (isset($cluster->images[0])) {
                    $image = $cluster->images[0]->PhotoURL;
                    $this->markerHolder[] = [
                        'id' => $cluster->id,
                        'Name' => 'NA',
                        'Code' => $cluster->szMLS_no,
                        'Status' => $cluster->sStatus_cd,
                        'City' => $cluster->szCity_nm,
                        'Address' => $cluster->szAddress_nm,
                        'Location' => ['Latitude' => $cluster->latitude, 'Longitude' => $cluster->longtitude],
                        'P_image' => $image,
                        'PropertyFeatures' => ['Bath' => $cluster->dBath_no, 'Bed' => $cluster->iBR_no, 'Sqf' => $cluster->iSqFt_no, 'Price' => $cluster->mListPrice_amt, 'Type' => $cluster->szPropType_cd],
                    ];

                }

            }

        });

        return $this->markerHolder;
    }

    protected  function getCenterLatLng($coordinates)
    {
        $x = $y = $z = 0;
        $n = count($coordinates);
        foreach ($coordinates as $point)
        {
            $lt = $point['Location']['Latitude'] * pi() / 180;
            $lg = $point['Location']['Longitude'] * pi() / 180;
            $x += cos($lt) * cos($lg);
            $y += cos($lt) * sin($lg);
            $z += sin($lt);
        }
        $x /= $n;
        $y /= $n;

        return [atan2(($z / $n), sqrt($x * $x + $y * $y)) * 180 / pi(), atan2($y, $x) * 180 / pi()];
    }
}
