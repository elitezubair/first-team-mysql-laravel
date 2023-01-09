<?php

namespace Rifrocket\LaravelCmsV2\Http\Livewire\Auth;

use Livewire\Component;

class LoginComponent extends Component
{
    public $model, $guard, $logged_in_redirect_route;
    public $email = null, $password = null, $rememberMe = null;

    public function emitNotifications($message, $msgType)
    {
        $this->dispatchBrowserEvent('toast-notification-component', ['type' => $msgType,  'message' => $message]);
    }

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:8',
    ];


    protected $messages = [
        'email.required' => 'Email Address cannot be empty.',
        'email.email' => 'Email Address format is not valid.',
        'email.regex' => 'Email Address format is not valid.',
        'password.required' => 'Password cannot be empty.',
    ];

    public function tryAuthorization()
    {
        $this->validate();
        $requestArray=['email'=>$this->email, 'password'=>$this->password, 'rememberMe'=>$this->rememberMe];
        $response = $this->model::lbsLogin($requestArray, $this->logged_in_redirect_route, $this->guard);
        if (is_array($response)) {
            return $this->emitNotifications($response[1], $response[0]);
        }
        return $response;
    }


    public function render()
    {
        return view('LbsViews::livewire.auth.login-component');
    }
}
