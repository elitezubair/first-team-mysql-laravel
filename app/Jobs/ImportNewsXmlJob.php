<?php

namespace App\Jobs;

use App\Models\NewsFeed;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ImportNewsXmlJob implements ShouldQueue
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
        $data = json_decode(file_get_contents($this->file), true);
        foreach ($data as $key => $row) {

            // if ($this->fileOrigin == 0 and $key == 0) {
            //     continue;
            // }
            $this->storeInfo($row);
        }
        if (File::exists($this->file)) {
            File::delete($this->file);
        }
    }

    protected function storeInfo($row)
    {
        $insert = new NewsFeed();
        $insert->title = $row['title'];
        $insert->banner_image = $row['banner_image'];
        $insert->link = $row['link'];
        $insert->description = $row['description'];
        $insert->content = $row['content'];
        $insert->creator = $row['creator'];
        $insert->pub_ate = $row['pub_ate'];
        $insert->category = $row['category'];
        $insert->city = isset($row['city']) ? $row['city'] : null;
        $insert->country = isset($row['country']) ? $row['country'] : null;
        try {
            $insert->save();
        } catch (\Throwable $th) {
            Log::info('insert news feeds failed error: ' . $th->getMessage());
        }
    }
}
