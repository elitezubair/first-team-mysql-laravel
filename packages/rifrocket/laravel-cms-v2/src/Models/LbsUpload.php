<?php

namespace Rifrocket\LaravelCmsV2\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rifrocket\LaravelCmsV2\Traits\LbsModelTrait;

class LbsUpload extends Model
{
    use HasFactory,LbsModelTrait;

    protected $fillable =[
        'user_id',
        'provider',
        'original_name',
        'alternate_name',
        'description',
        'file_path',
        'file_size',
        'file_type',
        'file_extension',
        'file_id',
        'file_hight',
        'file_width',
        'is_private',
        'external_link',
        'directory',
        'status',
        'remarks',
        'deleted_at',
        'user_set'
    ];
    public function scopeListMedia($query){
        return $query->where('file_id', null);
    }
}
