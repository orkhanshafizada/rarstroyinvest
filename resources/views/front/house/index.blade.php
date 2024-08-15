@extends('front.layouts.app')
@section('content')
    <main class="main flex-shrink-0 pb-20 pb-md-10">
        <section class="section__catalogue">
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
                            <h2 class="h2 fw-bold text__primary mb-0">{{ __("Houses") }}</h2>
                        </div>
                        <p class="body__text1 fw-normal text__grey5 mb-4"> {{ __('Houses Description') }}</p>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="row">
                @include('front.house.filters')
                <section class="col-lg-9 col-md-12">
                    <!-- list icon-->
                    <div class="d-lg-flex justify-content-between align-items-center">
                        <!-- icon-->
                        <div class="d-inline-flex d-md-flex grid__filters justify-content-between align-items-center">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="ms-0 d-lg-none">
                                    <a class="btn body__text1 text__primary fw-bold px-0"
                                       data-bs-toggle="offcanvas" href="#offcanvasCategory"
                                       role="button" aria-controls="offcanvasCategory">
                                        <span class="me-2">Filters</span><i class="far fa-sliders-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mt-0 mt-lg-0">
                                <div class="d-none d-md-flex">
                                    <p class="mb-0 me-3">Sort by:</p>
                                    <p class="mb-0 me-3">Price <i class="far fa-arrow-down-wide-short ms-1"></i></p>
                                    <p class="mb-0 me-3">Price <i class="far fa-arrow-down-short-wide ms-1"></i></p>
                                </div>
                                <div class="d-block d-md-none">
                                    <!-- select option-->
                                    <select class="form-select">
                                        <option selected="">Sort by: Featured</option>
                                        <option value="Low to High">Price: Low to High</option>
                                        <option value="High to Low">Price: High to Low</option>
                                        <option value="Release Date">Release Date</option>
                                        <option value="Avg. Rating">Avg. Rating</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 mb-lg-0 d-none d-md-block">
                            <p class="mb-0">
                                <span class="text-dark">{{ __('Projects found') }}:</span>
                                <span class="ms-1">{{ $totalHouses }}</span>
                            </p>
                        </div>
                    </div>
                    <div id="housesContainer">
                        @include('front.house.partials.houses')
                    </div>

                    <div id="pagination">
                        @include('front.house.partials.pagination')
                    </div>
                </section>
            </div>
        </div>
    </main>
    <div id="loader" class="loader" style="display: none;">
        <img src="{{ asset('front/assets/images/loader.gif') }}" alt="Loading..."/>
    </div>
@endsection

@section('css')
    <style>
        .loader {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
        }
    </style>
@endsection

@section('javascripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script>
        $(document).ready(function () {
            // Slider'ı başlat
            $("#priceRangeMain").slider({
                range: true,
                min: {{ $minPrice }},
                max: {{ $maxPrice }},
                values: [{{ request('price_min', $minPrice) ?: $minPrice }}, {{ request('price_max', $maxPrice) ?: $maxPrice }}],
                slide: function (event, ui) {
                    $(".min").val(ui.values[0]);
                    $(".max").val(ui.values[1]);
                },
                stop: function (event, ui) {
                    filter_data();
                }
            });

            $(".min").on('change', function () {
                var minValue = $(this).val();
                var maxValue = $(".max").val();
                $("#priceRangeMain").slider("values", [minValue, maxValue]);
            });

            $(".max").on('change', function () {
                var minValue = $(".min").val();
                var maxValue = $(this).val();
                $("#priceRangeMain").slider("values", [minValue, maxValue]);
            });

            function filter_data() {
                var formData = $('#filterForm').serialize();

                $('#loader').show();

                $.ajax({
                    url: '{{ route('house.filter') }}',
                    type: 'GET',
                    data: formData,
                    success: function (response) {
                        $('#housesContainer').html(response.houses);
                        $('#pagination').html(response.pagination);
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                    },
                    complete: function () {
                        $('#loader').hide();
                    }
                });
            }

            $('#filterForm').on('change', function () {
                filter_data();
            });

            filter_data();
        });
    </script>
@endsection
