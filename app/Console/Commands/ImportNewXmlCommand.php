<?php

namespace App\Console\Commands;


use Carbon\Carbon;
use DOMDocument;
use DOMXPath;
use App\Jobs\ImportNewsXmlJob;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImportNewXmlCommand extends Command
{
    /** 
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $baseUrls = ['http://www.firstteam.com/category/selling/feed', 'http://www.firstteam.com/category/buying/feed', 'http://www.firstteam.com/category/get-local/feed'];
    protected $signature = 'lbs:import-news-feeds-xml';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command will import news-feeds available at https://www.firstteam.com/feed ';

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
        $items = $this->downloadXML();
        $this->createFileChunks($items);
        $this->dispatchJobs();
        return 0;
    }


    protected function downloadXML()
    {

        $items = [];
        foreach ($this->baseUrls as  $baseUrl) {

            $xml = file_get_contents($baseUrl);
            $document = new DOMDocument();
            $document->loadXML($xml);
            $xpath = new DOMXPath($document);


            foreach ($xpath->evaluate('//item') as $tableNode) {

                $description = $xpath->evaluate("string(description)", $tableNode);

                try {
                    $doc = new DOMDocument();
                    $doc->loadHTML($description);
                    $tags = $doc->getElementsByTagName('img');
                    $banner_image=$tags[0]->getAttribute('src');
                } catch (\Throwable $th) {
                    $banner_image=URL('frontend/images/ns1.jpeg');
                }


                $items[] = [
                    'title' => trim($xpath->evaluate('string(title)', $tableNode)),
                    'banner_image' =>$banner_image,
                    'link' => trim($xpath->evaluate('string(link)', $tableNode)),
                    'description' => $description,
                    'content' => trim($xpath->evaluate('string(content:encoded)', $tableNode)),
                    'creator' => trim($xpath->evaluate('string(dc:creator)', $tableNode)),
                    'pub_ate' => trim($xpath->evaluate('string(pubDate)', $tableNode)),
                    'category' => trim($xpath->evaluate('string(category)', $tableNode)),

                ];

            }
        }


        return $items;
    }

    protected function createFileChunks($items)
    {
        $baseFile =  $items;
        $parts = (array_chunk($baseFile, 50000));
        $today = Carbon::now()->format('Y_m_d');
        File::deleteDirectory(public_path('imports/news_feeds/' . $today));
        $partPath = 'imports/news_feeds/' . $today . '/';

        foreach ($parts as $key => $part) {
            $fileName = 'news_feed_part_' . $key . '.txt';
            Storage::disk('public_uploads')->put($partPath . $fileName, json_encode($part));
        }
    }

    protected function dispatchJobs()
    {
        $today = Carbon::now()->format('Y_m_d');
        $partPath = 'imports/news_feeds/' . $today . '/';
        $paths = public_path($partPath);
        $path = ($paths . '*.txt');
        $global = glob($path);
        natsort($global);
        DB::table('news_feeds')->truncate();
        foreach ($global as $globalKey => $file) {

            $fileOrigin = 1;
            if ($globalKey == 0) {
                $fileOrigin = explode('_', basename($file, '.txt'));
                $fileOrigin = ((int)end($fileOrigin));
            }
            dispatch(new ImportNewsXmlJob($file, $fileOrigin, $globalKey));
        }
    }
}
