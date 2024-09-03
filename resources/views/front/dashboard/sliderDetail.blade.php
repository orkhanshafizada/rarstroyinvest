@extends('front.layouts.app')
@section('meta-tags')
    <title>{{ $slider->translate(app()->getLocale())->title ?? '' }}</title>
    <meta property='og:title' content='{{ $slider->translate(app()->getLocale())->title ?? '' }}'/>
    <meta property='og:description' content='{{ $slider->translate(app()->getLocale())->content ?? '' }}'/>
    <meta property='og:image' content='{{ asset($slider->image) }}'/>
    <meta property='og:url' content='{{ url()->current() }}'/>
    <meta property='twitter:title' content='{{ $slider->translate(app()->getLocale())->title ?? '' }}'/>
    <meta property='twitter:description' content='{{ $slider->translate(app()->getLocale())->content ?? '' }}'/>
    <meta property='twitter:image' content='{{ asset($slider->image) }}'/>
    <meta property='twitter:url' content='{{ url()->current() }}'/>
@endsection
@section('content')
    <main class="main flex-shrink-0 pb-20 pb-md-10">
        <section class="section__blog-detail">
            <div class="container py-0">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <nav class="breadcrumbs__nav" aria-label="breadcrumb">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">{{ __('Home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Blogs') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row g-0 g-md-4 mt-0 mt-md-3 mb-4">
                    <div class="col-12">
                        <div class="img__wrapper"><img class="img-fluid w-100" src="{{asset($slider->image)}}" alt="{{ $slider->translate(app()->getLocale())->title ?? '' }}"/></div>
                    </div>
                    <div class="col-12 col-md-8 mx-md-auto">
                        <ul class="list-group list-group-horizontal list-unstyled justify-content-between w-100 mt-4 mt-md-4 mb-4">
                            <li class="blog-area">
                                <div class="d-inline-flex align-items-center me-2"><i class="far fa-calendar"></i><span class="ms-2">{{ convertDateToReadableFormat($slider->created_at, app()->getLocale()) }}</span></div>
                            </li>
                        </ul>
                        <h1 class="h1 fw-bold lh-sm mb-4">{{ $slider->translate(app()->getLocale())->title ?? '' }}</h1>
                        <div class="section__content">
                            {!! $slider->translate(app()->getLocale())->content ?? '' !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
