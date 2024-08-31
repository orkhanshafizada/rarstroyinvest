<section class="about__main mb-5 pt-4">
    <div class="container">
        <div class="row align-items-center g-4 g-md-5">
            <div class="col-12 col-md-6 order-2 order-md-1">
                <div class="swiper-container">
                    <div class="swiper swiper__slider about__main-slider position-relative overflow-hidden h-100" id="about-slider" data-slides="1" data-xs-slides="1" data-sm-slides="1" data-md-slides="1" data-lg-slides="1" data-dotes="1" data-scrollbar="1" data-spaceBetween="0" data-delay="5">
                        <div class="swiper-wrapper">
                            @foreach($aboutus->image as $aboutusImage)
                            <div class="swiper-slide h-auto">
                                <img class="img-fluid object-fit-cover h-100" src="{{ asset('storage/'.$aboutusImage->name) }}" alt="{{ $aboutus->translate(app()->getLocale())->title }}"/>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-5 mx-auto order-1 order-md-2">
                <div class="position-relative h-100">
                    <div class="section__title mb-2">
                        <h2 class="h2 fw-bold text__primary mb-0">
                            {{ $aboutus->translate(app()->getLocale())->title }}
                        </h2>
                    </div>
                    <p class="sub__title2 fw-normal lh-base">
                        {!! $aboutus->translate(app()->getLocale())->short_description !!}
                    <a class="text-decoration-none btn btn-primary border-radius__50 fw-bold">
                        {{ __('See more') }}
                        <i class="far fa-arrow-right-long"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
