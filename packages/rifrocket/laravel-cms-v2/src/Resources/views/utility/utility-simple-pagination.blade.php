<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
            <span>
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <span class="btn btn-sm btn-primary">
                        {!! __('pagination.previous') !!}
                    </span>
                @else
                    <button type="button" wire:click="previousPage" wire:loading.attr="disabled" rel="prev" class="btn btn-sm btn-primary">
                        {!! __('pagination.previous') !!}
                    </button>
                @endif
            </span>

            <span>
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <button type="button" wire:click="nextPage" wire:loading.attr="disabled" rel="next" class="btn btn-sm btn-primary">
                        {!! __('pagination.next') !!}
                    </button>
                @else
                    <span class="btn btn-sm btn-primary">
                        {!! __('pagination.next') !!}
                    </span>
                @endif
            </span>
        </nav>
    @endif
</div>
