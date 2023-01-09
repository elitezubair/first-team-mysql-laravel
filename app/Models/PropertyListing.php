<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rifrocket\LaravelCmsV2\Traits\LbsModelTrait;

class PropertyListing extends Model
{
    use HasFactory, LbsModelTrait;

    protected $appends=['DefaultPhotoURL'];

    public function getDefaultPhotoURLAttribute()
    {
        return URL('frontend/images/default-cards/default_property.jpg');
    }
    public function images()
    {
        return $this->hasMany(PhotoUrl::class, 'sMLS_id','szMLS_no')->select('sMLS_id','PhotoURL','sPrimary_fl');
    }

    public function amenities()
    {
        return $this->belongsTo(Amenity::class, 'szMLS_no','szMLS_no');
    }

    public function additional_amenities()
    {
        return $this->belongsTo(PropertyAdditional::class, 'szMLS_no','szMLS_no');
    }

    public function agent_roster()
    {
        return $this->belongsTo(Agentroster::class,'szListingAgent_DRE','license');
    }
}
