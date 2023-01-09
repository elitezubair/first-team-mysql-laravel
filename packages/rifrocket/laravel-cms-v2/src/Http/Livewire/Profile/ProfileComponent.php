<?php

namespace Rifrocket\LaravelCmsV2\Http\Livewire\Profile;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ProfileComponent extends Component
{
    public $model, $guard, $roles_permissions;

    public $roles=[], $permissions=[], $name=null, $first_name=null, $last_name=null, $email=null, $avatar=null, $password=null, $designation=null;
    public $education=null, $location=null, $skills=null, $notes=null;

    protected $listeners = ['set-media-uploader' => 'mediaManager'];

    public function emitNotifications($message, $msgType)
    {
        $this->dispatchBrowserEvent('toast-notification-component', ['type' => $msgType,  'message' => $message]);
    }

    function mediaManager($data)
    {
        $this->{$data['targetId']}=$data['setValue'];
    }

    public function mount()
    {
        $this->fetchInfo();
    }

    public function fetchInfo()
    {
        $modelFound = $this->model::where('id',auth()->user()->id)->withMeta()->first();

                // $roles= $modelFound->
        // $permissions= $modelFound->permissions;
        $this->first_name= $modelFound->first_name;
        $this->last_name= $modelFound->last_name;
        $this->name= $modelFound->display_name;
        $this->email= $modelFound->email;
        $this->designation= $modelFound->designation;
        $this->avatar= $modelFound->avatar;
        $this->education= $modelFound->education;
        $this->location= $modelFound->location;
        $this->skills= $modelFound->skills;
        $this->notes= $modelFound->notes;

        // dd($modelFound);
    }

    public function updateSetting()
    {
        $this->name=$this->first_name.' '.$this->last_name;
        $insertable=[
            'display_name'=>$this->name,
            'designation'=>$this->designation,
            'avatar'=>$this->avatar,
            'last_name'=>$this->last_name,
            'first_name'=>$this->first_name,
        ];
        if ($this->password) {
            $insertable['password']=Hash::make($this->password);
        }

        $updateModel=$this->model::find(auth()->user()->id);
        $updateModel->update($insertable);
        $this->password=null;
        $this->emitNotifications('profile setting updated','success');
    }
    public function update_personal_info()
    {
        $insertable=[
            'education'=>$this->education,
            'location'=>$this->location,
            'notes'=>$this->notes,
        ];
        $this->model::CreateUpdateMeta($insertable,auth()->user()->id);
        $this->emitNotifications('personal information updated','success');
    }
    public function render()
    {
        return view('LbsViews::livewire.profile.profile-component');
    }
}
