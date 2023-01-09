<?php

namespace App\Http\Livewire\Frontend;

use App\Models\FavoriteProperty;
use App\Models\PropertyListing;
use App\Models\PropertySearchhistory;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Session;

class ListPropertyComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $perPageItem = 13;

    public function emitNotifications($message, $msgType)
    {
        $this->dispatchBrowserEvent('toast-notification-component', ['type' => $msgType, 'message' => $message]);
    }

    public static function getSqlWithBindings($query)
    {
        return vsprintf(
            str_replace('?', '%s', $query->toSql()),
            collect($query->getBindings())
                ->map(function ($binding) {
                    return is_numeric($binding) ? $binding : "'{$binding}'";
                })
                ->toArray(),
        );
    }

    public $googleMapCenter = [],$googleMapCenterMapDraged = [],
        $favoriteArray = [],
        $saveSearchHistoryArray = [];
    public $total_property = 0,
        $session_county_city = []; // not in use right now

    public $getQueryData = null;
    public $onMountFlag = true;
    public $filter_counties = [];
    public $filter_property_type = [];
    public $filter_bedroom = [];
    public $filter_bathroom = [];
    public $filter_carspace = [];
    public $filter_aminities = [];
    public $filter_min_square_ft = 0;
    public $filter_max_square_ft = 0;
    public $filter_min_built_year = 0;
    public $filter_max_built_year = 0;
    public $filter_min_price = 0;
    public $filter_max_price = 0;
    public $filter_coordinates = [];
    public $currentZoom = 10;
    public $filter_search_city_county = [];
    public $filter_search_city_county_flag = false;
    public $filter_agency = 'no';
    public $filter_szMLS_no_tags = [];
    public $filter_search_status = 'ACT';
    public $filter_search_order = 'expensive';
    public $filterCounter = 0;
    public $filter_livewirePropertyIds = [];

    public function update_szMLS_Tags($tags)
    {
        $getTheTags = array_filter(explode(',', $tags));
        $this->filter_szMLS_no_tags = $getTheTags;
    }

    public function updateTags($tags)
    {
        if ($this->onMountFlag == true) {
            return true;
        }

        $getTheTags = array_filter(explode(',', $tags));
        $countyHolder = [];
        $cityHolder = [];
        $zipHolder = [];
        $addressHolder = [];

        Session::put('search_city_county',$getTheTags);
        foreach ($getTheTags as $key => $tag) {
            if (strpos($tag, '-county')) {
                $countyHolder[] = str_replace([' -county'], '', $tag);
                continue;
            }
            if (strpos($tag, '-city')) {
                $cityHolder[] = str_replace([' -city'], '', $tag);
                continue;
            }
            if (strlen($tag) >= 4 and strlen($tag) <= 5) {
                $zipHolder[] = (int) str_replace(['"', ' '], '', $tag);
            } else {
                $addressHolder[] = $tag;
            }
        }
        $this->filter_search_city_county['countyHolder'] = $countyHolder;
        $this->filter_search_city_county['cityHolder'] = $cityHolder;
        $this->filter_search_city_county['zipHolder'] = $zipHolder;
        $this->filter_search_city_county['addressHolder'] = $addressHolder;

        $this->onMountFlag = false;
        $this->getQueryData = null;
        $this->filter_counties = [];
        $this->filter_property_type = [];
        $this->filter_bedroom = [];
        $this->filter_bathroom = [];
        $this->filter_carspace = [];
        $this->filter_aminities = [];
        $this->filter_min_square_ft = 0;
        $this->filter_max_square_ft = 0;
        $this->filter_min_built_year = 0;
        $this->filter_max_built_year = 0;
        $this->filter_min_price = 0;
        $this->filter_max_price = 0;
        $this->filter_coordinates = [];
        $this->currentZoom = 10;
        $this->filter_search_status = 'ACT';
        $this->filter_search_order = 'expensive';
        $this->filterCounter = 0;
        $this->filter_livewirePropertyIds = [];
        $this->filter_search_city_county_flag=true;

        $this->searchEngin();
    }

    public function executeFilters()
    {
        $this->searchEngin();
    }

    public function onMapCallFilterFunction($current_bound_lat0, $current_bound_lng0, $current_bound_lat1, $current_bound_lng1, $current_zoom, $current_center_point)
    {
        $this->filter_coordinates = [$current_bound_lat0, $current_bound_lng0, $current_bound_lat1, $current_bound_lng1];
        $this->currentZoom = $current_zoom;
        $this->googleMapCenterMapDraged = $current_center_point;
        $this->searchEngin();
    }

    public function onMapCallFilterByIdsFunction($livewirePropertyIds)
    {
        $this->filter_livewirePropertyIds = $livewirePropertyIds;
    }

    public function onCheckBoxes($type, $key)
    {
        switch ($type) {
            case 'counties':
                if (!array_key_exists($key, $this->filter_counties)) {
                    $this->filter_counties[$key] = $key;
                } else {
                    unset($this->filter_counties[$key]);
                    unset($this->filter_search_city_county['countyHolder'][$key]);
                }
                break;
            case 'property_type':
                if (!array_key_exists($key, $this->filter_property_type)) {
                    $this->filter_property_type[$key] = $key;
                } else {
                    unset($this->filter_property_type[$key]);
                }
                break;
            case 'bedroom':
                if (!array_key_exists($key, $this->filter_bedroom)) {
                    $this->filter_bedroom[$key] = $key;
                } else {
                    unset($this->filter_bedroom[$key]);
                }
                break;
            case 'bathroom':
                if (!array_key_exists($key, $this->filter_bathroom)) {
                    $this->filter_bathroom[$key] = $key;
                } else {
                    unset($this->filter_bathroom[$key]);
                }
                break;
            case 'carspace':
                if (!array_key_exists($key, $this->filter_carspace)) {
                    $this->filter_carspace[$key] = $key;
                } else {
                    unset($this->filter_carspace[$key]);
                }
                break;
            case 'aminities':
                if (!array_key_exists($key, $this->filter_aminities)) {
                    $this->filter_aminities[$key] = $key;
                } else {
                    unset($this->filter_aminities[$key]);
                }
                break;
            case 'min_square_ft':
                $this->filter_min_square_ft = $key;
                break;
            case 'max_square_ft':
                $this->filter_max_square_ft = $key;
                break;
            case 'min_built_year':
                $this->filter_min_built_year = $key;
                break;
            case 'max_built_year':
                $this->filter_max_built_year = $key;
                break;
            case 'min_price':
                $this->filter_min_price = $key;
                break;
            case 'max_price':
                $this->filter_max_price = $key;
                break;
        }
    }

    public function mount()
    {
        $this->filter_search_city_county['countyHolder'] = [];
        $this->filter_search_city_county['cityHolder'] = [];
        $this->filter_search_city_county['zipHolder'] = [];
        $this->filter_search_city_county['addressHolder'] = [];
        $this->session_county_city=[];
        // Session::pull('search_city_county');
        // Session::save();
        if (Session::has('search_city_county')) {
            $countyHolder = [];
            $cityHolder = [];
            $zipHolder = [];
            $addressHolder = [];

            foreach (Session::get('search_city_county') as $tag) {
                $this->session_county_city[] = ['value' => $tag];
                if (strpos($tag, '-county')) {
                    $countyHolder[] = str_replace([' -county'], '', $tag);
                    continue;
                }
                if (strpos($tag, '-city')) {
                    $cityHolder[] = str_replace([' -city'], '', $tag);
                    continue;
                }
                if (strlen($tag) >= 4 and strlen($tag) <= 5) {
                    $zipHolder[] = (int) str_replace(['"', ' '], '', $tag);
                } else {
                    $addressHolder[] = $tag;
                }
            }
            $this->filter_search_city_county['countyHolder'] = $countyHolder;
            $this->filter_search_city_county['cityHolder'] = $cityHolder;
            $this->filter_search_city_county['zipHolder'] = $zipHolder;
            $this->filter_search_city_county['addressHolder'] = $addressHolder;
        }else{
            $this->session_county_city[]=['value' => 'orange -county'];
        }
        $this->session_county_city=json_encode($this->session_county_city);
        // dd($this->filter_search_city_county);
        if (auth()->check()) {
            $this->favoriteArray = FavoriteProperty::where('member_id', auth()->user()->id)
                ->select('szMLS_no')
                ->pluck('szMLS_no')
                ->toArray();
        }
        $this->searchEngin();
    }

    public function MakeMarkerForCity()
    {
        $collections = $this->getQueryData;
        $collections = $collections->shuffle();
        $RenderMarker = [];
        $coordinates = [];

        foreach ($collections as $key => $propertyCollection) {
            $image = null;
            if (isset($propertyCollection->images[0])) {
                $image = $propertyCollection->images[0]->PhotoURL;
            } else {
                $image = $propertyCollection->DefaultPhotoURL;
            }

            $RenderMarker[] = [
                'id' => $propertyCollection->id,
                'uri' => route('public.property.property_details', ['property_id' => base64_encode($propertyCollection->id)]),
                'code' => $propertyCollection->szMLS_no,
                'status' => $propertyCollection->sStatus_cd,
                'city' => $propertyCollection->szCity_nm,
                'address' => $propertyCollection->szAddress_nm . ', ' . $propertyCollection->szCity_nm . ', ' . $propertyCollection->szCounty_nm . ', ' . $propertyCollection->sState_cd . ', ' . $propertyCollection->sZip_cd,
                'position' => ['lat' => $propertyCollection->latitude, 'lng' => $propertyCollection->longtitude],
                'image' => $image,
                'PropertyFeatures' => ['bath' => $propertyCollection->dBath_no, 'bed' => $propertyCollection->iBR_no, 'sqf' => number_format($propertyCollection->iSqFt_no), 'price' => number_format($propertyCollection->mListPrice_amt), 'short_price' => number_shorten($propertyCollection->mListPrice_amt), 'type' => $propertyCollection->szPropType_cd],
            ];

            $coordinates[] = [$propertyCollection->latitude, $propertyCollection->longtitude];
        }
        if ($this->onMountFlag == true) {
            $this->getNewCenterOfMap($coordinates);
        }
        if ( $this->filter_search_city_county_flag == true) {
            $this->getNewCenterOfMap($coordinates);
            $this->filter_search_city_county_flag = false;
        }


        if ($this->onMountFlag == true and !empty($this->googleMapCenter)) {
            $this->emit('fetchYoutubeVideos', [$this->googleMapCenter[0], $this->googleMapCenter[1], 'orange county']);
            $this->onMountFlag = false;
        } elseif ($this->onMountFlag == false and !empty($this->googleMapCenter)) {
            $this->emit('fetchYoutubeVideos', [$this->googleMapCenter[0], $this->googleMapCenter[1], null]);
        }

        if ($this->filter_search_city_county_flag == false  and !empty($this->googleMapCenter)) {
            $this->onMountFlag = false;
        }


        if (!empty($this->googleMapCenterMapDraged)) {
            $this->googleMapCenter = $this->googleMapCenterMapDraged;
        }else{
            $this->getNewCenterOfMap($coordinates);
            $this->googleMapCenterMapDraged=[];
        }
        // dd($this->filter_search_city_county_flag);

        $this->emit('fetchCityInfoEvent', $this->googleMapCenter);

        $this->dispatchBrowserEvent('after-mount-push-geo-markers', ['markers' => $RenderMarker, 'map_center' => $this->googleMapCenter, 'zoom_index' => $this->currentZoom, 'search_results' => $this->total_property]);
        $this->dispatchBrowserEvent('refresh-owl-carousel');

    }

    public function findLocationEndPoint($collections)
    {
        $coordinates = [];
        $collections = $collections;
        if (!empty($collections)) {
            $coordinates[] = [$collections[0]['latitude'], $collections[0]['longtitude']];
            $coordinates[] = [end($collections)['latitude'], end($collections)['longtitude']];
        }
        return $coordinates;
    }

    public function getNewCenterOfMap($coordinates)
    {
        if (empty($coordinates)) {
            return 0;
        }
        $x = $y = $z = 0;
        $n = count($coordinates);
        foreach ($coordinates as $point) {
            $lt = ($point[0] * pi()) / 180;
            $lg = ($point[1] * pi()) / 180;
            $x += cos($lt) * cos($lg);
            $y += cos($lt) * sin($lg);
            $z += sin($lt);
        }
        $x /= $n;
        $y /= $n;
        $this->googleMapCenter = [(atan2($z / $n, sqrt($x * $x + $y * $y)) * 180) / pi(), (atan2($y, $x) * 180) / pi()];
        return $this->googleMapCenter;
    }

    public function searchEngin()
    {
        $this->filterCounter = 0;
        $this->dispatchBrowserEvent('refresh-owl-carousel');
        $query = PropertyListing::with(['images', 'additional_amenities', 'amenities','agent_roster']);

        if ($this->filter_szMLS_no_tags and !empty(array_filter($this->filter_szMLS_no_tags))) {
            $this->filterCounter++;
            $this->saveSearchHistoryArray['MLS Tags'] = $this->filter_szMLS_no_tags;
            $query = $query->whereIn('szMLS_no', $this->filter_szMLS_no_tags);
        }

        if ($this->filter_agency) {
            $this->filterCounter++;
            $this->saveSearchHistoryArray['Show Agency Only Listings'] = $this->filter_agency;
            if ($this->filter_agency == 'yes') {
                //dd($this->filter_agency);
                $query = $query->has('agent_roster');
            }
        }

        if ($this->filter_counties and !empty(array_filter($this->filter_counties))) {
            $tmpArray = array_merge($this->filter_search_city_county['countyHolder'], $this->filter_counties);
            $this->filter_search_city_county['countyHolder'] = array_filter($tmpArray);

        }

        if ($this->onMountFlag == true and empty(array_filter($this->filter_search_city_county))) {

            $this->filterCounter++;
            $query = $query->where('szCounty_nm', 'orange');
            $this->filter_search_city_county['countyHolder'] = ['orange'];
        }
        elseif($this->filter_search_city_county and !empty(array_filter($this->filter_search_city_county))) {

            $this->filterCounter++;
            $this->saveSearchHistoryArray['cities or counties'] = $this->filter_search_city_county;

            if ($this->filter_search_city_county['countyHolder'] and !empty($this->filter_search_city_county['countyHolder'])) {
                $query = $query->whereIn('szCounty_nm', $this->filter_search_city_county['countyHolder']);
            }
            if ($this->filter_search_city_county['cityHolder'] and !empty($this->filter_search_city_county['cityHolder'])) {
                $query = $query->whereIn('szCity_nm', $this->filter_search_city_county['cityHolder']);
            }
            if ($this->filter_search_city_county['zipHolder'] and !empty($this->filter_search_city_county['zipHolder'])) {
                $query = $query->whereIn('sZip_cd', $this->filter_search_city_county['zipHolder']);
            }
            if ($this->filter_search_city_county['addressHolder'] and !empty($this->filter_search_city_county['addressHolder'])) {
                $query = $query->whereIn('szAddress_nm', $this->filter_search_city_county['addressHolder']);
            }
        }

        if ($this->filter_search_status) {
            $this->filterCounter++;
            $this->saveSearchHistoryArray['status'] = $this->filter_search_status;
            $query = $query->where('sStatus_cd', $this->filter_search_status);
        }

        if ($this->filter_property_type and !empty(array_filter($this->filter_property_type))) {
            $this->filterCounter++;
            $this->saveSearchHistoryArray['type'] = $this->filter_property_type;
            $query = $query->whereIn('szPropType_cd', $this->filter_property_type);
        }
        if ($this->filter_bedroom and !empty(array_filter($this->filter_bedroom))) {
            $this->filterCounter++;
            $this->saveSearchHistoryArray['beds'] = $this->filter_bedroom;
            $query = $query->whereIn('iBR_No', $this->filter_bedroom);
        }
        if ($this->filter_bathroom and !empty(array_filter($this->filter_bathroom))) {
            $this->filterCounter++;
            $this->saveSearchHistoryArray['bathrooms'] = $this->filter_bathroom;
            $query = $query->whereIn('dBath_No', $this->filter_bathroom);
        }

        if ($this->filter_carspace and !empty(array_filter($this->filter_carspace))) {
            $this->filterCounter++;
            $this->saveSearchHistoryArray['additional_amenities'] = $this->filter_carspace;
            $query = $query->whereHas('additional_amenities', function ($query1) {
                $query1->whereIn('iTotalParking', $this->filter_carspace);
            });
        }

        if ($this->filter_min_square_ft || $this->filter_max_square_ft) {
            $this->filterCounter++;
            $this->saveSearchHistoryArray['min sqft'] = $this->filter_min_square_ft;
            $this->saveSearchHistoryArray['max sqft'] = $this->filter_max_square_ft;
            $query = $query->whereBetween('iSqFt_no', [$this->filter_min_square_ft, $this->filter_max_square_ft]);
        }
        if ($this->filter_min_built_year || $this->filter_max_built_year) {
            $this->saveSearchHistoryArray['max year build'] = $this->filter_min_built_year;
            $this->saveSearchHistoryArray['max year build'] = $this->filter_max_built_year;
            $query = $query->whereBetween('iYearBuilt_no', [$this->filter_min_built_year, $this->filter_max_built_year]);
        }

        if ($this->filter_aminities) {
            $this->filterCounter++;
            $aminities = $this->filter_aminities;
            $query = $query->whereHas('amenities', function ($query2) use ($aminities) {
                foreach ($aminities as $amy_val) {
                    $query2->where($amy_val, 'Y');
                }
            });
        }

        if ($this->filter_min_price || $this->filter_max_price) {
            $this->filterCounter++;
            $this->saveSearchHistoryArray['max year price'] = $this->filter_min_price;
            $this->saveSearchHistoryArray['max year price'] = $this->filter_max_price;
            $query = $query->whereBetween('mListPrice_amt', [$this->filter_min_price, $this->filter_max_price]);
        }

        if ($this->filter_search_order) {
            $this->filterCounter++;
            $this->saveSearchHistoryArray['order'] = $this->filter_search_order;
            switch ($this->filter_search_order) {
                case 'newest':
                    $query = $query->orderBy('iDaysOnMarket_no', 'asc');
                    break;

                case 'oldest':
                    $query = $query->orderBy('iDaysOnMarket_no', 'desc');
                    break;

                case 'expensive':
                    $query = $query->orderBy('mListPrice_amt', 'desc');
                    break;

                case 'cheapest':
                    $query = $query->orderBy('mListPrice_amt', 'asc');
                    break;

                case '3dtour':
                    $query = $query->where('VirtualTourURL', $this->filter_search_order);
                    break;
            }
        }

        if ($this->filter_coordinates and !empty(array_filter($this->filter_coordinates))) {
            $this->filterCounter++;
            $query = $query->whereBetween('latitude', [$this->filter_coordinates[2], $this->filter_coordinates[0]]);
            $query = $query->whereBetween('longtitude', [$this->filter_coordinates[3], $this->filter_coordinates[1]]);
        }

        $query = $query->select('szListingAgent_nm', 'szListingAgent_DRE', 'sZip_cd', 'szCounty_nm', 'sState_cd', 'id', 'szMLS_no', 'szCity_nm', 'longtitude', 'latitude', 'sStatus_cd', 'szPropType_cd', 'mListPrice_amt', 'szAddress_nm', 'iBR_no', 'dBath_no', 'iSqFt_no', 'iDaysOnMarket_no');
        $this->total_property = $query->count('id');
        $this->dispatchBrowserEvent('initiate-after-mount', ['sql_query' => $this->getSqlWithBindings($query)]);
        // dd($this->getSqlWithBindings($query));
        $this->getQueryData = $query->take(500)->get();

        // if ($this->onMountFlag == false) {
        //     $this->MakeMarkerForCity();
        // }
         $this->MakeMarkerForCity();
        $this->resetPage();
        return $query;
    }

    public function makeFavorite($szMLS_no, $sStatus_cd, $szPropType_cd, $mListPrice_amt, $szAddress_nm, $image)
    {
        if (auth()->check()) {
            $insertNew = new FavoriteProperty();
            $insertNew->member_id = auth()->user()->id;
            $insertNew->szMLS_no = $szMLS_no;
            $insertNew->sSingleStatus_cd = $sStatus_cd;
            $insertNew->sStatus_cd = $sStatus_cd;
            $insertNew->szPropType_cd = $szPropType_cd;
            $insertNew->mPrice_amt = $mListPrice_amt;
            $insertNew->szAddress_nm = $szAddress_nm;
            $insertNew->dtList_dt = 0;
            $insertNew->dtPending_dt = 0;
            $insertNew->dtSold_dt = 0;
            $insertNew->image = $image;
            $insertNew->save();
            $this->favoriteArray[] = $szMLS_no;
        }
    }

    public function saveSearchHistory()
    {
        if (empty($this->saveSearchHistoryArray)) {
            return $this->emitNotifications('please apply at least one filter to save history ', 'error');
        }

        $history = new PropertySearchhistory();
        $history->member_id = auth()->user()->id;
        $history->search_string = json_encode($this->saveSearchHistoryArray);
        $history->search_json_data = json_encode($this->saveSearchHistoryArray);

        try {
            $history->save();
            return $this->emitNotifications('search history successfully', 'success');
        } catch (\Throwable $th) {
            return $this->emitNotifications($th->getMessage(), 'error');
            return $this->emitNotifications('something went wrong please contact admin', 'error');
        }
    }

    public function removeFavorite($szMLS_no)
    {
        FavoriteProperty::where('member_id', auth()->user()->id)
            ->where('szMLS_no', $szMLS_no)
            ->first()
            ->delete();
    }

    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function render()
    {
        $finalCollectionForRender = $this->getQueryData;
        if ($this->filter_livewirePropertyIds and !empty(array_filter($this->filter_livewirePropertyIds))) {
            $finalCollectionForRender = $this->getQueryData->whereIn('id', $this->filter_livewirePropertyIds);
        }
        $collections = $this->paginate($finalCollectionForRender, $this->perPageItem);
        $this->dispatchBrowserEvent('refresh-owl-carousel');
        return view('livewire.frontend.list-property-component', compact('collections', 'finalCollectionForRender'));
    }
}
