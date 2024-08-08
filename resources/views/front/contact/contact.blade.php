@extends('front.layouts.app')
@section('content')
    <!-- Content-->
    <main class="main flex-shrink-0 pb-20 pb-md-10">
        <section class="section__contacts">
            <div class="container py-0">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <nav class="breadcrumbs__nav" aria-label="breadcrumb">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">{{ __('Home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Contacts') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="card card__contact border-0">
                    <div class="row g-4 g-md-5">
                        <div class="col-12 col-md-6">
                            <div class="card card__map position-relative overflow-hidden border-0 h-100 w-100">
                                <iframe class="h-100 w-100 d-flex" src="https://maps.google.com/maps?hl=en&amp;q=1%20{{ setting('address') }}&amp;hl=en&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" frameborder="0"> </iframe>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="row row__contacts h-100">
                                <div class="col-12">
                                    <div class="card card__contacts border-0 h-100 rounded-0">
                                        <div class="card-header border-0 bg-transparent p-0">
                                            <h2 class="h2 fw-bold text__primary mb-4 mb-md-5">{{ __('Let’s build an awesome project together!') }}</h2>
                                        </div>
                                        <div class="card-body px-0 pt-2 pt-md-0 pb-4">
                                            <ul class="list__contact list-unstyled w-100">
                                                <li class="d-block"><a class="text-decoration-none w-100 d-inline-flex align-items-center" href="tel:{{ setting('mobile') }}"><span class="icon"><i class="far fa-phone"></i></span><span class="body__text2 text__dark fw-normal mb-0">{{ setting('mobile') }}</span></a></li>
                                                <li class="d-block"><a class="text-decoration-none w-100 d-inline-flex align-items-center" href="mailto:{{ setting('email') }}"><span class="icon"><i class="far fa-envelope"></i></span><span class="body__text2 text__dark fw-normal mb-0">{{ setting('email') }}</span></a></li>
                                                <li class="d-block"><a class="text-decoration-none w-100 d-inline-flex align-items-center" href="#">
                                                        <span class="icon"><i class="far fa-location-dot"></i></span>
                                                        <span class="body__text2 text__dark fw-normal mb-0">{{ setting('address') }}</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="card card__socials h-100 rounded-0">
                                        <div class="card-header border-0 bg-transparent p-0">
                                            <h5 class="h5 fw-bold text__dark text-start mb-4">{{ __('Follow us on social media') }}</h5>
                                        </div>
                                        <div class="card-body p-0">
                                            <ul class="social__list list-group-horizontal list-unstyled align-items-center d-flex flex-wrap">
                                                <li class="d-inline-flex align-items-center"><a class="text-decoration-none" href="{{ setting('facebook') }}"  target="_blank"><i class="fab fa-facebook"></i></a></li>
                                                <li class="d-inline-flex align-items-center"><a class="text-decoration-none" href="{{ setting('instagram') }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                                <li class="d-inline-flex align-items-center"><a class="text-decoration-none" href="{{ setting('linkedin') }}"  target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                                <li class="d-inline-flex align-items-center"><a class="text-decoration-none" href="{{ setting('telegram') }}"  target="_blank"><i class="fab fa-telegram"></i></a></li>
                                                <li class="d-inline-flex align-items-center"><a class="text-decoration-none" href="{{ setting('whatsapp') }}"  target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('front.contact.form')
            </div>
        </section>
    </main>
@endsection
