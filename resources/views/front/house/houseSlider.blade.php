<div class="row g-4">
    <div class="col-12 col-md-12">
        <div class="swiper-container">
            <div class="swiper swiper__slider" id="projects-slider" data-slides="4" data-xs-slides="1.5"
                 data-sm-slides="1.5" data-md-slides="3" data-lg-slides="4" data-dotes="1"
                 data-scrollbar="1" data-spaceBetween="20" data-delay="5">
                <div class="swiper-wrapper">
                    @foreach($houses as $house)
                        <div class="swiper-slide h-auto">
                            @include('front.house.house')
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
