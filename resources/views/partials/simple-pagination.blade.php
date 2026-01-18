@if ($paginator->hasPages())
    <nav class="flex justify-center" aria-label="{{ __('Pagination Navigation') }}">
        <div class="join">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <button class="btn btn-sm btn-outline join-item btn-disabled" disabled>
                    <span class="hidden sm:inline">@lang('pagination.previous')</span>
                    <span aria-hidden="true">«</span>
                </button>
            @else
                <a class="btn btn-sm btn-outline join-item" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                    <span class="hidden sm:inline">@lang('pagination.previous')</span>
                    <span aria-hidden="true">«</span>
                </a>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a class="btn btn-sm btn-outline join-item" href="{{ $paginator->nextPageUrl() }}" rel="next">
                    <span aria-hidden="true">»</span>
                    <span class="hidden sm:inline">@lang('pagination.next')</span>
                </a>
            @else
                <button class="btn btn-sm btn-outline join-item btn-disabled" disabled>
                    <span aria-hidden="true">»</span>
                    <span class="hidden sm:inline">@lang('pagination.next')</span>
                </button>
            @endif
        </div>
    </nav>
@endif