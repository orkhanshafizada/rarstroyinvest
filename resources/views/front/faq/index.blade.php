@extends('front.layouts.app')
@section('content')
    <!-- Content-->
    <main class="main flex-shrink-0 pb-20 pb-md-10">
        <section class="section__faq">
            <div class="container py-0">
                <div class="row gx-md-5 gy-3">
                    <div class="col-12 col-md-12">
                        <nav class="breadcrumbs__nav" aria-label="breadcrumb">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">{{ __('Home') }}</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Faq') }}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-12 col-md-8 mx-auto mb-5">
                        <div class="card card__faq bg__white border-0">
                            <div class="card-header bg-transparent border-0 text-center p-0">
                                <h2 class="h2 text__primary fw-bold lh-base mb-0 mb-md-4">{{ __('FAQ') }}</h2>
                            </div>
                            <div class="card-body p-0">
                                <div class="accordion accordion__faq bg-transparent" id="accordionFaq">
                                    @php($i = 1)
                                    @foreach($faqs as $faq)
                                        <?php
                                            if($i == 1){ $open = 'true'; } else { $open = 'false'; }
                                        ?>
                                        <div class="accordion-item">
                                            <div class="accordion-header">
                                                <button class="accordion-button align-items-baseline px-0 py-2"
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#collapse{{$faq->id}}"
                                                        aria-expanded="{{ $open }}"
                                                        aria-controls="collapse{{$faq->id}}">
                                                    <h6 class="h6 faq__question fw-semibold text__dark lh-base mb-0">
                                                        {{ $faq->translate(app()->getLocale())->title }}
                                                    </h6>
                                                </button>
                                            </div>
                                            <div
                                                class="accordion-collapse collapse multi-collapse @if($i == 1) in show @endif"
                                                id="collapse{{$faq->id}}">
                                                <div class="accordion-body px-0">
                                                    <p class="faq__answer fw-normal text__grey5 lh-base mb-0">
                                                        {{ $faq->translate(app()->getLocale())->content }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        @php($i++)
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
