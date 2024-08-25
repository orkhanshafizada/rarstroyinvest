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
    <!-- Content-->
    <main class="main flex-shrink-0 pb-20 pb-md-10">
        <section class="product-detail mb-5">
            <div class="container py-0">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <nav class="breadcrumbs__nav" aria-label="breadcrumb">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">{{ __('Home') }}</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('House detail') }}</li>
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
                                <h1 class="h4 fw-bold text__dark mb-4">{{ $house->translate(app()->getLocale())->name ?? '' }}</h1>
                            </div>
                            <div class="card-body p-0">
                                <div class="row row-cols-auto g-3">
                                    @php($i = 1)
                                    @foreach($house->structures as $structure)
                                        <div class="col">
                                            <a class="btn btn__option w-100 {{ $i == 1 ? 'active' : '' }}" href="#">
                                                {{ $structure->translate(app()->getLocale())->name }}
                                            </a>
                                        </div>
                                        @php($i++)
                                    @endforeach
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h2 class="h2 product--price fw-bold text__primary mt-4 mb-2 w-100">
                                            {{ __('from') }}
                                            @php($i = 1)
                                            @foreach($house->structures as $structure)
                                                <span class="option__price {{ $i == 1 ? 'show' : '' }}">
                                               {{ $structure->pivot->price }} ₽
                                            </span>
                                                @php($i++)
                                            @endforeach
                                        </h2>
                                        <p class="body__text2 product--title fw-normal text__grey5 mb-4 w-100">
                                            {{ __('Cost of a house in the') }}
                                            @php($i = 1)
                                            @foreach($house->structures as $structure)
                                                <span class="option__name {{ $i == 1 ? 'show' : '' }}">
                                                {{ $structure->translate(app()->getLocale())->name }} {{ __('package') }}
                                            </span>
                                                @php($i++)
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card position-relative overflow-hidden border-radius__20 p-3">
                                            <p class="body__text2 fw-bold text__grey5">Mortgage available</p>
                                            <div class="swiper swiper__mortgage">
                                                <div class="swiper-wrapper">
                                                    @foreach ($mortgages as $mortgage)
                                                    <div class="swiper-slide h-auto">
                                                        <div class="mortgage-slide card border-0 h-100">
                                                            <div
                                                                class="card-body d-flex justify-content-center align-items-center p-0">
                                                                <img class="img-fluid m-auto"
                                                                     src="{{ asset($mortgage->image ?? '')}}" alt="{{ $mortgage->image ?? '' }}"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent border-0 px-0 pb-0" id="goMap">
                                <div class="row row-cols-auto g-3 g-md-4 mb-4 mb-md-5">
                                    @foreach($house->filters as $filter)
                                    <div class="col d-inline-flex align-items-center gap-2">
                                        <div
                                            class="bg__grey1 border-radius__50 d-inline-flex align-items-center gap-2 px-3 py-2">
                                            <i class="far fa-arrow-up-right-and-arrow-down-left-from-center text__white"></i><span
                                                class="body__text2 fw-normal text__dark"> {{ $filter->translate(app()->getLocale())->name }}</span><span
                                                class="body__text1 fw-bold text__dark">{{ $filter->pivot->value }}</span></div>
                                      <!--  <span class="position-relative d-block" data-bs-toggle="tooltip"
                                              data-bs-placement="top" data-bs-custom-class="tooltip__tag"
                                              data-bs-title=" $filter->translate(app()->getLocale())->name "><i
                                                class="far fa-info-circle text__grey5"></i></span> -->
                                    </div>
                                    @endforeach
                                </div>
                                <div class="row row-cols-1 row-cols-md-2 g-3 g-md-4">
                                    <div class="col"><a
                                            class="btn btn-primary fw-bold flex-nowrap text-uppercase border-radius__30 w-100 px-3"
                                            href="{{ setting('mobile') }}"> <i class="far fa-phone"></i><span>{{ __('get the qoute now') }}</span></a>
                                    </div>
                                    <div class="col"><a
                                            class="btn btn-grey__outline fw-bold text-uppercase border-radius__30 w-100 px-3"
                                            href="#viewMap"> <i class="far fa-map"></i><span>View in map</span></a>
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
                            <h2 class="h2 fw-bold text__primary mb-0">{{ __('About the project') }}</h2>
                        </div>
                    </div>
                    <div class="col-12 col-md-12">
                        <ul class="swipe swiper__tabs nav nav-pills mt-3 mb-4" id="preview-tab" role="tablist">
                            <div class="swiper-wrapper">
                                <li class="nav-item swiper-slide w-auto h-auto" role="presentation">
                                    <button class="nav-link active" id="pills-facade-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-facade" type="button" role="tab"
                                            aria-controls="pills-facade"
                                            aria-selected="true">{{ __('Facade') }}</button>
                                </li>
                                <li class="nav-item swiper-slide w-auto h-auto" role="presentation">
                                    <button class="nav-link" id="pills-layout-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-layout" type="button" role="tab"
                                            aria-controls="pills-layout"
                                            aria-selected="false">{{ __('Layout') }}</button>
                                </li>
                            </div>
                        </ul>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="tab-content" id="preview-tabContent">
                            <div class="tab-pane fade show active" id="pills-facade" role="tabpanel"
                                 aria-labelledby="pills-facade-tab" tabindex="0">
                                <div class="swiper-container">
                                    <div class="swiper swiper__slider" id="facade-slider" data-slides="2"
                                         data-xs-slides="1.5" data-sm-slides="1.5" data-md-slides="2" data-lg-slides="2"
                                         data-dotes="1" data-scrollbar="1" data-spaceBetween="20" data-delay="5">
                                        <div class="swiper-wrapper">
                                            @foreach($house->image('facade')->get() as $gallery)
                                                <div class="swiper-slide h-auto">
                                                    <a href="{{asset($gallery->name)}}" data-fancybox="gallery2">
                                                        <img src="{{asset($gallery->name)}}"/>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="swiper__nav" id="facade-slider__nav">
                                            <div class="swiper-button-prev btn__prev"><i
                                                    class="far fa-chevron-left"></i></div>
                                            <div class="swiper-button-next btn__next"><i
                                                    class="far fa-chevron-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-layout" role="tabpanel"
                                 aria-labelledby="pills-layout-tab" tabindex="0">
                                <div class="swiper-container">
                                    <div class="swiper swiper__slider" id="facade-slider" data-slides="2"
                                         data-xs-slides="1.5" data-sm-slides="1.5" data-md-slides="2" data-lg-slides="2"
                                         data-dotes="1" data-scrollbar="1" data-spaceBetween="20" data-delay="5">
                                        <div class="swiper-wrapper">
                                            @foreach($house->image('layout')->get() as $gallery)
                                                <div class="swiper-slide h-auto">
                                                    <a href="{{asset($gallery->name)}}" data-fancybox="gallery2">
                                                        <img src="{{asset($gallery->name)}}"/>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="swiper__nav" id="facade-slider__nav">
                                            <div class="swiper-button-prev btn__prev"><i
                                                    class="far fa-chevron-left"></i></div>
                                            <div class="swiper-button-next btn__next"><i
                                                    class="far fa-chevron-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="equipment-tabs mb-5">
            <div class="container py-0">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="section__title mb-2">
                            <h2 class="h2 fw-bold text__primary mb-0">Equipment</h2>
                        </div>
                    </div>
                    <div class="col-12 col-md-12">
                        <ul class="swipe swiper__tabs nav nav-pills mt-3 mb-4" id="equipment-tab" role="tablist">
                            <div class="swiper-wrapper">
                                @php($i = 1)
                                @foreach($house->structures as $structure)
                                    <li class="nav-item swiper-slide w-auto h-auto" role="presentation">
                                        <button class="nav-link option__tab {{ $i == 1 ? 'active' : '' }}" id="pills-filter{{$structure->id}}-tab"
                                                data-bs-toggle="pill" data-bs-target="#pills-filter{{$structure->id}}" type="button"
                                                role="tab" aria-controls="pills-filter{{$structure->id}}" aria-selected="true">
                                            {{ $structure->translate(app()->getLocale())->name }}
                                            {{ __('from') }} {{ __('RUB') }} {{ $structure->pivot->price }}
                                        </button>
                                    </li>
                                    @php($i++)
                                @endforeach
                            </div>
                        </ul>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="tab-content" id="equipment-tabContent">
                            @php($i = 1)
                            @foreach($house->structures as $structure)
                                <div class="tab-pane option__pane fade {{ $i == 1 ? 'show  active' : '' }} " id="pills-filter{{$structure->id}}" role="tabpanel"
                                     aria-labelledby="pills-filter{{$structure->id}}-tab" tabindex="0">
                                    <div class="col-12 col-md-8 mx-auto">
                                        <div class="accordion accordion__equipment bg-transparent" id="accordionEquipment">
                                            @foreach($structure->equipment->where('house_id', $house->id) as $equipment)
                                                <div class="accordion-item">
                                                    <div class="accordion-header">
                                                        <button class="accordion-button align-items-baseline px-0 py-2"
                                                                type="button" data-bs-toggle="collapse"
                                                                data-bs-target="#collapseOne" aria-expanded="true"
                                                                aria-controls="collapseOne">
                                                            <h4 class="h4 title fw-bold text__dark lh-base mb-0">
                                                                {{ $equipment->translate(app()->getLocale())->title }}
                                                            </h4>
                                                        </button>
                                                    </div>
                                                    <div class="accordion-collapse collapse multi-collapse in show"
                                                         id="collapseOne">
                                                        <div class="accordion-body px-0 pb-0">
                                                            <div class="body__text2 fw-normal text__grey5 lh-base mb-0">
                                                                {!! $equipment->translate(app()->getLocale())->content !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @php($i++)
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="video__map mb-5">
            <div class="container-fluid p-0">
                <div class="row" data-bs-spy="scroll" data-bs-target="#goMap" data-bs-smooth-scroll="true"
                     data-bs-root-margin="100px 0px -100%" tabindex="0">
                    <div class="col-12 col-md-6">
                        <iframe src="https://www.youtube.com/embed/{{ get_youtube_id($house->translate(app()->getLocale())->video_url) }}"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>

                        </iframe>
                    </div>
                    <div class="col-12 col-md-6">
                        <iframe id="viewMap"
                                src="https://maps.google.com/maps?hl=en&amp;q=1%20{{ $house->location }}hl=en&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
                                frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </section>
       @include('front.house.similar')
    </main>
@endsection
