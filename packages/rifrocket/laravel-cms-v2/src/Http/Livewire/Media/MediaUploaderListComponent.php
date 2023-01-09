<?php

namespace Rifrocket\LaravelCmsV2\Http\Livewire\Media;

use Illuminate\Support\Arr;
use Livewire\Component;
use Livewire\WithPagination;
use Rifrocket\LaravelCmsV2\Models\LbsUpload;

class MediaUploaderListComponent extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap',$queryString = ['search_title'];

    public $number_of_rows = 36;
    public $name=null, $datatype=null, $multiple=false, $preview=false, $old_media=null, $open_media_model=false;
    public $search_title, $search_file_type="", $search_timeline="";
    public $set_selected=[], $selectMediaCols=[];

    public function emitNotifications($message, $msgType)
    {
        $this->dispatchBrowserEvent('toast-notification-component', ['type' => $msgType,  'message' => $message]);
    }

    public function mount()
    {

        if ($this->old_media) {
            $this->old_media=json_decode($this->old_media,true);
            if (is_array($this->old_media)) {
                foreach ($this->old_media as $key => $value) {
                    $mediaCollect = LbsUpload::find($value);
                    $this->selectMediaCols[$mediaCollect->id]=['id'=>$mediaCollect->id, 'media_type'=>$mediaCollect->file_type,'original_name'=>$mediaCollect->original_name];
                }
                $this->set_selected=array_combine($this->old_media, $this->old_media);
            }
            else{
                $this->set_selected[$this->old_media]=$this->old_media;
                $mediaCollect = LbsUpload::find($this->old_media);
                $this->selectMediaCols[$mediaCollect->id]=['id'=>$mediaCollect->id, 'media_type'=>$mediaCollect->file_type,'original_name'=>$mediaCollect->original_name];
            }
            $this->add_file();
        }
    }

    public function mediaModel($value=false)
    {
        if ($value) {
            $this->open_media_model=true;
            $this->dispatchBrowserEvent('open-media-uploader',['modeId'=>$this->name]);
        }else{
            $this->open_media_model=false;
        }
    }

    public function onSelectMedia($id)
    {
        $mediaCollect = LbsUpload::find($id);


        if (Arr::has($this->set_selected, $mediaCollect->id)) {
            unset($this->set_selected[$mediaCollect->id]);
            unset($this->selectMediaCols[$mediaCollect->id]);
        }else{
            if (!$this->multiple) {
                $this->set_selected=[];
                $this->set_selected[$mediaCollect->id]=$mediaCollect->id;
                $this->selectMediaCols=[];
                $this->selectMediaCols[$mediaCollect->id]=['id'=>$mediaCollect->id, 'media_type'=>$mediaCollect->file_type,'original_name'=>$mediaCollect->original_name];
            }else{

                $this->set_selected[$mediaCollect->id]=$mediaCollect->id;
                $this->selectMediaCols[$mediaCollect->id]=['id'=>$mediaCollect->id, 'media_type'=>$mediaCollect->file_type,'original_name'=>$mediaCollect->original_name];
            }
        }
        $this->add_file();
    }

    public function add_file()
    {
        $setValue=[];
        if (! $this->set_selected) {
            $this->dispatchBrowserEvent('set-media-uploader',['targetId'=>$this->name, 'setValue'=>$setValue]);
            $this->emit('set-media-uploader',['targetId'=>$this->name, 'setValue'=>$setValue]);
            return $this->emitNotifications('no file chosen', 'warning');
        }
        if (!$this->multiple) {
            $setValue=array_keys($this->set_selected)[0];
        }else{
            $tmpArray=$this->set_selected;
            $setValue=json_encode(array_map('strval', array_keys($tmpArray)));
        }
        $this->dispatchBrowserEvent('set-media-uploader',['targetId'=>$this->name, 'setValue'=>$setValue]);
        $this->emit('set-media-uploader',['targetId'=>$this->name, 'setValue'=>$setValue]);

    }

    public function remove_file($value)
    {
        unset($this->set_selected[$value]);
        unset($this->selectMediaCols[$value]);
        $this->add_file();
    }

    public function clear_files()
    {
        $this->set_selected=[];
        $this->selectMediaCols=[];
        $this->add_file();
    }


    public function updatedSearchTimeline()
    {
        $this->searchEngin();
        $this->resetPage();
    }

    public function updatedSearchTitle()
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
         if ($this->datatype and $this->datatype != "") {
            $query->where('file_type', $this->datatype);

         }

         if ($this->search_title and $this->search_title != "") {
            $query->where('original_name', 'like', '%'.$this->search_title.'%')->orWhere('alternate_name', 'like', '%'.$this->search_title.'%');

         }
         return $query;
    }
    public function render()
    {
        $collections=[];
        $TotalCount=0;
        if ($this->open_media_model) {
            $collectionHold=$this->searchEngin();
            $TotalCount=$collectionHold->count();
            $collections=$collectionHold->simplePaginate($this->number_of_rows);
        }

        return view('LbsViews::livewire.media.media-uploader-list-component', compact('collections','TotalCount'));
    }
}
