<?php

namespace App\Console\Commands;

use App\Jobs\ImportPhotoUrlsCsvJob;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImportPhotoUrlsCsvCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $baseUrl = 'https://feeds.firstteam.com/suited/PHOTOURLS.CSV';
    protected $signature = 'lbs:import-photo-urls-csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command will import photo urls from the csv file available at https://feeds.firstteam.com/suited/PHOTOURLS.CSV';

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
       // DB::table('jobs')->truncate();
        $this->downloadCsv();
        $this->createFileChunks();
        $this->dispatchJobs();
        return 0;
    }


    protected function downloadCsv()
    {
        $baseFile = ('imports/photo_urls_csv.csv');
        Storage::disk('public_uploads')->put($baseFile,file_get_contents($this->baseUrl));
    }

    protected function createFileChunks()
    {
        $baseFile = file(public_path('imports/photo_urls_csv.csv'));
        $parts = (array_chunk($baseFile, 50000));
        $today=Carbon::now()->format('Y_m_d');
        File::deleteDirectory(public_path('imports/photo_urls/'.$today));
        $partPath='imports/photo_urls/'.$today.'/';

        foreach ($parts as $key => $part) {
            $fileName = 'property_part_' . $key . '.csv';
            Storage::disk('public_uploads')->put($partPath . $fileName, $part);
        }
    }

    protected function dispatchJobs(){

        $today=Carbon::now()->format('Y_m_d');
        $partPath='imports/photo_urls/'.$today.'/';
        $paths = public_path($partPath);
        $path = ($paths.'*.csv');
        $global = glob($path);
        natsort($global);
        DB::table('photo_urls')->truncate();
        foreach ($global as $globalKey => $file) {

            $fileOrigin=1;
            if ( $globalKey == 0 ){
                $fileOrigin= explode('_',basename($file, '.csv'));
                $fileOrigin=((int)end($fileOrigin));
            }
            dispatch(new ImportPhotoUrlsCsvJob($file,$fileOrigin,$globalKey));
        }
    }

}
