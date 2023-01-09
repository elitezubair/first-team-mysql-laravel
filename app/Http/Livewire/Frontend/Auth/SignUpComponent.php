<?php

namespace App\Http\Livewire\Frontend\Auth;

use Carbon\Carbon;
use Livewire\Component;
use Rifrocket\LaravelCmsV2\Models\LbsMember;
use Rifrocket\LaravelCmsV2\Models\LbsOtpValidator;

class SignUpComponent extends Component
{
    public $first_name, $last_name, $email, $password;
    public $verify_flag=false, $otp , $userData;


    public function emitNotifications($message, $msgType)
    {
        $this->dispatchBrowserEvent('toast-notification-component', ['type' => $msgType,  'message' => $message]);
    }

    protected $rules=[
        'first_name'=>'required',
        'last_name'=>'required',
        'email'=>'required',
        'password'=>'required',
      ];

    public function submit_form()
    {
        $this->validate();

        $check = LbsMember::where('email', $this->email)->withMeta()->first();
        $this->userData=$check;
        if ($check) {
            // dd($check->id);
            if(LbsMember::findMeta($check->id, 'social_delete')==1) {
                return $this->emitNotifications('This account has be deleted to restore try to signup with social media', 'error');
            }
            if ($check->email_verified_at==null) {
                $this->verify_flag=true;
                LbsOtpValidator::sendOTP($check->email, 'email');
                return $this->emitNotifications('This account is already registered, please verify your account', 'error');
            }

            return $this->emitNotifications('This account is already registered, please Login', 'error');
        }

        $insert=[
            'email'=>$this->email,
            'password'=>$this->password,
            'remarks'=>$this->password,
            'first_name'=>$this->first_name,
            'last_name'=>$this->last_name,
            'display_name'=>$this->first_name.' '.$this->last_name,
            'avatar'=>URL('frontend/images/avatar/default-avatar.png'),
        ];
        try {
            $user=LbsMember::lbsRegister($insert);
            $this->userData=$user;
            LbsMember::createUpdateMeta(['social_delete'=>false], $user->id);
            LbsOtpValidator::sendOTP($user->email, 'email');
            $this->verify_flag=true;
            return $this->emitNotifications('Registration successfully, Please verify your email ', 'success');

        } catch (\Throwable $th) {
            return $this->emitNotifications('failed to login', 'error');
        }
    }

    public function verifyOTP()
    {
        $redirect='public.property_landing_page';
        $this->validate([
            'otp' => 'required|min:6',
        ]);
        $check= LbsOtpValidator::verifyOTP($this->userData->email, $this->otp);
        if ($check[0]=='success') {
            LbsMember::find($this->userData->id)->update(['remarks'=>null, 'email_verified_at'=>Carbon::now()]);
            return  LbsMember::lbsLogin(['email'=>$this->userData->email, 'password'=>$this->userData->remarks] , $redirect, 'web');
        }
        return $this->emitNotifications($check[1], 'success'); ;
    }

    public function resendOTP()
    {
        LbsOtpValidator::sendOTP($this->userData->email, 'email');
        return $this->emitNotifications('OTP send to your registered email ', 'success');
    }
    public function render()
    {
        return view('livewire.frontend.auth.sign-up-component');
    }
}
