<?php

namespace App\Jobs;

use App\Models\PhotoUrl;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ImportPhotoUrlsCsvJob implements ShouldQueue
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
        $insert = new PhotoUrl();

        $insert->sMLS_id = $row[0];
        $insert->PhotoURL = $row[1];
        $insert->sPrimary_fl = $row[2];
        try {
            $insert->save();
        } catch (\Throwable $th) {
           Log::info('insert failed in property table having ID: '.$row[0]);
           Log::info('insert property failed error: '.$th->getMessage());
        }
    }




}
