    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section__title mb-2">
                    <h2 class="h2 fw-bold text__primary mb-0">{{ __('Trusted by global companies') }}</h2>
                </div>
                <p class="body__text1 fw-normal text__grey5 mb-4">{{ __('Raratroyinvest is accredited as a verified hosting provider') }}</p>
            </div>
        </div>
    </div>
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col">
                <div class="tricker-container bg__white">
                    <div class="swiper-container">
                        <div class="partners-slider swiper swiper__slider" id="partners-slider" data-slides="6" data-xs-slides="1.5" data-sm-slides="2.5" data-md-slides="3.5" data-lg-slides="6" data-dotes="1" data-scrollbar="1" data-spaceBetween="50" data-delay="5">
                            <div class="swiper-wrapper">
                                @foreach($partners as $partner)
                                <div class="swiper-slide d-flex justify-content-center align-items-center h-auto w-auto">
                                    <img class="img-fluid" src="{{ asset('storage/'.$partner->image) }}" alt=""/>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
