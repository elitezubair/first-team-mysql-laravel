<?php

namespace Rifrocket\LaravelCmsV2\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rifrocket\LaravelCmsV2\Traits\LbsModelTrait;

class LbsTranslation extends Model
{
    use HasFactory, LbsModelTrait;

    protected $fillable=[

        'lang_key',
        'trans_key',
        'trans_value',
        'provider',
        'status',
        'remarks',
        'deleted_at',
    ];

}
