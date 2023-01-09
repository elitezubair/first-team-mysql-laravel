<?php

namespace App\Http\Livewire\Frontend;

use App\Models\FavoriteProperty;
use App\Models\PropertySearchhistory;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Rifrocket\LaravelCmsV2\Models\LbsMember;

class UserDashboard extends Component
{
    use WithFileUploads;
    public $profile_full_name, $profile_first_name, $profile_last_name, $profile_email, $profile_password_old, $profile_password_new, $profile_location, $profile_avatar;
    public $favorites=[],$searchHistory=[];

    public function emitNotifications($message, $msgType)
    {
        $this->dispatchBrowserEvent('toast-notification-component', ['type' => $msgType,  'message' => $message]);
    }

    public function mount()
    {
        $this->profile_full_name = auth()->user()->display_name;
        $this->profile_first_name = auth()->user()->first_name;
        $this->profile_last_name = auth()->user()->last_name;
        $this->profile_email = auth()->user()->email;
        $this->profile_location = LbsMember::findMeta(auth()->user()->id, 'location');
    }

    public function fetchFavorites()
    {
        $this->favorites= FavoriteProperty::with('property')->notDel()->where('member_id', auth()->user()->id)->get();
    }

    public function fetchSearchHistory()
    {
        $this->searchHistory= PropertySearchhistory::notDel()->where('member_id', auth()->user()->id)->get();
    }


    public function updatedProfileFirstName($value)
    {
        $this->profile_full_name=$this->profile_first_name.' '.$this->profile_last_name;
    }
    public function updatedProfileLastName()
    {
        $this->profile_full_name=$this->profile_first_name.' '.$this->profile_last_name;
    }

    public function profileUpdate()
    {
        $user=LbsMember::find(auth()->user()->id);
        $this->validate([
            'profile_full_name' => 'required',
            'profile_first_name' => 'required',
            'profile_last_name' => 'required',
        ]);

        if ($this->profile_password_old or $this->profile_password_new) {

            $this->validate([
                'profile_password_old' => 'required|min:6',
                'profile_password_new' => 'required|min:6',
            ]);

            if (Hash::check($this->profile_password_old, $user->profile_password_new)) {
                $user->fill([
                'password' => Hash::make($this->profile_password_new)
                ])->save();
            }
        }

        $user->first_name=$this->profile_first_name;
        $user->last_name=$this->profile_last_name;
        $user->display_name=$this->profile_first_name.' '.$this->profile_last_name;
        $user->save();

        return $this->emitNotifications('profile updated successfully', 'success');

    }
    public function updatedProfileAvatar($value)
    {
        $original_name=$this->profile_avatar->getClientOriginalName();
        $this->profile_avatar->storeAs('uploads/profile/img',$original_name,'public_uploads' );

        $user=LbsMember::find(auth()->user()->id);
        $user->avatar=URL('uploads/profile/img/'.$original_name);
        $user->save();
        return $this->emitNotifications('profile avatar updated successfully', 'success');
    }

    public function removeFavorite($szMLS_no)
    {
       FavoriteProperty::where('member_id',auth()->user()->id)->where('szMLS_no', $szMLS_no)->first()->delete();
       $this->fetchFavorites();
       $this->emitNotifications('row deleted successfully ', 'success');
    }

    public function removeSearchHistory($szMLS_no)
    {
        PropertySearchhistory::find($szMLS_no)->delete();

       $this->fetchSearchHistory();
       $this->emitNotifications('row deleted successfully ', 'success');
    }

    public function render()
    {
        return view('livewire.frontend.user-dashboard');
    }
}
