<?php

namespace App\Jobs;

use App\Models\Agentroster;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ImportAgentrosterCsvJob implements ShouldQueue
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
        // $response=Http::get($row[1]);
        // $responseCode = $response->status();

        // if ($responseCode == 404) {
        //     var_dump($row[0]);
        //     var_dump($row[1]);
        //     Log::info($row[0].'-->'.$row[1]);
        //    return 0;
        // }
        $insert = new Agentroster();

        $exploded = explode(')', $row[4]);
        $mobile_num=str_replace(" ","", $exploded[1]);
        $mobile_code=str_replace([" ",'('],"", $exploded[0]);
        $insert ->firstname=$row[0];
        $insert ->lastname=$row[1];
        $insert ->email=$row[2];
        $insert ->ImagePath=$row[3];
        $insert ->MobileNo=$mobile_num;
        $insert ->MobileNo_code=$mobile_code;
        $insert ->OfficePhone=$row[5];
        $insert ->WebSite=$row[6];
        $insert ->license=(int)$row[7];
        $insert ->OfficeName=$row[8];
        $insert ->OfficeID=$row[9];
        $insert ->agentID=$row[10];
        try {
            $insert->save();
        } catch (\Throwable $th) {
           Log::info('insert failed in agent roaster table having ID: '.$row[0]);
           Log::info('insert agent roaster failed error: '.$th->getMessage());
        }
    }


}
