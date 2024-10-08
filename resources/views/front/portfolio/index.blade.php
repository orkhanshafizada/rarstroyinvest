@extends('front.layouts.app')
@section('content')
    <main class="main flex-shrink-0 pb-5">
        <section class="section__catalogue pb-5">
            <div class="container py-0">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <nav class="breadcrumbs__nav" aria-label="breadcrumb">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">{{ __('Home') }}</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Houses') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row g-0 g-md-4 mt-0 mt-md-3 mb-0 mb-md-4">
                    <div class="col-12 col-md-9">
                        <div class="section__title mb-2">
                            <h1 class="h2 fw-bold text__primary mb-0">{{ __("Houses") }}</h1>
                        </div>
                        <p class="body__text1 fw-normal text__grey5 mb-4"> {{ __('Houses Description') }}</p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    @include('front.portfolio.filters')
                    <section class="col-lg-9 col-md-12">
                        <!-- list icon-->
                        <div class="d-lg-flex justify-content-between align-items-center">
                            <!-- icon-->
                            <div class="d-inline-flex d-md-flex grid__filters justify-content-between align-items-center">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="ms-0 d-lg-none">
                                        <a class="btn h6 text__primary fw-bold px-0 mb-0"
                                        data-bs-toggle="offcanvas" href="#offcanvasCategory"
                                        role="button" aria-controls="offcanvasCategory">
                                              <span class="me-2">{{ __('Filters') }}</span><i class="far fa-sliders-up"></i>
                                        </a>
                                    </div>
                                </div>
{{--                                <div class="d-flex align-items-center mt-0 mt-lg-0">--}}
{{--                                    <div class="d-none d-md-flex">--}}
{{--                                        <p class="mb-0 me-3">{{ __('Sort by') }}:</p>--}}
{{--                                        <span class="mb-0 me-3 sort ascPrice" id="sortBtn">--}}
{{--                                            {{ __('Price') }}--}}
{{--                                            <i class="far fa-arrow-down-short-wide ms-1 iconAsc"></i>--}}
{{--                                            <i class="far fa-arrow-down-wide-short ms-1 iconDesc"></i>--}}
{{--                                            <input type="hidden" name="sortType" class="sortInput" id="sortInput" value='ascPrice'>--}}
{{--                                        </span>--}}
{{--                                    </div>--}}
{{--                                    <div class="d-block d-md-none">--}}
{{--                                        <select class="form-select" name="sortType">--}}
{{--                                        <option value="ascPrice">{{ __('Price') }}: {{ __('Low to High') }}</option>--}}
{{--                                        <option value="descPrice">{{ __('Price') }}: {{ __('High to Low') }}</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                            <div class="mb-3 mb-lg-0 d-none d-md-block">
                                <p class="mb-0">
                                    <span class="text-dark">{{ __('Projects found') }}:</span>
                                    <span id="totalHouses" class="ms-1">{{ $totalHouses }}</span>
                                </p>
                            </div>
                        </div>
                        <div id="housesContainer" class="position-relative h-100">
                            @include('front.portfolio.partials.houses')
                            <div id="loader" class="loader" style="display: none;">
                                <img src="{{ asset('front/assets/loader.gif') }}" alt="Loading..."/>
                            </div>
                        </div>
                        <div id="pagination" class="mb-4 mb-md-5 pb-4">
                            @include('front.portfolio.partials.pagination')
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </main>

@endsection

@section('css')
    <style>
        .loader {
            position: absolute;
            top: 10%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
        }
    </style>
@endsection
@section('javascripts')
    <script src="{{ asset('front/assets/plugins/jquery/jquery-ui.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('front/assets/plugins/jquery/jquery-ui.css') }}">

    <script>
        $(document).ready(function () {

            $("#sortBtn").on('click', function () {
                var sortInput = $("#sortInput");

                if($(this).hasClass('descPrice')) {
                    sortInput.val('ascPrice');
                    $(this).removeClass('descPrice');
                    $(this).addClass('ascPrice');
                } else if($(this).hasClass('ascPrice')) {
                    sortInput.val('descPrice');
                    $(this).removeClass('ascPrice');
                    $(this).addClass('descPrice');
                }
            });

            function filter_data(page = 1) {
                var formData = $('#filterFormPortfolio').serialize() + '&page=' + page;

                $('#loader').show();

                $.ajax({
                    url: '{{ route('portfolio.filter') }}',
                    type: 'GET',
                    data: formData,
                    success: function (response) {
                        $('#housesContainer').html(response.houses);
                        $('#pagination').html(response.pagination);
                        $('#totalHouses').html(response.totalHouses);
                    },
                    error: function (xhr) {
                        //console.log(xhr.responseText);
                    },
                    complete: function () {
                        $('#loader').hide();
                    }
                });
            }

            $('#filterFormPortfolio').on('change', function () {
                filter_data();
            });

            $(document).on('click', '.pagination__link', function (e) {
                e.preventDefault();
                var page = $(this).data('page');
                if (page) {
                    filter_data(page);
                }
            });

            filter_data();
        });

    </script>
@endsection
