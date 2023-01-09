<?php

namespace App\Jobs;

use App\Models\PropertyAdditional;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ImportPropertyAdditionalInfoCsvJob implements ShouldQueue
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

        $insert = new PropertyAdditional();

        $insert->szMLS_no=trim($row[0]);
        $insert->fTotalUnits=$row[1];
        $insert->szMLSArea=$row[2];
        $insert->sHeating=$row[3];
        $insert->szHeatingTypes=$row[4];
        $insert->sPropertyAttached=$row[5];
        $insert->szCommonWalls=$row[6];
        $insert->szLaundyFeatures=$row[7];
        $insert->sPrivatePool=$row[8];
        $insert->szPoolFeatures=$row[9];
        $insert->szFlooringType=$row[10];
        $insert->szInteriorFeatures=$row[11];
        $insert->szLotFeatures=$row[12];
        $insert->szLotSizeAcres=$row[13];
        $insert->fLotSizeAcres=$row[14];
        $insert->szLotSizeSource=$row[15];
        $insert->sLotSizeUnits=$row[16];
        $insert->fLotSizeSQFT=$row[17];
        $insert->szParkingFeatures=$row[18];
        $insert->iTotalParking=$row[19];
        $insert->szWaterSource=$row[20];
        $insert->szSewer=$row[21];
        $insert->szCoolingType=$row[22];
        $insert->sCooling=$row[23];
        $insert->szFinance=$row[24];
        $insert->szAppliances=$row[25];
        $insert->sHOA=$row[26];
        $insert->dHOAFee=$row[27];
        $insert->szCommunityFeatures=$row[28];
        $insert->sLandLease=$row[29];
        $insert->sLevels=$row[30];
        $insert->szHSDistrict=$row[31];
        $insert->szZoning=$row[32];
        $insert->sPatio=$row[33];
        $insert->szPatio=$row[34];
        $insert->szSubdivisionName=$row[35];
        try {
            $insert->save();
        } catch (\Throwable $th) {
           Log::info('insert failed in property addition info table having ID: '.$row[0]);
           Log::info('insert property addition info failed error: '.$th->getMessage());
        }
    }
}
