<?php

namespace App\Console\Commands;

use App\Models\PropertyListing;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class FirstTeamFilterSync extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lbs:first-team-filter-generator';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $stringiFyFilter = $this->getViewBladeDataFilter();
        Storage::disk('localViewPath')->put('first_team_filters/property-filter.blade.php', $stringiFyFilter);
        $this->city_county_tag();
    }

 

    public function city_county_tag()
    {
        $county_ = DB::table('property_listings_views')->select('county')->distinct()->pluck('county')->toArray();
        $city_ = DB::table('property_listings_views')->select('city')->distinct()->pluck('city')->toArray();
        $address_ = PropertyListing::select('szAddress_nm')->pluck('szAddress_nm')->toArray();
        $zipCode_ = PropertyListing::select('sZip_cd')->where('sZip_cd', '!=',0)->distinct()->pluck('sZip_cd')->toArray();
        $szMLS_no_  = PropertyListing::select('szMLS_no')->distinct()->pluck('szMLS_no')->toArray();

        $county_= array_values(array_filter($county_));
        $city_= array_values(array_filter($city_));
        $address_= array_values(array_filter($address_));
        $zipCode_= array_values(array_filter($zipCode_));
        $szMLS_no_= array_values(array_filter($szMLS_no_));

        array_walk($zipCode_, function(&$v){ $v = (string)$v; });

        $tmpCounty=[];
        foreach ($county_ as $key => $value) {
            $tmpCounty[]=$value.' -county';
        }
        $county_=$tmpCounty;


        $tmpCity=[];
        foreach ($city_ as $key => $value) {
            $tmpCity[]=$value.' -city';
        }
        $city_=$tmpCity;



        $city_county_=array_merge($county_,$city_ );
        $city_county_address=array_merge($city_county_,$address_ );
        $city_county_address_zip=array_merge($city_county_address,$zipCode_ );

        $county_file = ('search/county_file.txt');
        $city_file = ('search/city_file.txt');
        $city_county_file = ('search/city_county_file.txt');
        $city_county_address_file = ('search/city_county_address_file.txt');
        $city_county_address_zip_file = ('search/city_county_address_zip_file.txt');

        Storage::disk('public_uploads')->put($county_file,json_encode(array_filter($county_)));
        Storage::disk('public_uploads')->put($city_file,json_encode(array_filter($city_)));
        Storage::disk('public_uploads')->put($city_county_file,json_encode(array_filter($city_county_)));
        Storage::disk('public_uploads')->put($city_county_address_file,json_encode(array_filter($city_county_address)));
        Storage::disk('public_uploads')->put($city_county_address_zip_file,json_encode(array_filter($city_county_address_zip)));

        $whitelist= json_encode($city_county_address_zip);
        $szMLS_no_= json_encode($szMLS_no_);
        $whitelistView=View::make('first_team_filters.tmp.togify-whitelist', compact('whitelist','szMLS_no_'))->render();
        Storage::disk('public_uploads')->put('frontend/js/togify_script.js', $whitelistView);
    }
    public function getViewBladeDataFilter()
    {
        $just_listed = DB::table('aminities_views')->where('just_listed',1)->count();
        $views = DB::table('aminities_views')->where('views',1)->count();
        $pool = DB::table('aminities_views')->where('pool',1)->count();
        $adult55 = DB::table('aminities_views')->where('adult55',1)->count();
        $waterfront = DB::table('aminities_views')->where('waterfront',1)->count();
        $fixerupper = DB::table('aminities_views')->where('fixerupper',1)->count();
        $horse_property = DB::table('aminities_views')->where('horse_property',1)->count();
        $newly_built = DB::table('aminities_views')->where('newly_built',1)->count();
        $seller_finiancing = DB::table('aminities_views')->where('seller_finiancing',1)->count();
        $fore_closure = DB::table('aminities_views')->where('fore_closure',1)->count();
        $nohoefee = DB::table('aminities_views')->where('nohoefee',1)->count();
        $s1story = DB::table('aminities_views')->where('s1story',1)->count();
        $s2stories = DB::table('aminities_views')->where('s2stories',1)->count();
        $s3stories = DB::table('aminities_views')->where('s3stories',1)->count();
        $sFireplace = DB::table('aminities_views')->where('sFireplace',1)->count();
        $sBasement = DB::table('aminities_views')->where('sBasement',1)->count();
        $master_onMain = DB::table('aminities_views')->where('master_onMain',1)->count();
        $sAirconditioning = DB::table('aminities_views')->where('sAirconditioning',1)->count();
        $sDeck = DB::table('aminities_views')->where('sDeck',1)->count();
        $sFurnished = DB::table('aminities_views')->where('sFurnished',1)->count();
        $sAllowsPets = DB::table('aminities_views')->where('sAllowsPets',1)->count();
        $sGolfCourse = DB::table('aminities_views')->where('sGolfCourse',1)->count();

        $county=DB::table('property_listings_views')->groupBy('county')->get('county');
        foreach($county as $county_key=>$county_value)
        {
            $county_count = DB::table('property_listings_views')->where('county',$county_value->county)->count();
            $county_name[$county_value->county]=$county_count;
        }
        $property_type=DB::table('property_listings_views')->groupBy('property_type')->get('property_type');
        foreach($property_type as $property_key=>$property_value)
        {
            $property_type_count = DB::table('property_listings_views')->where('property_type',$property_value->property_type)->count();
            $property_type_name[$property_value->property_type]=$property_type_count;
        }
        $bathroom1 = DB::table('property_listings_views')->where('bathroom1',1)->count();
        $bathroom2 = DB::table('property_listings_views')->where('bathroom2',1)->count();
        $bathroom3 = DB::table('property_listings_views')->where('bathroom3',1)->count();
        $bathroom4 = DB::table('property_listings_views')->where('bathroom4',1)->count();
        $bathroom5plus = DB::table('property_listings_views')->where('bathroom5plus',1)->count();
        $bedroom1 = DB::table('property_listings_views')->where('bedroom1',1)->count();
        $bedroom2 = DB::table('property_listings_views')->where('bedroom2',1)->count();
        $bedroom3 = DB::table('property_listings_views')->where('bedroom3',1)->count();
        $bedroom4 = DB::table('property_listings_views')->where('bedroom4',1)->count();
        $bedroom5plus = DB::table('property_listings_views')->where('bedroom5plus',1)->count();

        $carspace1 = DB::table('property_additionals_views')->where('carspace1',1)->count();
        $carspace2 = DB::table('property_additionals_views')->where('carspace2',1)->count();
        $carspace3 = DB::table('property_additionals_views')->where('carspace3',1)->count();
        $carspace4 = DB::table('property_additionals_views')->where('carspace4',1)->count();
        $carspace5plus = DB::table('property_additionals_views')->where('carspace5plus',1)->count();
        $total_property=0;

        return View::make('first_team_filters.tmp.first-team-filter-tmp', compact(
            'total_property',
            'just_listed',
            'views',
            'pool',
            'adult55',
            'waterfront',
            'fixerupper',
            'horse_property',
            'newly_built',
            'seller_finiancing',
            'fore_closure',
            'nohoefee',
            's1story',
            's2stories',
            's3stories',
            'sFireplace',
            'sBasement',
            'master_onMain',
            'sAirconditioning',
            'sDeck',
            'sFurnished',
            'sAllowsPets',
            'sGolfCourse',
            'county',
            'county_name',
            'property_type',
            'property_type_name',
            'bathroom1',
            'bathroom2',
            'bathroom3',
            'bathroom4',
            'bathroom5plus',
            'bedroom1',
            'bedroom2',
            'bedroom3',
            'bedroom4',
            'bedroom5plus',
            'carspace1',
            'carspace2',
            'carspace3',
            'carspace4',
            'carspace5plus'

        ))->render();
    }
}
