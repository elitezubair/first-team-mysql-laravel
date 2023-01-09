<?php

namespace Rifrocket\LaravelCmsV2\Http\Livewire\Auth;

use Livewire\Component;

class ForgetPasswordComponent extends Component
{
    public $model, $guard, $logged_in_redirect_route;
    public $email = null, $otp = null, $password = null, $confirm_password=null;
    public $flag = false;

    public function emitNotifications($message, $msgType)
    {
        $this->dispatchBrowserEvent('toast-notification-component', ['type' => $msgType,  'message' => $message]);
    }


    protected $rules = [
        'email' => 'required|email',
    ];


    protected $messages = [
        'email.required' => 'Email Address cannot be empty.',
        'email.email' => 'Email Address format is not valid.',
    ];

    public function sendOTP()
    {
        $this->validate();
        $response=$this->model::lbsForgetPassword(['email'=>$this->email]);

        if (is_array($response)) {
            if ($response[0] == 'success') {
                $this->flag= true;
            }
            return $this->emitNotifications($response[1], $response[0]);
        }
    }


    public function resetPassword()
    {

        $this->rules = [
            'otp'=>'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required',
        ];
        $this->validate();

        if ($this->password != $this->confirm_password) {
            return $this->emitNotifications('confirm password does not match with the password','error');
        }

        $requestArray=[
            'email'=>$this->email,
            'otp'=>$this->otp,
            'password'=>$this->password,
        ];
        $response=$this->model::lbsRestPassword($requestArray);
        if (is_array($response)) {
            return $this->emitNotifications($response[1], $response[0]);
        }

        return redirect()->route($this->logged_in_redirect_route);
    }
    public function render()
    {
        return view('LbsViews::livewire.auth.forget-password-component');
    }
}
