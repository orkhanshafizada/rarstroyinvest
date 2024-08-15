@extends('front.layouts.app')
@section('content')
    <!-- Content-->
    <main class="main flex-shrink-0 pb-20 pb-md-10">
        <section class="main__slider mb-5">
            <div class="container pt-4">
                <div class="row">
                    <div class="col-12 position-relative overflow-hidden">
                        @include('front.dashboard.slider-desktop')
                        @include('front.dashboard.slider-mobile')
                    </div>
                </div>
            </div>
        </section>
        <section class="partners__tricker mb-5 pt-0 pt-md-5">
            @include('front.partners.partners')
        </section>
        <section class="catalogue__slider mb-5 pt-3">
            <div class="container">
                <div class="card__catalogue-slider">
                    <div class="row align-items-center justify-content-between mb-4 g-0">
                        <div class="col">
                            <div class="d-inline-flex align-items-center justify-content-between">
                                <div class="section__title mb-2">
                                    <h2 class="h2 fw-bold text__primary mb-0">Catalogue</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div
                                class="swiper__nav d-inline-flex align-items-center justify-content-end position-relative w-100"
                                id="catalogue-slider__nav">
                                <div class="swiper-button-prev btn__prev"><i class="far fa-chevron-left"></i></div>
                                <div class="swiper-button-next btn__next"><i class="far fa-chevron-right"></i></div>
                            </div>
                        </div>
                    </div>
                    @include('front.house.houseSlider')
                </div>
            </div>
        </section>
        @include('front.dashboard.aboutus')
        @include('front.dashboard.customers-say')
    </main>
@endsection
@section('css')
@endsection
@section('javascripts')
@endsection
