@if ($products->hasPages())
    <div class="flex-c-m flex-w w-full p-t-38">
        @foreach ($products->links()->elements[0] as $page => $url)
            @if ($page == $products->currentPage())
                <span class="flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1">{{ $page }}</span>
            @else
                <a href="{{ $url }}" class="flex-c-m how-pagination1 trans-04 m-all-7" data-page="{{ $page }}">{{ $page }}</a>
            @endif
        @endforeach
    </div>
@endif
