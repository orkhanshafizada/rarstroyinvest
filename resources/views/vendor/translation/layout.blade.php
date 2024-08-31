@extends('admin.layouts.app')
@section('content')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ get_file_url('/vendor/translation/css/main.css') }}">
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

    <script src="{{ get_file_url('/vendor/translation/js/app.js') }}"></script>

@endsection
