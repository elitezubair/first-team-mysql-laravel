<?php
namespace Rifrocket\LaravelCmsV2\Traits;

use Rifrocket\LaravelCmsV2\Classes\LbsConstant;

trait LbsModelTrait
{

    // protected $meta_model='';
    // protected $meta_rel_key='';
    // protected $meta_provider='';

    /*
    * Reserved variables for meta tables:
    *
    * protected $meta_model = meta model path;
    * protected $meta_rel_key = key that is bind with meta model;
    * protected $meta_provider = provide if model contains more the one parent table's information (unique for the every parent model);
    *
    */

    //fetch only non deleted recorded ( soft deleted)
    public function scopeNotDel($query)
    {
        return $query->where('deleted_at', null);
    }

    //fetch only records with status active and deleted_at is null
    public function scopeOnlyActive($query)
    {
        return $query->where('status',LbsConstant::STATUS_ACTIVE)->where('deleted_at', null);
    }



    //fetch model data along with related data from meta table
    public function scopeWithMeta($query)
    {
        $meta_model=$this->meta_model;
        $provider=$this->meta_provider;
        $meta_rel_key=$this->meta_rel_key;

        return $query->get()->each(function ($items) use($meta_model,  $meta_rel_key, $provider) {
            $metaData =  $meta_model::where( $meta_rel_key, $items->id)->where('provider',$provider)->get();
            if ($metaData and !empty($metaData)) {
                foreach ($metaData as $metaValue) {
                    $items->{$metaValue->meta_key}= $metaValue->meta_value;
                }
            }
        });
    }

    //create or update meta table along with parent model data
    public function scopeCreateUpdateMeta($query, $insertable, $model_id)
    {
        $meta_model=$this->meta_model;
        $meta_rel_key=$this->meta_rel_key;
        $provider=$this->meta_provider;
        if ($insertable and is_array($insertable)) {

            foreach ($insertable as $MetaKey => $metaValue) {
                $insertMeta = $meta_model::where('meta_key', $MetaKey)->where($meta_rel_key, $model_id)->first();
                if (!$insertMeta ) {
                    $insertMeta = new $meta_model;
                }
                $insertMeta->{$meta_rel_key} = $model_id;
                $insertMeta->meta_key = $MetaKey;
                $insertMeta->meta_value = $metaValue;
                $insertMeta->provider = $provider;
                $insertMeta->save();
            }
        }
    }

    //fetch model data along with related data from meta table with where condition
    public function scopeWhereMeta($query, $metaKey,  $metaValue)
    {
        $provider=$this->provider;
        return $query->whereHas('meta_relation', function($query) use($metaKey, $metaValue, $provider)
        {
            $query->where('provider',$provider)->where('meta_key', "LIKE", '%'.$metaKey.'%')->where('meta_value', "LIKE", '%'.$metaValue.'%');
        });
    }

    public  function scopeQueryBinding($query)
    {
        return vsprintf(str_replace('?', '%s', $query->toSql()), collect($query->getBindings())->map(function ($binding) {
            return is_numeric($binding) ? $binding : "'{$binding}'";
        })->toArray());
    }


    //custom pagination  function
    public function scopeLbsSimplePagination($query, $count, $total=false)
    {
         $pagination=[];
         return $query->simplePaginate($count);
    }

    public static function findMeta($model_id, $metaKey)
    {
        return (new self)->FindMetaHelper($model_id, $metaKey);
    }

    protected function FindMetaHelper($model_id, $metaKey){
        $provider=$this->meta_provider;
        $meta_model=$this->meta_model;
        $meta_rel_key=$this->meta_rel_key;
        $metadata=$meta_model::where($meta_rel_key, $model_id )->where('meta_key', $metaKey)->where('provider',$provider)->first();
       if ( $metadata) {
        return   $metadata->meta_value;
       }
       return null;
    }

}
