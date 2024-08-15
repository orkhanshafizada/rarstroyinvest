<section class="similar__products mb-5 pb-3">
    <div class="container">
        <div class="row align-items-center justify-content-between mb-4 g-0">
            <div class="col">
                <div class="d-inline-flex align-items-center justify-content-between">
                    <div class="section__title mb-2">
                        <h2 class="h2 fw-bold text__primary mb-0">{{ __('Similar projects') }}</h2>
                    </div>
                </div>
            </div>
            <div class="col">
                <div
                    class="swiper__nav d-inline-flex align-items-center justify-content-end position-relative w-100"
                    id="projects-slider__nav">
                    <div class="swiper-button-prev btn__prev"><i class="far fa-chevron-left"></i></div>
                    <div class="swiper-button-next btn__next"><i class="far fa-chevron-right"></i></div>
                </div>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-12 col-md-12">
                <div class="swiper-container">
                    <div class="swiper swiper__slider" id="projects-slider" data-slides="4" data-xs-slides="1.5"
                         data-sm-slides="1.5" data-md-slides="3" data-lg-slides="4" data-dotes="1"
                         data-scrollbar="1" data-spaceBetween="20" data-delay="5">
                        <div class="swiper-wrapper">
                            @foreach($similar_houses as $similar_house)
                            <div class="swiper-slide h-auto"><a
                                    class="text-decoration-none card card__catalogue grid-item border-radius__20 border-0 overflow-hidden h-100"
                                    href="{{ route('house.show', $similar_house->translate('ru')->slug ?? $similar_house->translate('en')->slug) }}">
                                    <img class="img-fluid border-radius__20" src="{{ asset($house->main_image ?? '')}}" alt=""/>
                                    <div class="card-footer bg-transparent border-0 h-100 d-flex flex-column">
                                        <div class="d-flex flex-row justify-content-between">
                                            <p class="catalogue-title mb-2">Frame house</p>
                                            <p class="catalogue-price mb-2">from 2.564.000 ₽</p>
                                        </div>
                                        <p class="catalogue-location text-truncate mt-auto mb-0">
                                            {{ $house->translate(app()->getLocale())->name ?? "" }}
                                        </p>
                                        <ul class="list-group list-group-horizontal list-unstyled justify-content-between w-100 mt-3 mb-0">
                                            <li class="catalogue-option"><span>2nd floors</span></li>
                                            <li class="catalogue-area"><span>House area 115 m</span></li>
                                        </ul>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-auto mx-auto">
                <a class="btn btn-primary fw-bold flex-nowrap border-radius__50 px-4" href="{{ route('house.index') }}">
                    <span>{{ __('See all') }}</span>
                    <i class="far fa-long-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>
