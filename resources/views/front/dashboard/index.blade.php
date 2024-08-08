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
                    <div class="row g-0">
                        <div class="col-12 col-md-12">
                            <div class="swiper-container">
                                <div class="swiper swiper__slider" id="catalogue-slider" data-slides="4"
                                     data-xs-slides="1.2" data-sm-slides="1.2" data-md-slides="3" data-lg-slides="4"
                                     data-dotes="1" data-scrollbar="1" data-spaceBetween="20" data-delay="5">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide h-auto"><a
                                                class="text-decoration-none card card__catalogue border-radius__20 border-0 overflow-hidden h-100 slide__item"
                                                href="#"><img class="img-fluid border-radius__20"
                                                              src="assets/img/slide1.png" alt=""/>
                                                <div
                                                    class="card-footer bg-transparent border-0 h-100 d-flex flex-column px-1 py-3">
                                                    <div class="d-flex flex-row justify-content-between">
                                                        <p class="catalogue-title mb-2">Frame house</p>
                                                        <p class="catalogue-price mb-2">from 2.564.000 ₽</p>
                                                    </div>
                                                    <p class="catalogue-location text-truncate mt-auto mb-0">Sokolinaya
                                                        Gora</p>
                                                    <ul class="list-group list-group-horizontal list-unstyled justify-content-between w-100 mt-3 mb-0">
                                                        <li class="catalogue-option"><span>2nd floors</span></li>
                                                        <li class="catalogue-area"><span>House area 115 m</span></li>
                                                    </ul>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="swiper-slide h-auto"><a
                                                class="text-decoration-none card card__catalogue border-radius__20 border-0 overflow-hidden h-100 slide__item"
                                                href="#"><img class="img-fluid border-radius__20"
                                                              src="assets/img/slide2.png" alt=""/>
                                                <div
                                                    class="card-footer bg-transparent border-0 h-100 d-flex flex-column px-1 py-3">
                                                    <div class="d-flex flex-row justify-content-between">
                                                        <p class="catalogue-title mb-2">Frame house</p>
                                                        <p class="catalogue-price mb-2">from 2.564.000 ₽</p>
                                                    </div>
                                                    <p class="catalogue-location text-truncate mt-auto mb-0">Sokolinaya
                                                        Gora</p>
                                                    <ul class="list-group list-group-horizontal list-unstyled justify-content-between w-100 mt-3 mb-0">
                                                        <li class="catalogue-option"><span>2nd floors</span></li>
                                                        <li class="catalogue-area"><span>House area 115 m</span></li>
                                                    </ul>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="swiper-slide h-auto"><a
                                                class="text-decoration-none card card__catalogue border-radius__20 border-0 overflow-hidden h-100 slide__item"
                                                href="#"><img class="img-fluid border-radius__20"
                                                              src="assets/img/slide3.png" alt=""/>
                                                <div
                                                    class="card-footer bg-transparent border-0 h-100 d-flex flex-column px-1 py-3">
                                                    <div class="d-flex flex-row justify-content-between">
                                                        <p class="catalogue-title mb-2">Frame house</p>
                                                        <p class="catalogue-price mb-2">from 2.564.000 ₽</p>
                                                    </div>
                                                    <p class="catalogue-location text-truncate mt-auto mb-0">Sokolinaya
                                                        Gora</p>
                                                    <ul class="list-group list-group-horizontal list-unstyled justify-content-between w-100 mt-3 mb-0">
                                                        <li class="catalogue-option"><span>2nd floors</span></li>
                                                        <li class="catalogue-area"><span>House area 115 m</span></li>
                                                    </ul>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="swiper-slide h-auto"><a
                                                class="text-decoration-none card card__catalogue border-radius__20 border-0 overflow-hidden h-100 slide__item"
                                                href="#"><img class="img-fluid border-radius__20"
                                                              src="assets/img/slide4.png" alt=""/>
                                                <div
                                                    class="card-footer bg-transparent border-0 h-100 d-flex flex-column px-1 py-3">
                                                    <div class="d-flex flex-row justify-content-between">
                                                        <p class="catalogue-title mb-2">Frame house</p>
                                                        <p class="catalogue-price mb-2">from 2.564.000 ₽</p>
                                                    </div>
                                                    <p class="catalogue-location text-truncate mt-auto mb-0">Sokolinaya
                                                        Gora</p>
                                                    <ul class="list-group list-group-horizontal list-unstyled justify-content-between w-100 mt-3 mb-0">
                                                        <li class="catalogue-option"><span>2nd floors</span></li>
                                                        <li class="catalogue-area"><span>House area 115 m</span></li>
                                                    </ul>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-0">
                        <div class="col d-flex"><a
                                class="text-decoration-none btn btn-white__dark border-radius__50 fw-bold mt-5 mx-auto">See
                                more<i class="far fa-arrow-right-long"></i></a></div>
                    </div>
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
