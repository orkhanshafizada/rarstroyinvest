@extends('front.layouts.app')
@section('meta-tags')
    <meta property='og:title' content='{{ $news->translate(app()->getLocale())->title ?? '' }}'/>
    <meta property='og:description' content='{{ $news->translate(app()->getLocale())->short_content ?? '' }}'/>
    <meta property='og:image' content='{{ asset($news->main_image) }}'/>
    <meta property='og:url' content='{{ url()->current() }}'/>
    <meta property='twitter:title' content='{{ $news->translate(app()->getLocale())->title ?? '' }}'/>
    <meta property='twitter:description' content='{{ $news->translate(app()->getLocale())->short_content ?? '' }}'/>
    <meta property='twitter:image' content='{{ asset($news->main_image) }}'/>
    <meta property='twitter:url' content='{{ url()->current() }}'/>
@endsection
@section('content')
    <!-- Content-->
    <main class="main flex-shrink-0 pb-20 pb-md-10">
        <section class="section__blog-detail">
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
                </div>
                <div class="row g-0 g-md-4 mt-0 mt-md-3 mb-4">
                    <div class="col-12">
                        <div class="img__wrapper"><img class="img-fluid w-100" src="{{asset($news->main_image)}}" alt="{{ $news->translate(app()->getLocale())->title ?? '' }}"/></div>
                    </div>
                    <div class="col-12 col-md-8 mx-md-auto">
                        <ul class="list-group list-group-horizontal list-unstyled justify-content-between w-100 mt-4 mt-md-4 mb-4">
                            <li class="blog-area">
                                <div class="d-inline-flex align-items-center me-2"><i class="far fa-calendar"></i><span class="ms-2">{{ convertDateToReadableFormat($news->created_at, app()->getLocale()) }}</span></div>
                                <div class="d-inline-flex align-items-center ms-3"><i class="far fa-eye"></i><span class="ms-2">{{ $news->show }}</span></div>
                            </li>
                        </ul>
                        <h1 class="h1 fw-bold lh-sm mb-4">{{ $news->translate(app()->getLocale())->title ?? '' }}</h1>
                        <div class="section__content">
                            {!! $news->translate(app()->getLocale())->long_content ?? '' !!}
                        </div>
                        <div class="section__gallery">
                        
                            <div class="row d-inline-flex justify-content-between align-items-center">
                                <div class="col-12 col-md-12 h-100">
                                    <div class="swiper-container">
                                        <div class="swiper swiper__slider position-relative overflow-hidden h-100" id="blog-slider" data-slides="2" data-xs-slides="1" data-sm-slides="1" data-md-slides="1.5" data-lg-slides="2" data-dotes="1" data-scrollbar="1" data-spaceBetween="0" data-delay="5">
                                            <div class="swiper-wrapper">                                                
                                                <div class="swiper-slide h-auto">
                                                    <img class="img-fluid object-fit-cover" src="https://rarstroyinvest.ru/front/assets/images/gallery/about/8kkYeQHOTt1GkrKAnDvltqsd6plAGcOIZ2O3IsFp.jpg" alt="Blog title"/>
                                                </div>                                 
                                                <div class="swiper-slide h-auto">
                                                    <img class="img-fluid object-fit-cover" src="https://rarstroyinvest.ru/front/assets/images/gallery/about/8kkYeQHOTt1GkrKAnDvltqsd6plAGcOIZ2O3IsFp.jpg" alt="Blog title"/>
                                                </div>                                 
                                                <div class="swiper-slide h-auto">
                                                    <img class="img-fluid object-fit-cover" src="https://rarstroyinvest.ru/front/assets/images/gallery/about/8kkYeQHOTt1GkrKAnDvltqsd6plAGcOIZ2O3IsFp.jpg" alt="Blog title"/>
                                                </div>                                 
                                                <div class="swiper-slide h-auto">
                                                    <img class="img-fluid object-fit-cover" src="https://rarstroyinvest.ru/front/assets/images/gallery/about/8kkYeQHOTt1GkrKAnDvltqsd6plAGcOIZ2O3IsFp.jpg" alt="Blog title"/>
                                                </div>                                 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="d-inline-flex justify-content-center justify-content-md-center align-items-start flex-column w-100 pt-4 pt-md-3">
                            <h6 class="h6 fw-semibold text__dark text-end mb-3">{{ __('Share:') }}</h6>
                            @php
                                $socialPlatforms = [
                                    'facebook' => 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode($currentUrl),
                                    'instagram' => 'https://www.instagram.com',
                                    'linkedin' => 'https://www.linkedin.com/sharing/share-offsite/?url=' . urlencode($currentUrl),
                                    'telegram' => 'https://t.me/share/url?url=' . urlencode($currentUrl),
                                    'whatsapp' => 'https://api.whatsapp.com/send?text=' . urlencode($currentUrl),
                                ];
                            @endphp

                            <ul class="social__list list-group-horizontal list-unstyled justify-content-start justify-content-md-start align-items-center d-flex flex-wrap w-100">
                                @foreach ($socialPlatforms as $platform => $url)
                                    <li class="d-inline-flex align-items-center">
                                        <a class="text-decoration-none" href="{{ $url }}" target="_blank" rel="noopener noreferrer">
                                            <i class="fab fa-{{ $platform }}"></i>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('front.news.related')
    </main>
@endsection
