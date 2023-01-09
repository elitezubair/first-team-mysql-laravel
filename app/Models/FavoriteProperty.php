<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rifrocket\LaravelCmsV2\Traits\LbsModelTrait;

class FavoriteProperty extends Model
{
    use HasFactory, LbsModelTrait;

    protected $fillable=[
        'szMLS_no',
        'sStatus_cd',
        'szAddress_nm',
        'szPropType_cd',
        'sSingleStatus_cd',
        'mPrice_amt',
        'dtList_dt',
        'dtPending_dt',
        'dtSold_dt',
        'image',
        'status',
        'remarks',
        'deleted_at'
    ];

    protected $appends=['DefaultPhotoURL'];

    public function getDefaultPhotoURLAttribute()
    {
        return URL('frontend/images/default-cards/default_property.jpg');
    }
    
    public function property()
    {
        return $this->belongsTo(PropertyListing::class, 'szMLS_no', 'szMLS_no');
    }
}
