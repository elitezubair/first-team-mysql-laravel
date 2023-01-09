<?php

namespace Rifrocket\LaravelCmsV2\Http\Livewire\Media;

use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use Rifrocket\LaravelCmsV2\Models\LbsUpload;

class MediaListComponent extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $number_of_rows = 18;
    protected $queryString = ['search_title'];

    public $mediaCollect, $original_name=null, $alternate_name=null, $description=null, $is_private=null, $media_link=null;

    public $search_title, $search_file_type="", $search_timeline="";

    public function emitNotifications($message, $msgType)
    {
        $this->dispatchBrowserEvent('toast-notification-component', ['type' => $msgType,  'message' => $message]);
    }

    public function onSelectMedia($id)
    {
        $this->mediaCollect = LbsUpload::find($id);
        $this->original_name=$this->mediaCollect->original_name;
        $this->alternate_name=$this->mediaCollect->alternate_name;
        $this->description=$this->mediaCollect->description;
        $this->is_private=$this->mediaCollect->is_private;
        $this->media_link=lbsUploadedAsset($this->mediaCollect);
    }

    public function updatedOriginalName($value)
    {
        $this->mediaCollect->update(['original_name'=>$value]);
    }
    public function updatedAlternateName($value)
    {
        $this->mediaCollect->update(['alternate_name'=>$value]);
    }
    public function updatedDescription($value)
    {
        $this->mediaCollect->update(['description'=>$value]);
    }
    public function updatedIsPrivate($value)
    {
        $directory='public';
        if ($value==true) {
            $directory='storage';
            File::move(storage_path('app/public/').$this->mediaCollect->file_path, storage_path('app/').$this->mediaCollect->file_path);
        }else{
            File::move(storage_path('app/').$this->mediaCollect->file_path, storage_path('app/public/').$this->mediaCollect->file_path);
        }
        $json =[auth()->user()->getTable().'|'.auth()->user()->id];
        $this->mediaCollect->update(['is_private'=>$value, 'directory'=>$directory,'user_set'=>json_encode($json)]);
        $this->onSelectMedia($this->mediaCollect->id);
    }

    public function delete()
    {
        $this->mediaCollect->update(['deleted_at'=>Carbon::now(),'status'=>'deactivated']);
        LbsUpload::where('file_id',$this->mediaCollect->id)->update(['deleted_at'=>Carbon::now(),'status'=>'deactivated']);
        $this->mediaCollect=[];
    }

    public function updatedSearchFileType($value)
    {
        $this->searchEngin();
        $this->resetPage();
    }
    public function updatedSearchTimeline($value)
    {
        $this->searchEngin();
        $this->resetPage();
    }

    public function updatedSearchTitle($value)
    {
        $this->searchEngin();
        $this->resetPage();
    }

    public function searchEngin()
    {

         $query = LbsUpload::listMedia()->where('user_id',auth()->user()->id)->notDel();
         if ($this->search_timeline and $this->search_timeline != "") {
            switch ($this->search_timeline) {
                case 'newest':
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'oldest':
                    $query->orderBy('created_at', 'asc');
                    break;
                case 'smallest':
                    $query->orderBy('file_size', 'asc');
                    break;
                case 'largest':
                    $query->orderBy('file_size', 'desc');
                    break;
                default:
                    $query->orderBy('created_at', 'desc');
                    break;
            }

         }
         if ($this->search_file_type and $this->search_file_type != "") {
            $query->where('file_type', $this->search_file_type);

         }

         if ($this->search_title and $this->search_title != "") {
            $query->where('original_name', 'like', '%'.$this->search_title.'%')->orWhere('alternate_name', 'like', '%'.$this->search_title.'%');

         }
         return $query;
    }
    public function render()
    {
        $collectionHold=$this->searchEngin();
        $TotalCount=$collectionHold->count();
        $collections=$collectionHold->simplePaginate($this->number_of_rows);
        return view('LbsViews::livewire.media.media-list-component', compact('collections','TotalCount'));
    }
}





