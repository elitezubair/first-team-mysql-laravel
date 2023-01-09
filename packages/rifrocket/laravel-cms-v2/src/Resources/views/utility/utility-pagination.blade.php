<?php

//$total_pages; //total numbers of records
//$num_results_on_page; //per page records
//$page; //current page number

?>
@if (ceil($total_pages / $num_results_on_page) > 0)
<nav>
    <ul class="pagination">
        @if ($page > 1)
        <li class="page-item">
            <button type="button" dusk="PreviousPage" class="page-link yus-btn-previous" wire:click="previousPage" wire:loading.attr="disabled" rel="Previous" aria-label="Previous">‹</button>
             </li>
        @endif

        @if ($page > 3)
            <li class="page-item" wire:key="paginator-page-1-page-1"><button type="button" class="page-link" wire:click="gotoPage(1)">1</button></li>
            <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
        @endif

        @if($page-2 > 0)
            <li class="page-item" wire:key="paginator-page-1-page-{{$page-2}}"><button type="button" class="page-link" wire:click="gotoPage({{$page-2}})">{{$page-2}}</button></li>
        @endif
        @if($page-1 > 0)
            <li class="page-item" wire:key="paginator-page-1-page-{{$page-1}}"><button type="button" class="page-link" wire:click="gotoPage({{$page-1}})">{{$page-1}}</button></li>
        @endif
        <li class="page-item active" wire:key="paginator-page-1-page-{{$page}}"><button type="button" class="page-link" wire:click="gotoPage({{$page}})">{{$page}}</button></li>

        @if ($page+1 < ceil($total_pages / $num_results_on_page)+1)
            <li class="page-item" wire:key="paginator-page-1-page-{{$page+1}}"><button type="button" class="page-link" wire:click="gotoPage({{$page+1}})">{{$page+1}}</button></li>
        @endif
        @if ($page+2 < ceil($total_pages / $num_results_on_page)+1)
            <li class="page-item" wire:key="paginator-page-1-page-{{$page+2}}"><button type="button" class="page-link" wire:click="gotoPage({{$page+2}})">{{$page+2}}</button></li>
        @endif


        @if ($page < ceil($total_pages / $num_results_on_page)-2)
            <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
            <li class="page-item" wire:key="paginator-page-1-page-{{ceil($total_pages / $num_results_on_page)}}"><button type="button" class="page-link" wire:click="gotoPage({{ceil($total_pages / $num_results_on_page)}})">{{ceil($total_pages / $num_results_on_page)}}</button></li>
        @endif

        @if ($page < ceil($total_pages / $num_results_on_page))
        <li class="page-item">
            <button type="button" dusk="nextPage" class="page-link yus-btn-next" wire:click="nextPage" wire:loading.attr="disabled" rel="next" aria-label="Next"><i class="fa-solid fa-chevron-right"></i></button>
        </li>
        @endif
    </ul>
</nav>
@endif

