<?php

namespace App\Jobs;

use App\Models\Amenity;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ImportAmenitiesCsvJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $file, $fileOrigin, $globalKey;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($file, $fileOrigin, $globalKey)
    {
        $this->file = $file;
        $this->fileOrigin = $fileOrigin;
        $this->globalKey = $globalKey;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       $this->startJob();
    }

    protected function startJob()
    {
        $data = array_map(function ($v) {
            return str_getcsv($v, ",");
        }, file($this->file));

        foreach ($data as $key => $row) {

            if ($this->fileOrigin == 0 and $key== 0) {
                continue;
            }
            $this->storeInfo($row);
        }
        if (File::exists($this->file)) {
            File::delete($this->file);
        }
    }

    protected function storeInfo($row)
    {

        $insert = new Amenity();
        $insert->szMLS_no=trim(str_replace(' ','',$row[0]));
        $insert->sJustListed=$row[1];
        $insert->sPriceReduced=$row[2];
        $insert->sViews=$row[3];
        $insert->sSpa=$row[4];
        $insert->sPool=$row[5];
        $insert->sGolfCourse=$row[6];
        $insert->sFireplace=$row[7];
        $insert->sAirconditioning=$row[8];
        $insert->sAdult55Plus=$row[9];
        $insert->sOpenHouse=$row[10];
        $insert->sDeck=$row[11];
        $insert->sWaterFront=$row[12];
        $insert->sBasement=$row[13];
        $insert->sMasterOnMain=$row[14];
        $insert->sHorseProperty=$row[15];
        $insert->sFixerUpper=$row[16];
        $insert->sNewlyBuilt=$row[17];
        $insert->sForeclosures=$row[18];
        $insert->sShortSales=$row[19];
        $insert->sNoHOAFees=$row[20];
        $insert->sSellerFinancing=$row[21];
        $insert->sFurnished=$row[22];
        $insert->sAllowsPets=$row[23];
        $insert->s1CarGarage=$row[24];
        $insert->s2CarGarage=$row[25];
        $insert->s3CarGarage=$row[26];
        $insert->s1Storey=$row[27];
        $insert->s2Stories=$row[28];
        $insert->s3Stories=$row[29];
        try {
            $insert->save();
        } catch (\Throwable $th) {
           Log::info('insert failed in property amenity table having ID: '.$row[0]);
           Log::info('insert property amenity failed error: '.$th->getMessage());
        }
    }
}
