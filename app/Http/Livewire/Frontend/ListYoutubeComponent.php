<?php

namespace App\Http\Livewire\Frontend;

use App\Models\YoutubeVideo;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithPagination;
use Rifrocket\LaravelCmsV2\Models\LbsAppSetting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ListYoutubeComponent extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $coordinates = [], $perPageItem = 9, $youtube_api, $geo_videos_array;
    public $autoLocate = false, $inDatabase = false, $default_search = 'orange county tour 4k';


    protected $listeners = ['fetchYoutubeVideos' => 'fetchYoutubeVideos'];

    public function fetchInTheDatabase($county, $lat = null, $long = null)
    {
        if ($lat and $long) {
            $videosFound =   YoutubeVideo::where('county', $county)->get();
            if ($videosFound and !$videosFound->isEmpty()) {
               return $videosFound;
            }return false;
        }
        return false;
    }

    public function fetchYoutubeVideos($coordinates)
    {
        if ($this->autoLocate == false) {
            $this->coordinates = [$coordinates[0], $coordinates[1]];

            if ($coordinates[2]) {
                $this->default_search = $coordinates[2] . ' tour 4k';
                $check_videos = $this->fetchInTheDatabase($coordinates[2], $coordinates[0], $coordinates[1]);
                if ($check_videos) {

                    $this->geo_videos_array = $check_videos;
                    $this->inDatabase = true;
                } else {
                    $this->searchEngin();
                    $this->inDatabase = false;
                }
            } else {
                $this->searchEngin();
                $this->inDatabase = false;
            }
        }
    }

    public function webLocationDeduct($geoLat = null, $geoLong = null, $city_name = null)
    {
        if ($this->autoLocate == true) {
            if ($geoLat and $geoLong) {
                $this->coordinates = [$geoLat, $geoLong];
                if ($city_name) {
                    $this->default_search = $city_name . ' tour 4k';
                    $check_videos = $this->fetchInTheDatabase($city_name, $geoLat, $geoLong);
                    if ($check_videos) {
                        $this->geo_videos_array = $check_videos;
                        $this->inDatabase = true;
                    } else {
                        $this->inDatabase = false;
                        $this->searchEngin();   

                    }
                } else {
                    $this->searchEngin();
                    $this->inDatabase = false;
                }
            } else {

                $this->coordinates = [40.7127753, -74.0059728];
            }
        }
    }


    protected function checkYouTubeQuota()
    {
        $used_quota = LbsAppSetting::findKey('YOUTUBE_QOUTA_USED');
        if ($used_quota) {
            if ($used_quota->YOUTUBE_QOUTA_USED > env('YOUTUBE_API_QOUTA')) {

                return false;
            }
        }
        return true;
    }

    protected function updateYouTubeQuota()
    {
        $used_quota = LbsAppSetting::findKey('YOUTUBE_QOUTA_USED')->YOUTUBE_QOUTA_USED;
        LbsAppSetting::createOrUpdate(['YOUTUBE_QOUTA_USED' => ++$used_quota]);
    }

    public function searchEngin()
    {
        if (empty($this->coordinates) or !$this->checkYouTubeQuota()) {
            return $this->geo_videos_array = [];
        }
        $this->youtube_api = env('YOUTUBE_API');
        $lat = $this->coordinates[0];
        $long = $this->coordinates[1];
        $default_search = $this->default_search;
        // $APIURL = "https://content-youtube.googleapis.com/youtube/v3/search?q=$default_search&maxResults=27&locationRadius=10mi&type=video&location=" . $lat . "%2C" . $long . "&order=date&key=$this->youtube_api";
        $APIURL = "https://content-youtube.googleapis.com/youtube/v3/search?q=$default_search&maxResults=27&type=video&order=date&key=$this->youtube_api";
        $response = Http::get($APIURL); //dd(json_decode($response->body(), true)['items']);
        $this->updateYouTubeQuota();
        if (isset(json_decode($response->body(), true)['items'])) {
            return  $this->geo_videos_array = json_decode($response->body(), true)['items'];
        }
        return  $this->geo_videos_array = [];
    }


    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function render()
    {
        $collections = $this->paginate($this->geo_videos_array, $this->perPageItem);
        return view('livewire.frontend.list-youtube-component', compact('collections'));
    }
}
