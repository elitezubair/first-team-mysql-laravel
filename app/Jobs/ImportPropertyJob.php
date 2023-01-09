<?php

namespace App\Jobs;

use App\Models\PropertyListing;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ImportPropertyJob implements ShouldQueue
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
       $this->FunctionName();
    }

    protected function FunctionName()
    {
        $data = array_map(function ($v) {
            return str_getcsv($v, ",");
        }, file($this->file));

        foreach ($data as $key => $row) {

            if ($this->fileOrigin == 0 and $key== 0) {
                continue;
            }else{
                
            }
            $this->storeInfo($row);
        }

        if (File::exists($this->file)) {
            File::delete($this->file);
        }
    }

    protected function storeInfo($row)
    {
        $insert = new PropertyListing();

        $insert->iCounter_no = $row[0];
        $insert->szMLS_no = $row[1];
        $insert->sStatus_cd = $row[2];
        $insert->sSingleStatus_cd = $row[3];
        $insert->iPropType_id = $row[4];
        $insert->szPropType_cd = $row[5];
        $insert->szAddress_nm = $row[6];
        $insert->szUnit_no = $row[7];
        $insert->iArea_cd = $row[8];
        $insert->szSubArea_nm = $row[9];
        $insert->szCity_nm = $row[10];
        $insert->sZip_cd = $row[11];
        $insert->iBR_no = $row[12];
        $insert->dBath_no = $row[13];
        $insert->iSqFt_no = $row[14];
        $insert->iYearBuilt_no = $row[15];
        $insert->mListPrice_amt = $row[16];
        $insert->mPrice_amt = $row[17];
        $insert->iLease_fl = $row[18];
        $insert->iInternetAd_fl = $row[19];
        $insert->dtList_dt = $row[20];
        $insert->dtPending_dt = $row[21];
        $insert->dtSold_dt = $row[22];
        $insert->szListingAgent_id = $row[23];
        $insert->szListingAgent_nm = $row[24];
        $insert->szListingAgent_DRE = $row[25];
        $insert->sListingAgentPager_no = $row[26];
        $insert->sListingAgentHomePhone_no = $row[27];
        $insert->sListingAgentCellPhone_no = $row[28];
        $insert->szListingAgentEMail_nm = $row[29];
        $insert->szListingOffice_id = $row[30];
        $insert->szListingOffice_nm = $row[31];
        $insert->lListingOffice_sk = $row[32];
        $insert->szSellingAgent_id = $row[33];
        $insert->szSellingAgent_nm = $row[34];
        $insert->szSellingAgent_DRE = $row[35];
        $insert->szSellingOffice_id = $row[36];
        $insert->szSellingOffice_nm = $row[37];
        $insert->lSellingOffice_sk = $row[38];
        $insert->szCoListingAgent_id = $row[39];
        $insert->szCoListingAgent_nm = $row[40];
        $insert->szCoListingAgent_DRE = $row[41];
        $insert->szCoListingOffice_id = $row[42];
        $insert->szCoListingOffice_nm = $row[43];
        $insert->szCoSellingAgent_id = $row[44];
        $insert->szCoSellingAgent_nm = $row[45];
        $insert->szCoSellingAgent_DRE = $row[46];
        $insert->szCoSellingOffice_id = $row[47];
        $insert->szCoSellingOffice_nm = $row[48];
        $insert->dtOffMarket_dt = $row[49];
        $insert->iDaysOnMarket_no = $row[50];
        $insert->dtWithdrawn_dt = $row[51];
        $insert->dtExpired_dt = $row[52];
        $insert->dtTransaction_dt = $row[53];
        $insert->szBoard_nm = $row[54];
        $insert->szLastUpdate_id = $row[55];
        $insert->dtLastUpdate_dt = $row[56];
        $insert->szCounty_nm = $row[57];
        $insert->sState_cd = $row[58];
        $insert->longtitude = $row[59];
        $insert->latitude = $row[60];
        $insert->sHotBuys_fl = $row[61];
        $insert->VirtualTourURL = $row[62];
        $insert->szPropertyDescription_nm = utf8_encode($row[63]);

        try {
            $insert->save();
        } catch (\Throwable $th) {
           Log::info('insert failed in property table having ID: '.$row[0]);
           Log::info('insert property failed error: '.$th->getMessage());
        }
    }
}
