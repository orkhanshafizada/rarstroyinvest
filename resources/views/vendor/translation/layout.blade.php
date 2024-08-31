@extends('admin.layouts.app')
@section('content')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('/vendor/translation/css/main.css') }}">
    <style>
        .rounded-pill{
            height: 0 !important;
        }
    </style>

    <div id="app">

        @include('translation::nav')
        @include('translation::notifications')

        @yield('body')

    </div>

    <script src="{{ asset('/vendor/translation/js/app.js') }}"></script>

@endsection
