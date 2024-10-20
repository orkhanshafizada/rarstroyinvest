<!-- Header-->
<div class="top__bar d-none d-md-block">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-9 col-md-8 col-lg-8 mx-auto">
                <ul class="nav contact-info justify-content-center">
                    <li class="nav-item"><span class="nav-link text__grey5 p-0"><i class="far fa-clock-eight"></i>{{ setting('time') }}</span></li>
                    <li class="nav-item"><a class="nav-link text__grey5 p-0" href="mailto:{{ setting('email') }}"><i class="far fa-envelope"></i>{{ setting('email') }}</a></li>
                    <li class="nav-item"><a class="nav-link text__grey5 p-0" href="https://maps.app.goo.gl/Qzs9dRBWz193Qoi47"> <i class="far fa-location-dot"></i>{{ setting('address') }}</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<header class="header d-flex align-items-center sticky-top" id="header">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
        <!-- ul class="list-unstyled lang__switch align-items-lg-center d-block d-md-none">
            <li class="nav-item dropdown dropdown-animate" data-bs-toggle="collapse"><a class="nav-link dropdown-toggle submenu__link" href="{{ url('locale/'.app()->getLocale()) }}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fi fi-{{ app()->getLocale() == 'en' ? "gb" : app()->getLocale() }} fis border-radius__circle flag__icon"></span>{{ strtoupper(app()->getLocale()) }}</a>
                <div class="dropdown-menu p-0">
                    <ul class="list-unstyled list-group list-group-flush">
                        <li class="dropdown dropdown-submenu submenu__item"><a class="nav-link text-decoration-none" href="{{ url('locale/en') }}"><span class="fi fi-gb fis border-radius__circle flag__icon"></span>en</a></li>
                        <li class="dropdown dropdown-submenu submenu__item"><a class="nav-link text-decoration-none" href="{{ url('locale/ru') }}"><span class="fi fi-ru fis border-radius__circle flag__icon"></span>ru</a></li>
                    </ul>
                </div>
            </li>
        </ul -->
        <a class="navbar-brand d-flex d-md-none justify-content-center mx-auto" href="{{ route('home.index') }}">
            <img class="img-fluid navbar-brand-img" alt="{{ setting('title') }}" src="{{ asset(setting('logo_white')) }}"/>
        </a>
        <a class="navbar-brand d-none d-md-flex" href="{{ route('home.index') }}">
            <img class="img-fluid navbar-brand-img" alt="{{ setting('title') }}" src="{{ asset(setting('logo_colorful')) }}"/>
        </a>
        @include('front.layouts.navbar')
        <div class="menu-btn d-xl-none">
            <div class="menu-btn_burger"></div>
        </div>
        <!-- <ul class="list-unstyled navbar-main lang__switch align-items-lg-center d-none d-md-block">
            <li class="nav-item dropdown dropdown-animate" data-bs-toggle="hover">
                <a class="nav-link dropdown-toggle submenu__link" href="{{ url('locale/'.app()->getLocale()) }}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fi fi-{{ app()->getLocale() == 'en' ? "gb" : app()->getLocale() }} fis border-radius__circle flag__icon"></span>
                    {{ strtoupper(app()->getLocale()) }}
                </a>
                <div class="dropdown-menu p-0">
                    <ul class="list-unstyled list-group list-group-flush">
                        <li class="dropdown dropdown-submenu submenu__item"><a class="nav-link text-decoration-none" href="{{ url('locale/en') }}"><span class="fi fi-gb fis border-radius__circle flag__icon"></span>en</a></li>
                        <li class="dropdown dropdown-submenu submenu__item"><a class="nav-link text-decoration-none" href="{{ url('locale/ru') }}"><span class="fi fi-ru fis border-radius__circle flag__icon"></span>ru</a></li>
                    </ul>
                </div>
            </li>
        </ul> -->
        <div class="d-none d-md-grid"><a class="btn btn-md btn-primary border-radius__30 d-none d-lg-inline-flex px-5 px-md-2 px-lg-3" href="tel:{{ setting('mobile') }}"><i class="far fa-phone"></i><span class="text-uppercase body__text1 fw-bold">{{ __('Call us') }}</span></a></div>
    </div>
</header>
