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
       @include('front.portfolio.houseSlider')
    </div>
</section>
