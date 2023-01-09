<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rifrocket\LaravelCmsV2\Traits\LbsModelTrait;

class PhotoUrl extends Model
{
    use HasFactory, LbsModelTrait;

    public function property()
    {
        return $this->belongsTo(PropertyListing::class, 'sMLS_id','szMLS_no');
    }
}
