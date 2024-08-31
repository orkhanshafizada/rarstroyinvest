<section class="catalogue__slider mb-5 pt-3">
    <div class="container">
        <div class="card__blogs-slider pb-5">
            <div class="row align-items-center justify-content-between mb-4 g-0">
                <div class="col">
                    <div class="d-inline-flex align-items-center justify-content-between">
                        <div class="section__title mb-2">
                            <h2 class="h2 fw-bold text__primary mb-0">{{ __('Related news') }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col d-none d-md-block">
                    <div
                        class="swiper__nav d-inline-flex align-items-center justify-content-end position-relative w-100"
                        id="blogs-slider__nav">
                        <div class="swiper-button-prev btn__prev"><i class="far fa-chevron-left"></i></div>
                        <div class="swiper-button-next btn__next"><i class="far fa-chevron-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-12 col-md-12">
                    <div class="swiper-container">
                        <div class="swiper swiper__slider" id="blogs-slider" data-slides="3" data-xs-slides="1.5"
                             data-sm-slides="1.5" data-md-slides="3" data-lg-slides="3" data-dotes="1"
                             data-scrollbar="1" data-spaceBetween="20" data-delay="5">
                            <div class="swiper-wrapper">
                                @foreach($newses as $rn)
                                    <div class="swiper-slide h-auto">
                                        <a class="text-decoration-none card card__blog-slide border-0 overflow-hidden h-100"
                                           href="{{ route('news.show', $rn->translate('en')->slug ?? '') }}">
                                            <img class="img-fluid" src="{{get_file_url($rn->main_image)}}" alt="{{ $rn->translate(app()->getLocale())->title ?? '' }}"/>
                                            <div class="card-footer bg-transparent border-0 h-100 d-flex flex-column">
                                                <h6 class="h6 text__dark fw-bold mb-3"> {{ $rn->translate(app()->getLocale())->title ?? ''}}</h6>
                                                <p class="text__grey5 fw-normal blog-description text__overflow mt-auto mb-0">
                                                    {{ $rn->translate(app()->getLocale())->short_content ?? ''}}
                                                </p>
                                                <ul class="list-group list-group-horizontal list-unstyled justify-content-between flex-wrap flex-md-nowrap w-100 mt-3 mb-0">
                                                    <li class="blog-readmore mb-3 mb-md-0"><span
                                                            class="me-2">{{ __('READ MORE') }}</span><i
                                                            class="fas fa-arrow-right"></i></li>
                                                    <li class="blog-area">
                                                        <div class="d-inline-flex align-items-center me-2"><i
                                                                class="far fa-calendar"></i><span class="ms-2">{{ convertDateToReadableFormat($rn->created_at, app()->getLocale()) }}</span>
                                                        </div>
                                                        <div class="d-inline-flex align-items-center ms-3"><i
                                                                class="far fa-eye"></i><span class="ms-2">{{ $rn->show }}</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex d-md-none align-items-center justify-content-center mt-4 g-4">
                <div class="col">
                    <div
                        class="swiper__nav d-inline-flex align-items-center justify-content-center position-relative w-100"
                        id="blogs-slider__nav">
                        <div class="swiper-button-prev btn__prev"><i class="far fa-chevron-left"></i></div>
                        <div class="swiper-button-next btn__next"><i class="far fa-chevron-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
