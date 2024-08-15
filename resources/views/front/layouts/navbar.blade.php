<nav class="navmenu ms-md-auto" id="navmenu">
    <ul class="navbar-nav align-items-lg-center ms-0 ms-md-auto mb-0">
        <li class="nav-item {{ request()->routeIs('home.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('home.index') }}">{{ __('Home') }}</a></li>
        <li class="nav-item {{ request()->routeIs('abour.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('about.index') }}">{{ __('About') }}</a></li>
        <li class="nav-item {{ request()->routeIs('house.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('house.index') }}">{{ __('Catalogue') }}</a></li>
        <li class="nav-item {{ request()->routeIs('news.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('news.index') }}">{{ __('Blog') }}</a></li>
        <li class="nav-item {{ request()->routeIs('faq.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('faq.index') }}">{{ __('FAQ') }}</a></li>
        <li class="nav-item {{ request()->routeIs('contact.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('contact.index') }}">{{ __('Contacts') }}</a></li>
        <a class="btn btn-md btn-primary border-radius__30 col-11 d-flex justify-content-center d-lg-none py-2 my-3 mx-auto" href="{{ setting('mobile') }}">
            <i class="far fa-phone"></i>
            <span class="text-uppercase body__text1 fw-bold">{{ __('Call us') }}</span>
        </a>
    </ul>
</nav>
