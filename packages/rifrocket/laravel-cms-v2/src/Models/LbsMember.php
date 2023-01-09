<?php

namespace Rifrocket\LaravelCmsV2\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Rifrocket\LaravelCmsV2\Traits\LbsAuthTrait;
use Rifrocket\LaravelCmsV2\Traits\LbsModelTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class LbsMember extends Authenticatable
{
    use HasFactory, LbsAuthTrait, LbsModelTrait;

    protected $meta_model=LbsUserMeta::class;
    protected $meta_rel_key='user_id';
    protected $meta_provider='lbs_member';
    protected $appends = ['display_name','avatar'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $fillable =[
        'email',
        'password',
        'first_name',
        'last_name',
        'display_name',
        'country',
        'country_code',
        'phone',
        'phone_code',
        'phone_verified_at',
        'email_verified_at',
        'role',
        'category',
        'avatar',
        'profile_url',
        'status',
        'remarks',
        'deleted_at'
    ];

    public function setDisplayNameAttribute()
    {
        $this->attributes['display_name'] = $this->attributes['first_name'].' '.$this->attributes['last_name'];
    }

    public function getDisplayNameAttribute()
    {
      return   $this->attributes['display_name'];
    }

    public function getAvatarAttribute()
    {
      return   $this->attributes['avatar'];
    }


}
