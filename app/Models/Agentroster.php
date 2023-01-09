<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rifrocket\LaravelCmsV2\Traits\LbsModelTrait;

class Agentroster extends Model
{
    use HasFactory, LbsModelTrait;


    protected $appends=['DefaultPhotoURL'];

    public function getDefaultPhotoURLAttribute()
    {
        return URL('frontend/images/default-cards/default_user.png');
    }
}
