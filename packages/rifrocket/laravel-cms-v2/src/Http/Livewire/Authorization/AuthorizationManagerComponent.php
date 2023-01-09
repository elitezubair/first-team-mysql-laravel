<?php

namespace Rifrocket\LaravelCmsV2\Http\Livewire\Authorization;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AuthorizationManagerComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $page_range=['10'=>'10','100'=>'100'];
    public $basic_search=null;
    public $number_of_rows = 10;
    public function emitNotifications($message, $msgType){
        $this->dispatchBrowserEvent('toast-notification-component', ['type' => $msgType,  'message' => $message]);
    }



    public $role, $role_id=null, $permissionList=[], $permissions=[];
    public $card_title='Create Role', $showList=true;

    protected $rules = [
        'role' => 'required',
    ];


    public function mount()
    {
        if (config('laravel-cms-v2.defaultPageRange')) {
            $this->page_range=config('laravel-cms-v2.defaultPageRange');
        }
        $this->fetchOnMount();
    }

    protected function fetchOnMount()
    {
        $this->permissionList=Permission::where('status','active')->where('deleted_at',null)->get();
    }

    public function create_role()
    {
        $this->validate();
        try {
            $role = Role::create(['name' =>$this->role]);
            if ($this->permissions) {
                $role->syncPermissions($this->permissions);
            }
            $this->resetForm();

          return  $this->emitNotifications('role created successfully', 'success');
        } catch (\Throwable $th) {

         return  $this->emitNotifications($th->getMessage(), 'error');
        }
    }


    public function editRole($role_id)
    {
        $this->role_id=$role_id;
        $role = Role::find($role_id);
        $this->role=$role->name;
        $this->permissions=$role->permissions->pluck('name')->toArray();
        $this->dispatchBrowserEvent('refresh-dual-select-box');
        $this->card_title='update role';
    }


    public function update_role()
    {
        $rules['role_id'] ='required|numeric';
        $this->validate();
        try {
            $role = Role::find($this->role_id);
            $role->update(['name' =>$this->role]);
            if ($this->permissions) {
                $role->syncPermissions($this->permissions);
            }
            $this->resetForm();
          return  $this->emitNotifications('role updated successfully', 'success');
        } catch (\Throwable $th) {
         return  $this->emitNotifications($th->getMessage(), 'error');
        }
    }

    protected function resetForm()
    {
        $this->role=null;
        $this->role_id=null;
        $this->permissions=[];
        $this->card_title='Create Role';
        $this->dispatchBrowserEvent('refresh-dual-select-box');
        $this->dispatchBrowserEvent('toggle-modal',['modal_id'=>'authorization-modal']);
    }

    protected function searchEngin()
    {
        // $query=Role::;
    }

    public function render()
    {
        $collections = $this->searchEngin();
        return view('LbsViews::livewire.authorization.authorization-manager-component', compact('collections'));
    }
}
