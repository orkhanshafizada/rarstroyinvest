<section class="staff__slider mb-5 pt-5 pb-5">
    <div class="container">
        <div class="card__staff-slider">
            <div class="row align-items-center justify-content-between mb-4 g-0">
                <div class="col">
                    <div class="d-inline-flex align-items-center justify-content-between">
                        <div class="section__title mb-2">
                            <h2 class="h2 fw-bold text__primary mb-0">{{ __('Our Team') }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col d-none d-md-block">
                    <div class="swiper__nav d-inline-flex align-items-center justify-content-end position-relative w-100" id="staff-slider__nav">
                        <div class="swiper-button-prev btn__prev"><i class="far fa-chevron-left"></i></div>
                        <div class="swiper-button-next btn__next"><i class="far fa-chevron-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-12 col-md-12">
                    <div class="swiper-container">
                        <div class="swiper swiper__slider" id="staff-slider" data-slides="3" data-xs-slides="1.2" data-sm-slides="1.2" data-md-slides="3" data-lg-slides="3" data-dotes="1" data-scrollbar="1" data-spaceBetween="20" data-delay="5">
                            <div class="swiper-wrapper">
                                @foreach($staffs as $staff)
                                <div class="swiper-slide h-auto">
                                    <div class="card card__staff border-0 border-radius__40 bg__grey1 overflow-hidden h-100">
                                        <div class="card-header bg-transparent border-0 d-inline-flex align-items-center px-0 pt-0 pb-3">
                                            <div class="img-wrapper"><img class="img-fluid" src="{{ get_file_url($staff->image) }}" alt="{{ $comment->translate(app()->getLocale())->full_name }}"/></div>
                                            <div class="d-flex flex-column ms-4">
                                                <h6 class="h6 fw-bold lh-base text__black mb-0">{{ $comment->translate(app()->getLocale())->full_name }}</h6>
                                                <p class="body__text2 fw-bold lh-base text__grey5 mb-0">{{ $comment->translate(app()->getLocale())->position }}</p>
                                            </div>
                                        </div>
                                        <div class="card-body px-0 pb-0 pt-4">
                                            <p class="body__text2 fw-normal lh-base text__black mb-0">
                                                {{ $comment->translate(app()->getLocale())->description }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex d-md-none align-items-center justify-content-center mt-4 g-4">
                <div class="col">
                    <div class="swiper__nav d-inline-flex align-items-center justify-content-center position-relative w-100" id="staff-slider__nav">
                        <div class="swiper-button-prev btn__prev"><i class="far fa-chevron-left"></i></div>
                        <div class="swiper-button-next btn__next"><i class="far fa-chevron-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
