<?php
namespace Rifrocket\LaravelCmsV2\Traits;

use Illuminate\Support\Arr;

trait LbsAppSettingTrait
{

    public function scopeAppSetting($query,array $filter=null)
    {
        $LbsAppSettings=[];
        $appSettings= $query->OnlyActive()->get()->toArray();
        foreach ($appSettings as $key => $value){

            $LbsAppSettings["{$value['setting_key']}"]=$value['setting_value'];
        }
        if ($filter and !empty($filter)){

            $LbsAppSettings = Arr::only($LbsAppSettings, $filter);
        }
        return json_decode(json_encode($LbsAppSettings));
    }

    public function scopeFindKey($query, $settingKey)
    {
        $LbsAppSettings=[];
        $appSettings= $query->OnlyActive()->where('setting_key',$settingKey)->first()->toArray();

        $LbsAppSettings["{$appSettings['setting_key']}"]=$appSettings['setting_value'];

        return json_decode(json_encode($LbsAppSettings));
    }


    public function scopeCreateOrUpdate($query, $insertable)
    {
        $model = get_called_class();

        if ($insertable and is_array($insertable)) {

            if (count($insertable) == count($insertable, COUNT_RECURSIVE))
            {
                foreach ($insertable as $key => $value) {
                    $exist = $model::where('setting_key', $key)->first();
                    if (!$exist ) {
                        $exist = new $model;
                    }
                    $exist->setting_key = $key;
                    $exist->setting_value = $value;
                    $exist->save();
                }
            }
            else
            {
                foreach ($insertable as $singleInsertable) {
                    foreach ($singleInsertable as $key => $value) {
                        $exist = $model::where('setting_key', $key)->first();
                        if (!$exist ) {
                            $exist = new $model();
                        }
                        $exist->setting_key = $key;
                        $exist->setting_value = $value;
                        $exist->save();

                    }
                }
            }
        }
    }

    public function scopeCreateOrUpdateEnv($query, $insertable)
    {
        $model = get_called_class();

        if ($insertable and is_array($insertable)) {

            if (count($insertable) == count($insertable, COUNT_RECURSIVE))
            {
                foreach ($insertable as $key => $value) {
                    $exist = $model::where('setting_key', $key)->first();
                    if (!$exist ) {
                        $exist = new $model;
                    }
                    $exist->setting_key = $key;
                    $exist->setting_value = $value;
                    $exist->save();
                   $res= self::overWriteEnvFile($key, $value);
                //    return ['error',$res];
                }
            }
            else
            {

                foreach ($insertable as $singleInsertable) {

                    $counter=0;
                    foreach ($singleInsertable as $key => $value) {
                        $exist = $model::where('setting_key', $key)->first();
                        if (!$exist ) {
                            $exist = new $model();

                            if ($counter==0) {
                                $path = base_path('.env');
                                file_put_contents($path, file_get_contents($path)."\r\n");
                            }
                        }

                        $exist->setting_key = $key;
                        $exist->setting_value = $value;
                        $exist->save();

                        self::overWriteEnvFile($key, $value);
                        $counter++;
                    }
                }
            }
            return ['success','app setting updated'];
        }

        return ['error','something went wrong'];
    }

    protected static function overWriteEnvFile($type, $val)
    {

        $path = base_path('.env');
        if (file_exists($path)) {
            $val = '"'.trim($val).'"';
            if(is_numeric(strpos(file_get_contents($path), $type)) && strpos(file_get_contents($path), $type) >= 0){
                file_put_contents($path, str_replace(
                    $type.'="'.env($type).'"', $type.'='.$val, file_get_contents($path)
                ));
                if (empty('"'.env($type).'"') && $val != '""') {
                    // return $val;
                    file_put_contents($path, str_replace(
                        $type.'='.env($type), $type.'='.$val, file_get_contents($path)
                    ));
                }
            }
            else{
                file_put_contents($path, file_get_contents($path)."\r\n".$type.'='.$val);

            }
        }
    }


    protected static function overWriteEnvFileWithoutCourts($type, $val)
    {
        $path = base_path('.env');
        if (file_exists($path)) {
            $val = trim($val);
            if(is_numeric(strpos(file_get_contents($path), $type)) && strpos(file_get_contents($path), $type) >= 0){
                file_put_contents($path, str_replace(
                    $type.'='.env($type), $type.'='.$val, file_get_contents($path)
                ));
            }
            else{
                file_put_contents($path, file_get_contents($path)."\r\n".$type.'='.$val);
            }
        }
    }

}
