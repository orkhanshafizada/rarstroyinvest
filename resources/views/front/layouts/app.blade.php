<!DOCTYPE html>
<html class="h-100" lang="en">
<head>
    <title>{{ setting('title') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Inter:100,200,300,regular,500,600,700,800,900" rel="stylesheet"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="title" content="{{ setting('meta_title') }}">
    <meta name="description" content="{{ setting('meta_description') }}">
    <meta name="keywords" content="{{ setting('meta_keywords') }}">
    <meta name="author" content="{{ setting('meta_author') }}">
    <link rel="shortcut icon" href="{{ setting('favicon') }}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{ setting('favicon') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ setting('favicon') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ setting('favicon') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ setting('favicon') }}">

    <!-- Open Graph Meta Tags -->
    @yield('meta-tags')

    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin=""/>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&amp;display=swap" rel="stylesheet"/>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="{{ asset('front/assets/plugins/fontawesome/css/all.min.css') }}"/>
    <!-- Flag Icons -->
    <link rel="stylesheet" href="{{ asset('front/assets/plugins/flag-icons/flag-icons.min.css') }}"/>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('front/assets/plugins/bootstrap/css/bootstrap.min.css') }}"/>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="{{ asset('front/assets/plugins/swiper/swiper.min.css') }}"/>
    <!-- Slick CSS -->
    <link rel="stylesheet" href="{{ asset('front/assets/plugins/slickcarousel/slick.min.css') }}"/>
    <!-- Slider range CSS -->
    <link rel="stylesheet" href="{{ asset('front/assets/plugins/nouislider/nouislider.min.css') }}"/>
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('front/assets/plugins/animate/animate.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('front/assets/plugins/aos/aos.css') }}"/>
    <!-- Fancybox -->
    <link rel="stylesheet" href="{{ asset('front/assets/plugins/fancybox/fancybox.min.css') }}"/>
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/style.min.css') }}"/>

    @yield('css')
    @routes
</head>
<body class="d-flex flex-column h-100">
@include('front.layouts.header')
@yield('content')
@include('front.layouts.footer')
<!-- JS assets -->
<script src="{{ asset('front/assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('front/assets/plugins/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('front/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('front/assets/plugins/swiper/swiper.min.js') }}"></script>
<script src="{{ asset('front/assets/plugins/swiper/swiper-settings.js') }}"></script>
<script src="{{ asset('front/assets/plugins/slickcarousel/slick.min.js') }}"></script>
<script src="{{ asset('front/assets/plugins/slickcarousel/slick.settings.js') }}"></script>
<script src="{{ asset('front/assets/plugins/slickcarousel/slick-animation.min.js') }}"></script>
<script src="{{ asset('front/assets/plugins/aos/aos.js') }}"></script>
<script src="{{ asset('front/assets/plugins/wNumb/wNumb.min.js') }}"></script>
<script src="{{ asset('front/assets/plugins/nouislider/nouislider.min.js') }}"></script>
<script src="{{ asset('front/assets/plugins/fancybox/fancybox.min.js') }}"></script>
<script src="{{ asset('front/assets/js/main.js') }}"></script>
@yield('javascripts')
</body>
</html>
