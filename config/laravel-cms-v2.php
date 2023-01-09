<?php

/*
 * You can place your custom package configuration in here.
 */

use Rifrocket\LaravelCmsV2\Models\LbsAdmin;
use Rifrocket\LaravelCmsV2\Models\LbsMember;

return [

    'admin_has_sub_domain'=>true,
    'admin_sub_domain'=>'admin',

    'models'=>[
        'members'=>LbsMember::class,
        'admins'=>LbsAdmin::class,
    ],

    'defaultImageSize' => [

        'thumb' => [
            154,
            154
        ],
        'medium' => [
            600,
            600
        ],
        'large' => [
            1024,
            1024
        ],
        'max_large' => [
            2500,
            2500
        ],
    ],

    'otp_expiry'=>5 //the time gap in minutes for OTP expiration
];
