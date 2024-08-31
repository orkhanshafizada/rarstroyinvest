<section class="testimonials__slider mb-5 pt-5 pb-5">
    <div class="container">
        <div class="card__testimonials-slider">
            <div class="row align-items-center justify-content-between mb-4 g-0">
                <div class="col">
                    <div class="d-inline-flex align-items-center justify-content-between">
                        <div class="section__title mb-2">
                            <h2 class="h2 fw-bold text__primary mb-0">{{ __('What costumers says') }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col d-none d-md-block">
                    <div class="swiper__nav d-inline-flex align-items-center justify-content-end position-relative w-100" id="testimonials-slider__nav">
                        <div class="swiper-button-prev btn__prev"><i class="far fa-chevron-left"></i></div>
                        <div class="swiper-button-next btn__next"><i class="far fa-chevron-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-12 col-md-12">
                    <div class="swiper-container">
                        <div class="swiper swiper__slider" id="testimonials-slider" data-slides="2" data-xs-slides="1" data-sm-slides="1" data-md-slides="3" data-lg-slides="2" data-dotes="1" data-scrollbar="1" data-spaceBetween="20" data-delay="5">
                            <div class="swiper-wrapper">
                                @foreach($comments as $comment)
                                <div class="swiper-slide h-auto">
                                    <div class="card card__testimonials border-0 overflow-hidden h-100">
                                        <div class="row g-3 g-md-5">
                                            <div class="col-5 col-md-4">
                                                <div class="d-flex flex-column justify-content-between border-radius__30 position-relative overflow-hidden">
                                                    <img class="img-fluid" src="{{ asset($comment->image) }}" alt="{{ $comment->translate(app()->getLocale())->full_name }}"/>
                                                </div>
                                                <p class="body__text2 fw-bold lh-base text__black mb-0 mt-4">{{ $comment->translate(app()->getLocale())->full_name }}</p>
                                            </div>
                                            <div class="col-7 col-md-8">
                                                <div class="card-body p-0">
                                                    <p class="body__text2 fw-normal lh-base text__black mb-0">
                                                        {!! $comment->translate(app()->getLocale())->description !!}
                                                    </p>
                                                </div>
                                            </div>
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
                    <div class="swiper__nav d-inline-flex align-items-center justify-content-center position-relative w-100" id="testimonials-slider__nav">
                        <div class="swiper-button-prev btn__prev"><i class="far fa-chevron-left"></i></div>
                        <div class="swiper-button-next btn__next"><i class="far fa-chevron-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
