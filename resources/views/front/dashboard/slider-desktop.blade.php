@if($sliders->count())
<div class="slider slider__main stick-dots">
    @foreach($sliders as $slider)
    <div class="slide">
        <div class="slide__img"><img class="img-fluid animated" src="{{ asset($slider->image ?? '') }}" alt="{{ $slider->translate(app()->getLocale())->title }}" data-lazy="{{ asset($slider->image ?? '') }}" data-animation-in="zoomInImage"/></div>
        <div class="container h-100 d-none d-lg-block p-0">
            <div class="slide__content d-flex">
                <div class="slide__content--headings text-start justify-content-start border-radius__40 position-relative overflow-hidden">
                    <div class="overlay overlay__blur opacity_1 z-index-1"></div>
                    <h3 class="h3 text-uppercase mb-3 animated" data-animation-in="fadeInLeft">{{ $slider->translate(app()->getLocale())->title }}</h3>
                    <a class="btn btn-primary border-radius__50 mt-3 animated" data-animation-in="fadeInUp" data-delay-in="0" href="{{ $slider->link ?: '' }}">
                        {{ __('Learn More') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif
