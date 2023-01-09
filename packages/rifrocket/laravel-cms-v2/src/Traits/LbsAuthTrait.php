<?php
namespace Rifrocket\LaravelCmsV2\Traits;

use Illuminate\Support\Facades\Auth;
use Rifrocket\LaravelCmsV2\Classes\LbsConstant;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Rifrocket\LaravelCmsV2\Models\LbsOtpValidator;

trait LbsAuthTrait
{

    // protected $guard='';
    // protected $redirect='';
    // protected $meta_provider='';

    /*
    * Reserved veriables for meta tablse:
    *
    * protected $metaModel = meta model path;
    * protected $meta_rel_key = key that is bind with meta model;
    * protected $meta_provider = provide if model contails more the one parent tabel's information (unique for the every parent model);
    *
    */

    /*
    * Request parameters:
    *
    * email
    * password
    * confirm_password
    *
    */

    public static function lbsRegister(array $requestArray)
    {
        try {

            $model = get_called_class();
            $userInfo=$model::where('email', $requestArray['email'])->first();
            if (!empty($userInfo)){
                return ['error','email address or password does not exist.'];
            }
            $requestArray['password']=Hash::make($requestArray['password']);
            return $model::query()->create($requestArray);

        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }


    public static function lbsLogin(array $requestArray , $redirect, $guard)
    {
        try {

            $model = get_called_class();
            $userInfo=$model::where('email', $requestArray['email'])->first();
            if (empty($userInfo) or  !isset($requestArray['password'])){
                return ['error','email address does not exist.'];
            }

            if ($userInfo and $userInfo->deleted_at != null){
                return ['error','This account does not  exist anymore'];
            }

            if ($userInfo->status != LbsConstant::STATUS_ACTIVE){
                return ['error','your account has been '.$userInfo->status];
            }
            if (self::attemptLogin($requestArray,$guard)) {

                self::lbsUserSession($guard);
                return redirect(self::redirectPath($redirect));
            }
            return ['error','email address or password does not exist.'];

        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }


    protected static function attemptLogin(array $requestArray,$guard)
    {
        if (isset($requestArray['rememberMe'])) {
            return Auth::guard($guard)->attempt(
                ['email' =>$requestArray['email'],'password' =>$requestArray['password']], $requestArray['rememberMe'] );
        }

        return Auth::guard($guard)->attempt(
            ['email' =>$requestArray['email'],'password' =>$requestArray['password']]);
    }

    protected static function redirectPath($redirect)
    {
        return route($redirect);
    }


    public static function lsbLogout($guard,$redirect)
    {
        Auth::guard($guard)->logout();
        Session::invalidate();
        Session::regenerateToken();
        return redirect(self::redirectPath($redirect));
    }


    public static function lbsForgetPassword(array $requestArray)
    {
        try {
            $model =get_called_class();
            $userInfo=$model::where('email', $requestArray['email'])->first();
            if (!$userInfo){
                return ['error','email address or password does not exist.'];
            }
            if ($userInfo->deleted_at != null){
                ['error','This account does not  exist anymore'];
            }
            if ($userInfo->status != LbsConstant::STATUS_ACTIVE){
               ['error','your account has been '.$userInfo->status];
            }
           return LbsOtpValidator::sendOTP($requestArray['email'],'email');

        }catch (\Exception $exception){

            return $exception->getMessage();
        }
    }


    public static function lbsRestPassword(array $requestArray)
    {
        $model =get_called_class();
        $response = LbsOtpValidator::verifyOTP($requestArray['email'],$requestArray['otp']);
        if (is_array($response) and $response[0]=='error') {
            return $response;
        }
        $userInfo=$model::where('email', $requestArray['email'])->first();
        $userInfo->update(['password'=>Hash::make($requestArray['password'])]);
        return $userInfo;
    }

    public static function lbsUserSession($guard)
    {
        if (Auth::guard($guard)->check()) {
            $model = get_called_class();
            $userInfo=$model::withMeta()->first()->toArray();
            Session::put('_LbsUserSession',$userInfo);
            Session::save();
            $LbsLteSession=[];

            // if (self::lbs_get_LteSettingInfo('lsb_lte_setting',['admin_id'=>$userInfo->id])){
            //     $LbsLteSession=self::lbs_get_LteSettingInfo('lsb_lte_setting',['admin_id'=>$userInfo->id]);
            // }
            // Session::put('_LbsLteSession',$LbsLteSession);
            // Session::save();
        }
    }

    public static function lbs_get_LteSettingInfo($model, array $requests)
    {
        $userLteSetting= $model::withMeta();
        if (!empty($userLteSetting) and !$userLteSetting->isEmpty()){
            return (object)collect($userLteSetting[0])->all();
        }
        return null;
    }



}
