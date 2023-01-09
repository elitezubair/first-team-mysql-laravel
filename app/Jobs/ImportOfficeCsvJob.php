<?php

namespace App\Jobs;

use App\Models\Office;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ImportOfficeCsvJob implements ShouldQueue
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
        $insert = new Office();

        $insert->OfficeID=(int)trim($row[1]);
        $insert->OfficeName=$row[0];
        $insert->Address1=$row[2];
        $insert->Address2=$row[3];
        try {
            $insert->save();
        } catch (\Throwable $th) {
            Log::info('insert failed in office table having ID: '.$row[0]);
            Log::info('insert office failed error: '.$th->getMessage());
        }
    }
}
