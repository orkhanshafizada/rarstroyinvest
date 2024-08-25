@extends('front.layouts.app')
@section('content')
    <!-- Content-->
    <main class="main flex-shrink-0 pb-20 pb-md-10">
        <section class="section__blogs">
            <div class="container py-0">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <nav class="breadcrumbs__nav" aria-label="breadcrumb">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">{{ __('Home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Blogs') }}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-12 col-md-12">
                        <h1 class="h2 text__primary fw-bold lh-base mb-0 mb-md-4">{{ __('Blog') }}</h1>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-2 g-4 mt-5 mb-4">
                    @foreach($news as $new)
                        <article class="col">
                            <a class="text-decoration-none card card__blog border-0 overflow-hidden h-100"
                               href="{{ route('news.show', $new->translate('ru')->slug ?? $new->translate('en')->slug) }}">
                                <img class="img-fluid" src="{{asset($new->main_image)}}" alt="{{ $new->translate(app()->getLocale())->title ?? '' }}"/>
                                <div class="card-footer bg-transparent border-0 h-100 d-flex flex-column">
                                    <h2 class="h4 text__dark fw-bold mb-3">
                                        {{ $new->translate(app()->getLocale())->title ?? ''}}
                                    </h2>
                                    <p class="text__grey5 fw-normal blog-description text__overflow mt-auto mb-0">
                                        {!! $new->translate(app()->getLocale())->short_content ?? '' !!}
                                    </p>
                                    <ul class="list-group list-group-horizontal list-unstyled justify-content-between w-100 mt-3 mb-0">
                                        <li class="blog-readmore">
                                            <span class="me-2">{{ __('READ MORE') }}</span>
                                            <i class="fas fa-arrow-right"></i>
                                        </li>
                                        <li class="blog-area">
                                            <div class="d-inline-flex align-items-center me-2">
                                                <i class="far fa-calendar"></i>
                                                <span class="ms-2">{{ convertDateToReadableFormat($new->created_at, app()->getLocale()) }}</span>
                                            </div>
                                            <div class="d-inline-flex align-items-center ms-3">
                                                <i class="far fa-eye"></i>
                                                <span class="ms-2">{{ $new->show }}</span></div>
                                        </li>
                                    </ul>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>
                <div class="row mb-5">
                    <nav class="pagination__nav d-flex justify-content-center mx-auto mt-3">
                        <ul class="pagination m-0">
                            @if($prevPage)
                                <li class="page-item pagination__item previous">
                                    <a class="page-link pagination__link" href="{{ route('news.index.page', $prevPage) }}" tabindex="-1">
                                        <i class="fa-regular fa-chevron-left"></i>
                                    </a>
                                </li>
                            @else
                                <li class="page-item pagination__item previous disabled">
                                    <a class="page-link pagination__link" href="#" tabindex="-1">
                                        <i class="fa-regular fa-chevron-left"></i>
                                    </a>
                                </li>
                            @endif

                            @for($i = 1; $i <= $allPage; $i++)
                                @if ($i == $current)
                                    <li class="page-item pagination__item active">
                                        <a class="page-link pagination__link" href="#">{{ $i }}</a>
                                    </li>
                                @elseif (abs($i - $current) <= 2 || $i == 1 || $i == $allPage)
                                    <li class="page-item pagination__item">
                                        <a class="page-link pagination__link" href="{{ route('news.index.page', $i) }}">{{ $i }}</a>
                                    </li>
                                @elseif ($i == $current - 3 || $i == $current + 3)
                                    <li class="page-item pagination__item disabled-dots disabled">
                                        <a class="page-link pagination__link" href="#">...</a>
                                    </li>
                                @endif
                            @endfor

                            @if($nextPage)
                                <li class="page-item pagination__item next">
                                    <a class="page-link pagination__link" href="{{ route('news.index.page', $nextPage) }}">
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
                </div>
            </div>
        </section>
    </main>



@endsection
