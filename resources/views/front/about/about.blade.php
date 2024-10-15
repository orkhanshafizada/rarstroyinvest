@extends('front.layouts.app')
@section('content')
    <!-- Content-->
    <main class="main flex-shrink-0 pb-20 pb-md-10">
        <section class="section__about">
            <div class="container py-0">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <nav class="breadcrumbs__nav" aria-label="breadcrumb">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home.index') }}"> {{ __('Home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('About') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row g-3 g-md-4 mt-0 mt-md-3 mb-4">
                    <div class="col-12 col-md-12">
                        <div class="card about position-relative overflow-hidden bg__grey1 border-0 h-100 w-100">
                            <div class="row d-inline-flex justify-content-between align-items-center">
                                <div class="col-12 col-md-12 h-100">
                                    <div class="swiper-container">
                                        <div class="swiper swiper__slider position-relative overflow-hidden h-100" id="about-slider" data-slides="2" data-xs-slides="1" data-sm-slides="1" data-md-slides="1.5" data-lg-slides="2" data-dotes="1" data-scrollbar="1" data-spaceBetween="0" data-delay="5">
                                            <div class="swiper-wrapper">
                                                @foreach($aboutus->image as $aboutusImage)
                                                <div class="swiper-slide h-auto">
                                                    <img class="img-fluid object-fit-cover" src="{{ asset($aboutusImage->name) }}" alt="{{ $aboutus->translate(app()->getLocale())->title }}"/>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-8 section__content mx-auto">
                        <h2 class="h2 fw-bold text__primary mb-4">{{ $aboutus->translate(app()->getLocale())->title }}</h2>
                        <p class="sub__title2 text__dark">
                            {!! $aboutus->translate(app()->getLocale())->long_description !!}
                        </p>
                    </div>
                </div>
{{-- @include('front.about.our-achievements')--}}
            </div>
            @include('front.partners.partners')
        </section>
        @include('front.staff.staff')
    </main>
@endsection
