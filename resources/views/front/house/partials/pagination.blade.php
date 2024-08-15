<nav class="pagination__nav d-flex justify-content-center justify-content-md-end mx-auto mt-3">
    <ul class="pagination m-0">
        @if($houses->previousPageUrl())
            <li class="page-item pagination__item previous">
                <a class="page-link pagination__link" href="{{ $houses->previousPageUrl() }}">
                    <i class="fa-regular fa-chevron-left"></i>
                </a>
            </li>
        @else
            <li class="page-item pagination__item previous disabled">
                <a class="page-link pagination__link" href="#">
                    <i class="fa-regular fa-chevron-left"></i>
                </a>
            </li>
        @endif

        @for($i = 1; $i <= $houses->lastPage(); $i++)
            @if ($i == $houses->currentPage())
                <li class="page-item pagination__item active">
                    <a class="page-link pagination__link" href="#">{{ $i }}</a>
                </li>
            @else
                <li class="page-item pagination__item">
                    <a class="page-link pagination__link" href="{{ $houses->url($i) }}">{{ $i }}</a>
                </li>
            @endif
        @endfor

        @if($houses->nextPageUrl())
            <li class="page-item pagination__item next">
                <a class="page-link pagination__link" href="{{ $houses->nextPageUrl() }}">
                    <i class="fa-regular fa-chevron-right"></i>
                </a>
            </li>
        @else
            <li class="page-item pagination__item next disabled">
                <a class="page-link pagination__link" href="#">
                    <i class="fa-regular fa-chevron-right"></i>
                </a>
            </li>
        @endif
    </ul>
</nav>
