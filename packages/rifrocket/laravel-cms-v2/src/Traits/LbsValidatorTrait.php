<?php
namespace Rifrocket\LaravelCmsV2\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use Rifrocket\LaravelCmsV2\Notifications\LbsEmailOtpNotification;

trait LbsValidatorTrait
{
    public static function sendOTP($target,$driver)
    {
        $model = get_called_class();
        $otp=lbsRandomStr(6);
        $expiry=Carbon::now()->addMinutes(config('laravel-cms-v2.otp_expiry'));

        $fillable=[
            'target'=>$target,
            'driver',$driver,
            'otp'=>$otp,
            'expiry'=>$expiry,
            'verified'=>0,
        ];
        $model::create($fillable);

        switch ($driver) {
            case 'email':
                self::SendEmailOTP($target,$otp);
                break;

            case 'phone':
                self::SendSmsOTP($target);
                break;
        }

        return ['success','OTP send successfully to '.$target];
    }

    protected static function SendSmsOTP($target){
        $model = get_called_class();
    }


    protected static function SendEmailOTP($target,$otp){
        Notification::route('mail', $target)->notify(new LbsEmailOtpNotification($otp));
    }

    public static function verifyOTP($target, $otp){
        $model = get_called_class();
        $verify=$model::where('target',$target)->where('otp',$otp)->where('verified',0)->orWhere('verified',null)->first();
        if ($verify) {

            if (Carbon::now()->gt($verify->expiry)) {
                return ['error','OTP expired'];
            }
            $verify->update(['verified'=>1, 'verified_at'=>Carbon::now()]);
            return ['success','OTP verified'];
        }
        return ['error','OTP record not found or OTP expired'];
    }

}

