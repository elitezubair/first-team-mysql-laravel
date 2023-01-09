<?php

namespace Rifrocket\LaravelCmsV2\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rifrocket\LaravelCmsV2\Traits\LbsAppSettingTrait;
use Rifrocket\LaravelCmsV2\Traits\LbsModelTrait;

class LbsAppSetting extends Model
{
    use HasFactory, LbsModelTrait, LbsAppSettingTrait;

    protected $fillable=[

        'setting_key',
        'setting_value',
        'status',
        'remarks',
        'deleted_at',
    ];
}
