@extends('front.layouts.app')
@section('meta-tags')
    <meta property='og:title' content='{{ $house->translate(app()->getLocale())->name ?? '' }}'/>
    <meta property='og:description' content='{{ $house->translate(app()->getLocale())->name ?? '' }}'/>
    <meta property='og:image' content='{{ asset($house->main_image) }}'/>
    <meta property='og:url' content='{{ url()->current() }}'/>
    <meta property='twitter:title' content='{{ $house->translate(app()->getLocale())->name ?? '' }}'/>
    <meta property='twitter:description' content='{{ $house->translate(app()->getLocale())->name ?? '' }}'/>
    <meta property='twitter:image' content='{{ asset($house->main_image) }}'/>
    <meta property='twitter:url' content='{{ url()->current() }}'/>
@endsection
@section('content')
    <main class="main flex-shrink-0 pb-20 pb-md-10">
        <section class="product-detail mb-5">
            <div class="container py-0">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <nav class="breadcrumbs__nav" aria-label="breadcrumb">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Portfolio detail</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row product__gallery g-0 g-md-4 mt-0 mt-md-3 mb-4">
                    <div class="col-12 col-md-6">
                        <div class="card bg-transparent border-0 p-0 h-100">
                            <div class="main-slide">
                                <div class="img-slide"><a href="{{asset($house->main_image)}}"
                                                          data-fancybox="gallery"><img
                                            src="{{asset($house->main_image)}}"/></a></div>
                                @foreach($house->image()->get() as $gallery)
                                    <div class="img-slide">
                                        <a href="{{asset($gallery->name)}}" data-fancybox="gallery">
                                            <img src="{{asset($gallery->name)}}"/>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="slider-nav d-none d-md-inline-flex">
                                <div class="img-slide"><img src="{{asset($house->main_image)}}"/></div>
                                @foreach($house->image()->get() as $gallery)
                                    <div class="img-slide"><img src="{{asset($gallery->name)}}"/></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card card__product border-0 h-100">
                            <div class="card-header bg-transparent border-0 p-0">
                                <h1 class="h3 fw-bold text__primary mb-2">{{ $house->translate(app()->getLocale())->name ?? '' }}</h1>
                            </div>
                            <div class="card-body p-0">
                                <p class="body__text1 fw-bold text__dark mt-3 mb-3 mb-md-4">{{ __('Технические характеристики') }}:</p>
                                <div class="row row-cols-auto g-3 g-md-4 mb-4 mb-md-5">
                                    @foreach($house->filters as $filter)
                                        <div class="col d-inline-flex align-items-center gap-2">
                                            <div class="bg__grey1 border-radius__50 d-inline-flex align-items-center gap-2 px-3 py-2">
                                                {!! $filter->icon !!}
                                                <span class="body__text2 fw-normal text__dark">{{ $filter->translate(app()->getLocale())->name }}</span>
                                                <span class="body__text1 fw-bold text__dark">{{ $filter->pivot->value }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <a class="btn btn-primary m-3" href="#">{{ __('На страницу проекта') }} </a>
                            </div>
                            <div class="card-footer bg-transparent border-0 px-0 pb-0">
                                <div class="row g-3 g-md-4">
                                    <div class="col">
                                        <div class="card border-0 bg__white position-relative mb-2">
                                            <iframe class="rounded-3 w-100 h-100" src="https://maps.google.com/maps?q={{ urlencode($house->location) }}&output=embed" frameborder="0"></iframe>
                                            <div class="d-flex w-100 h-100 align-items-center justify-content-center position-absolute top-0 start-0">
                                                <a class="btn btn-primary" href="https://maps.google.com/maps?q={{ urlencode($house->location) }}&output=embed" data-fancybox="data-fancybox" data-type="iframe" data-small-btn="true" data-iframe="{&quot;preload&quot;:true}">
                                                    <i class="far fa-route me-2"></i>{{ __('View on map') }}
                                                </a>
                                            </div>
                                        </div>

                                        <p class="mb-0 body__text2 text-center text__dark">{{ $house->location }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="product-tabs mb-5">
            <div class="container py-0">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="section__title mb-2">
                            <h2 class="h2 fw-bold text__primary mb-0">{{ __('Фотографии и планировки дома') }}</h2>
                        </div>
                    </div>
                    <div class="col-12 col-md-12">
                        <ul class="swipe swiper__tabs nav nav-pills mt-3 mb-4" id="preview-tab" role="tablist">
                            <div class="swiper-wrapper">
                                <li class="nav-item swiper-slide w-auto h-auto" role="presentation">
                                    <button class="nav-link active" id="facade-photos-tab" data-bs-toggle="pill" data-bs-target="#facade-photos" type="button" role="tab" aria-controls="facade-photos" aria-selected="true">
                                        {{ __('Facade') }}</button>
                                </li>
                                <li class="nav-item swiper-slide w-auto h-auto" role="presentation">
                                    <button class="nav-link" id="layout-photos-tab" data-bs-toggle="pill" data-bs-target="#layout-photos" type="button" role="tab" aria-controls="layout-photos" aria-selected="true">
                                        {{ __('Layout') }}</button>
                                </li>
                                <li class="nav-item swiper-slide w-auto h-auto" role="presentation">
                                    <button class="nav-link" id="pills-videos-tab" data-bs-toggle="pill" data-bs-target="#pills-videos" type="button" role="tab" aria-controls="pills-videos" aria-selected="false">
                                        {{ __('Video') }}</button>
                                </li>
                            </div>
                        </ul>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="tab-content" id="preview-tabContent">
                            <div class="tab-pane fade show active" id="facade-photos" role="tabpanel" aria-labelledby="facade-photos-tab" tabindex="0">
                                <div class="row row-cols-1 row-cols-md-3 g-4">
                                    @foreach($house->image('facade')->get() as $gallery)
                                        <div class="col">
                                            <div class="card card__gallery">
                                                <div class="card-image">
                                                    <a href="{{asset($gallery->name)}}" data-fancybox="gallery" data-caption="Caption Images {{$gallery->id}}">
                                                        <img src="{{asset($gallery->name)}}"/>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="layout-photos" role="tabpanel" aria-labelledby="layout-photos-tab" tabindex="0">
                                <div class="row row-cols-1 row-cols-md-3 g-4">
                                    @foreach($house->image('layout')->get() as $gallery)
                                        <div class="col">
                                            <div class="card card__gallery">
                                                <div class="card-image">
                                                    <a href="{{asset($gallery->name)}}" data-fancybox="gallery" data-caption="Caption Images {{$gallery->id}}">
                                                        <img src="{{asset($gallery->name)}}"/>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-videos" role="tabpanel" aria-labelledby="pills-videos-tab" tabindex="0">
                                <div class="row row-cols-1 row-cols-md-3 g-4">
                                    <div class="col">
                                        @php($youtube_id = get_youtube_id($house->translate(app()->getLocale())->video_url))
                                        @if($youtube_id)
                                        <div class="card card__gallery border-0 bg-white rounded-2">
                                            <iframe src="https://www.youtube.com/embed/{{ $youtube_id }}"
                                                    title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>

                                            </iframe>
                                        </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('front.portfolio.similar')
    </main>
@endsection
