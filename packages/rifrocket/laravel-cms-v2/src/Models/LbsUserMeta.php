<?php

namespace Rifrocket\LaravelCmsV2\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rifrocket\LaravelCmsV2\Traits\LbsModelTrait;

class LbsUserMeta extends Model
{
    use HasFactory, LbsModelTrait;


    protected $fillable=[

        'user_id',
        'meta_key',
        'meta_value',
        'provider',
        'status',
        'remarks',
        'deleted_at',
    ];
}
