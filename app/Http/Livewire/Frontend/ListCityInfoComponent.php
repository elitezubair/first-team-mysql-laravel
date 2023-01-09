<?php

namespace App\Http\Livewire\Frontend;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\WithPagination;

class ListCityInfoComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public  $APIURL_restaurant, $APIURL_school, $APIURL_park, $APIURL_hospital ;
    public $autoLocate = false, $coordinates=[], $current_tab= 'restaurant' , $perPageItem=20;

    protected $listeners = ['fetchCityInfoEvent' => 'fetchCityInfoEvent'];

    public function fetchCityInfoEvent($coordinates)
    {
        if ($this->autoLocate == false) {
            $this->coordinates = $coordinates;
            $this->searchEngin();
        }
    }

    public function webLocationDeduct($geoLat = null, $geoLong = null)
    {
        if ($this->autoLocate == true) {
            if ($geoLat and $geoLong) {
                $this->coordinates = [$geoLat, $geoLong];
                $this->searchEngin();
            } else {
                $this->coordinates = [34.113016840911, -117.71627091368];
            }
        }
    }

    public function mount()
    {
        $this->searchEngin();
    }


    public function searchEngin()
    {
        if (empty($this->coordinates)) {
            $this->APIURL_restaurant=[];
            $this->APIURL_school=[];
            $this->APIURL_park=[];
            $this->APIURL_hospital=[];
            return [];
        }
        $this->google_key = env('GOOGLE_API');
        $lat = $this->coordinates[0];
        $long = $this->coordinates[1];
        $search_radius=100000;

        $APIURL_restaurant = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=$lat%2C$long&radius=$search_radius&type=restaurant&maxprice=4&keyword=food&minprice=2&key=$this->google_key";
        $APIURL_school = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=$lat%2C$long&radius=$search_radius&type=school&keyword=study&key=$this->google_key";
        $APIURL_park = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=$lat%2C$long&radius=$search_radius&type=park&keyword=nature&key=$this->google_key";
        $APIURL_hospital = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=$lat%2C$long&radius=$search_radius&type=hospital&keyword=dockter&key=$this->google_key";


        $response_restaurant = Http::get($APIURL_restaurant);
        $response_school = Http::get($APIURL_school);
        $response_park = Http::get($APIURL_park);
        $response_hospital = Http::get($APIURL_hospital);


        if (isset(json_decode($response_restaurant->body(), true)['results'])) {
            $this->APIURL_restaurant = json_decode($response_restaurant->body(), true)['results'];
        }else{
            $this->APIURL_restaurant=[];
        }

        if (isset(json_decode($response_school->body(), true)['results'])) {
            $this->APIURL_school = json_decode($response_school->body(), true)['results'];
        }else{
            $this->APIURL_school=[];
        }

        if (isset(json_decode($response_park->body(), true)['results'])) {
            $this->APIURL_park = json_decode($response_park->body(), true)['results'];
        }else{
            $this->APIURL_park=[];
        }

        if (isset(json_decode($response_hospital->body(), true)['results'])) {
            $this->APIURL_hospital = json_decode($response_hospital->body(), true)['results'];
        }else{
            $this->APIURL_hospital=[];
        }
    }

    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }



    public function render()
    {
        switch ($this->current_tab) {
            case 'restaurant':
                $this->resetPage();
                $collections = $this->paginate($this->APIURL_restaurant, $this->perPageItem);
                break;

            case 'hospital':
                $this->resetPage();
                $collections = $this->paginate($this->APIURL_hospital, $this->perPageItem);
                break;


            case 'park':
                $this->resetPage();
                $collections = $this->paginate($this->APIURL_park, $this->perPageItem);
                break;


            case 'school':
                $this->resetPage();
                $collections = $this->paginate($this->APIURL_school, $this->perPageItem);
                break;

            default:
                $this->resetPage();
                $collections = $this->paginate($this->APIURL_restaurant, $this->perPageItem);
                break;
        }
        // dd($collections);
        return view('livewire.frontend.list-city-info-component', compact('collections'));
    }
}
