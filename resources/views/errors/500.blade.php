@extends('front.layouts.app')
@section('content')
    <main class="main container-fluid p-0">
        <div class="row">
            <div class="col-12 p-0">
                <div class="block__container error__block">
                    <div class="block__wrapper">
                        <div class="block__header">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        <div
                                            class="block__info justify-content-center align-items-center d-flex flex-column">
                                            <img class="img-fluid block__info-img"
                                                 src="{{ get_file_url('front/assets/images/500-error.png') }}" alt="500 Error">
                                            <span class="block__info-txt error-txt5 text-center">
            									{{ __("It's not you, it's us") }}! <br> <br>
            									{{ __('We are trying to fix things here! We won’t take that long!') }}
            								</span>
                                            <a class="btn block__info-btn" href="{{ route('home.index') }}"
                                               role="button"> {{ __('Return to the homepage!') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
