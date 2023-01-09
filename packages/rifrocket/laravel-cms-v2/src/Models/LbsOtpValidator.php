<?php

namespace Rifrocket\LaravelCmsV2\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rifrocket\LaravelCmsV2\Traits\LbsModelTrait;
use Rifrocket\LaravelCmsV2\Traits\LbsValidatorTrait;

class LbsOtpValidator extends Model
{
    use HasFactory, LbsModelTrait, LbsValidatorTrait;

    protected $fillable=[

        'target',
        'driver',
        'otp',
        'expiry',
        'verified',
        'verified_at',
        'status',
        'remarks',
        'deleted_at',
    ];
}
