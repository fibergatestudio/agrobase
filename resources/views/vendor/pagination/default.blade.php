@if ($paginator->hasPages())
    <div class="carpathians-pagination">
        <div class="carpathians-pagination_wrapper">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <div class="carpathians-pagination_inner" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="carpathians-pagination_back" aria-hidden="true">Назад</span>
                </div>
            @else
                <div class="carpathians-pagination_inner">
                    <a href="{{ $paginator->previousPageUrl() }}" сlass="carpathians-pagination_back" rel="prev" aria-label="@lang('pagination.previous')">Назад</a>
                </div>
            @endif

            <?php
                $start = $paginator->currentPage() - 2; // show 3 pagination links before current
                $end = $paginator->currentPage() + 2; // show 3 pagination links after current
                if($start < 1) {
                    $start = 1; // reset start to 1
                    $end += 1;
                } 
                if($end >= $paginator->lastPage() ) $end = $paginator->lastPage(); // reset end to last page
            ?>

            @if($start > 1)
                <div class="carpathians-pagination_inner">
                    <a href="{{ $paginator->url(1) }}">{{1}}</a>
                </div>
                @if($paginator->currentPage() != 4)
                    {{-- "Three Dots" Separator --}}
                    <div class="carpathians-pagination_inner disabled" aria-disabled="true"><span >...</span></div>
                @endif
            @endif
                @for ($i = $start; $i <= $end; $i++)
                    <div class="carpathians-pagination_inner {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                        <a href="{{ $paginator->url($i) }}">{{$i}}</a>
                    </div>
                @endfor
            @if($end < $paginator->lastPage())
                @if($paginator->currentPage() + 3 != $paginator->lastPage())
                    {{-- "Three Dots" Separator --}}
                    <div class="carpathians-pagination_inner" aria-disabled="true"><a >...</a></div>
                @endif
                <div class="carpathians-pagination_inner">
                    <a href="{{ $paginator->url($paginator->lastPage()) }}">{{$paginator->lastPage()}}</a>
                </div>
            @endif

            <!-- {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <div class="carpathians-pagination_inner" aria-disabled="true">{{ $element }}</div>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <div class="carpathians-pagination_inner active" aria-current="page"><a href="##">{{ $page }}</a></div>
                        @else
                            <div class="carpathians-pagination_inner"><a href="{{ $url }}">{{ $page }}</a></div>
                        @endif
                    @endforeach
                @endif
            @endforeach -->

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <div class="carpathians-pagination_inner">
                    <a href="{{ $paginator->nextPageUrl() }}" class=" carpathians-pagination_forward" rel="next" aria-label="@lang('pagination.next')">Далее</a>
                </div>
            @else
                <div class="carpathians-pagination_inner" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">&rsaquo;</span>
                </div>
            @endif
        </div>
    </div>


@endif
