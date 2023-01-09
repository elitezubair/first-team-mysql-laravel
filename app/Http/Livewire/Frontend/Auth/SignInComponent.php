<?php

namespace App\Http\Livewire\Frontend\Auth;

use Livewire\Component;
use Rifrocket\LaravelCmsV2\Models\LbsMember;

class SignInComponent extends Component
{
    public $email, $password;

    public function emitNotifications($message, $msgType)
    {
        $this->dispatchBrowserEvent('toast-notification-component', ['type' => $msgType,  'message' => $message]);
    }

    protected $rules=[
        'email'=>'required',
        'password'=>'required',
      ];

    public function submit_form()
    {
        $redirect='public.property_landing_page';
        $this->validate();
        $response =  LbsMember::lbsLogin(['email'=>$this->email, 'password'=>$this->password] , $redirect, 'web');
        if ( is_array($response) and $response[0]=='error') {

            return $this->emitNotifications($response[1], 'error');
        }return $response;
    }
    public function render()
    {
        return view('livewire.frontend.auth.sign-in-component');
    }
}
