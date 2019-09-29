<div class="row">
    <div class="col-md-12">
        <!-- Pagination -->
        <div class="pagination-container margin-top-60 margin-bottom-60">

            @if ($paginator->hasPages())
                <nav class="pagination">
                    <ul>
                        {{-- Previous Page Link --}}
                        @if ($paginator->onFirstPage())
                            <li class="disabled"><a href=""><i class="fal fa-angle-left"></i></a></li>
                        @else
                            <li class="pagination-arrow"><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fal fa-angle-left"></i></a>
                            </li>
                        @endif
                        {{-- Pagination Elements --}}
                        @foreach ($elements as $element)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                                <li class="disabled">
                                <li><a href="#">{{ $element }}</a></li>
                            @endif
                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $paginator->currentPage())
                                        <li class="current-page"><a class="current-page" href="#">{{ $page }}</a></li>
                                    @else
                                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                        {{-- Next Page Link --}}
                        @if ($paginator->hasMorePages())
                            <li class="pagination-arrow"><a href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="fal fa-angle-right"></i></a></li>
                        @else
                            <li class="disabled"><a href=""><i class="fal fa-angle-right"></i></a></li>
                        @endif
                    </ul>
                </nav>
            @endif
        </div>
    </div>
</div>
