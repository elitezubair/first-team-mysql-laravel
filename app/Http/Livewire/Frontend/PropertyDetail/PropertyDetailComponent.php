<?php

namespace App\Http\Livewire\Frontend\PropertyDetail;

use App\Models\Agentroster;
use App\Models\Amenity;
use App\Models\FavoriteProperty;
use App\Models\PropertyAdditional;
use App\Models\PropertyListing;
use Attribute;
use Livewire\Component;
use Livewire\WithPagination;
use Share;
class PropertyDetailComponent extends Component
{

    public static function getSqlWithBindings($query)
    {
        return vsprintf(str_replace('?', '%s', $query->toSql()), collect($query->getBindings())->map(function ($binding) {
            return is_numeric($binding) ? $binding : "'{$binding}'";
        })->toArray());
    }

    public function emitNotifications($message, $msgType)
    {
        $this->dispatchBrowserEvent('toast-notification-component', ['type' => $msgType,  'message' => $message]);
    }


    public $socialMediaSharing, $property_id=null,  $markerCoordinates, $RenderMarker, $similarProperties=[],$favoriteArray=[];
    public $propertyCollection=null, $propertyAmenities=[], $propertyAdditionalAmenities=[];
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $perPageItem=12 ;
    public $getQueryData;

    public function mount()
    {

        $this->socialMediaSharing=Share::page(url()->full())->facebook()->twitter()->linkedin()->whatsapp()->telegram()->getRawLinks(); //dd($this->socialMediaSharing);
        $this->favoriteArray=FavoriteProperty::select('szMLS_no')->pluck('szMLS_no')->toArray();
        $this->fetchProperty();
    }

    public function fetchProperty()
    {
        $this->propertyAmenities=new Amenity([]);
        $this->propertyAdditionalAmenities=new PropertyAdditional([]);
        $this->propertyAgentRoster=new Agentroster([]);
        $this->propertyCollection=PropertyListing::with(['images','amenities','additional_amenities','agent_roster'])->find($this->property_id);
        if ( $this->propertyCollection->amenities ) {
           $this->propertyAmenities=$this->propertyCollection->amenities;
        }
        if ( $this->propertyCollection->additional_amenities) {
            $this->propertyAdditionalAmenities=$this->propertyCollection->additional_amenities;
         }

         if ( $this->propertyCollection->agent_roster) {
            $this->propertyAgentRoster=$this->propertyCollection->agent_roster;
         }
        //  dd( $this->propertyCollection);
        $this->markerCoordinates=[$this->propertyCollection->latitude,$this->propertyCollection->longtitude];
        $this->RenderMarker=$this->propertyMarker();
    }


    public function propertyMarker()
    {
        $image = null;
        if (isset($this->propertyCollection->images[0])) {
            $image = $this->propertyCollection->images[0]->PhotoURL;
        }else{
            $image = $this->propertyCollection->DefaultPhotoURL;
        }

        $RenderMarker[] = [
            'id' => $this->propertyCollection->id,
            'uri' => route('public.property.property_details', ['property_id' => base64_encode($this->propertyCollection->id)]),
            'code' => $this->propertyCollection->szMLS_no,
            'status' => $this->propertyCollection->sStatus_cd,
            'city' => $this->propertyCollection->szCity_nm,
            'address' => $this->propertyCollection->szAddress_nm . ', ' . $this->propertyCollection->szCity_nm . ', ' . $this->propertyCollection->szCounty_nm . ', ' . $this->propertyCollection->sState_cd . ', ' . $this->propertyCollection->sZip_cd,
            'position' => ['lat' => $this->propertyCollection->latitude, 'lng' => $this->propertyCollection->longtitude],
            'image' => $image,
            'PropertyFeatures' => ['bath' => $this->propertyCollection->dBath_no, 'bed' => $this->propertyCollection->iBR_no, 'sqf' => $this->propertyCollection->iSqFt_no, 'price' => number_format($this->propertyCollection->mListPrice_amt), 'short_price' => number_shorten($this->propertyCollection->mListPrice_amt), 'type' => $this->propertyCollection->szPropType_cd],
        ];

        return $RenderMarker;
    }




    public function makeFavorite($szMLS_no, $sStatus_cd, $szPropType_cd, $mListPrice_amt, $szAddress_nm, $image)
    {
       if (auth()->check()) {

            $insertNew = new FavoriteProperty();
            $insertNew->member_id=auth()->user()->id;
            $insertNew->szMLS_no=$szMLS_no;
            $insertNew->sSingleStatus_cd=$sStatus_cd;
            $insertNew->sStatus_cd=$sStatus_cd;
            $insertNew->szPropType_cd=$szPropType_cd;
            $insertNew->mPrice_amt=$mListPrice_amt;
            $insertNew->szAddress_nm=$szAddress_nm;
            $insertNew->dtList_dt=0;
            $insertNew->dtPending_dt=0;
            $insertNew->dtSold_dt=0;
            $insertNew->image=$image;
            $insertNew->save();

            $this->favoriteArray[]=$szMLS_no;

            return $this->emitNotifications('added to your favorite list successfully', 'success');
       }
    }

    public function removeFavorite($szMLS_no)
    {
       $fetch = FavoriteProperty::where('member_id',auth()->user()->id)->where('szMLS_no', $szMLS_no)->first();
       if ($fetch ) {
        $fetch ->delete();
       }
       $this->favoriteArray=FavoriteProperty::select('szMLS_no')->pluck('szMLS_no')->toArray();
       return $this->emitNotifications('removed from favorite list successfully', 'success');
    }


    public function fetchSimilarProperties()
    {
        return  $query=  PropertyListing::notDel()
        ->select('szListingAgent_nm','szListingAgent_DRE', 'sZip_cd', 'szCounty_nm', 'sState_cd', 'id', 'szMLS_no', 'szCity_nm', 'longtitude', 'latitude', 'sStatus_cd', 'szPropType_cd', 'mListPrice_amt', 'szAddress_nm', 'iBR_no', 'dBath_no', 'iSqFt_no', 'iDaysOnMarket_no')
        ->where('iBR_no',$this->propertyCollection->iBR_no)
        ->where('dBath_no',$this->propertyCollection->dBath_no)
        ->whereBetween('mListPrice_amt',[$this->propertyCollection->mListPrice_amt, $this->propertyCollection->mListPrice_amt+10000])
        ->where('id', '!=', $this->propertyCollection->id);
    }


    public function render()
    {
        $query=$this->fetchSimilarProperties();
        $this->getQueryData=$query->count();
        $collections= $query->paginate($this->perPageItem);
        $this->dispatchBrowserEvent('refresh-owl-carousel');
        return view('livewire.frontend.property-detail.property-detail-component', compact('collections'));
    }
}

