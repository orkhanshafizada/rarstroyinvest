@if($sliders->count())
<div class="slider-content card card__slider border-0 d-block d-lg-none">
    @foreach($sliders as $slider)
    <div class="img-slide">
        <h3 class="h3 fw-bold text-uppercase text__primary mb-3 animated" data-animation-in="fadeInLeft">{{ $slider->translate(app()->getLocale())->title }}</h3>
        <a class="btn btn-primary mt-3 animated" data-animation-in="fadeInUp" data-delay-in="0.8" href="{{ $slider->link ?: route("slider.show", $slider->translate(app()->getLocale())->slug) }}">
            {{ __('Learn More') }}
        </a>
    </div>
    @endforeach
</div>
@endif
