<?php

namespace App\Http\Livewire\Frontend;

use App\Models\NewsFeed;
use Livewire\Component;
use Livewire\WithPagination;
class ListNewsFeedsComponent extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $perPageItem=9 ;
    public $searchString='Local';
    public $autoLocate=false;

    public function fetchCategory($value)
    {
        $this->searchString=$value;
        $this->resetPage();
    }
    public function searchEngin()
    {
        $this->dispatchBrowserEvent('refresh-owl-carousel');
        $query = NewsFeed::orderBy('id','desc');
        if ($this->searchString) {
            if ($this->searchString=='Local') {
                $query = $query->where('category','!=',$this->searchString );
            }else{
                $query = $query->where('category','LIKE','%'.$this->searchString.'%' );
            }

        }
        $query = $query->select('id','title','banner_image','description','link');
        return $query = $query->paginate($this->perPageItem);
    }


    public function render()
    {
        $collections  = $this->searchEngin();
        return view('livewire.frontend.list-news-feeds-component', compact('collections'));
    }
}
