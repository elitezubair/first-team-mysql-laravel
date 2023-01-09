<?php

namespace App\Http\Livewire;
use Illuminate\Http\Request;
use Livewire\Component;
use validator;
use Session;
use App\Models\User;
use Hash;
class RegisterationModalComponent extends Component
{

    public $first_name;
    public $last_name;
    public $email;
    public $password;

    protected $rules=[
          'first_name'=>'required',
          'last_name'=>'required',
          'email'=>'required|unique:users,email',
          'password'=>'required',
        ];



    public function resetform()
    {
        $this->first_name = null;
        $this->last_name = null;
        $this->email = null;
        $this->password=null;
    }

    public function BsNirEvent()
    {

        $validated = $this->validate();
        $users= new User;
        $users->name = $this->first_name.' '.$this->last_name;
        $users->email=$this->email;
        $users->password=Hash::Make($this->password);
        $users->save();
        if($users)
        {
            $this->resetform();
            // Session::flash('msg','Registeration Success');
            $this->dispatchBrowserEvent('successform');
        }
        else
        {
            $this->dispatchBrowserEvent('errorform');
            // Session::flash('Error','Please Try Again');
        }

    }

    public function render()
    {
        return view('livewire.registeration-modal-component');
    }
}
