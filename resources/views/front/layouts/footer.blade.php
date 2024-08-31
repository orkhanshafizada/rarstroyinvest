<!-- Footer-->
<footer class="footer mt-auto">
    <div class="container">
        <div class="footer__block">
            <div class="row footer__body gx-0 gy-5 gx-md-0 gy-md-0">
                <div class="col-12 col-md-3">
                    <a class="navbar-brand d-flex justify-content-center justify-content-md-start mt-0 mx-auto me-md-auto" href="{{ route('home.index') }}">
                        <img class="img-fluid company__logo" alt="{{ setting('title') }}" src="{{ asset(setting('logo_white'))}}"/>
                    </a>
                </div>
                <div class="col-6 col-md-2">
                    <ul class="footer__menu list-group list-unstyled w-100 d-inline-flex me-auto">
                        <li class="d-inline-flex align-items-center"><a class="body__text1 fw-normal text-decoration-none" href="{{ route('home.index') }}">{{ __('Home') }}</a></li>
                        <li class="d-inline-flex align-items-center"><a class="body__text1 fw-normal text-decoration-none" href="{{ route('about.index') }}">{{ __('About') }}</a></li>
                        <li class="d-inline-flex align-items-center"><a class="body__text1 fw-normal text-decoration-none" href="{{ route('house.index') }}">{{ __('Catalogue') }}</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-2">
                    <ul class="footer__menu list-group list-unstyled w-100 d-inline-flex me-auto">
                        <li class="d-inline-flex align-items-center"><a class="body__text1 fw-normal text-decoration-none" href="{{ route('news.index') }}">{{ __('Blog') }}</a></li>
                        <li class="d-inline-flex align-items-center"><a class="body__text1 fw-normal text-decoration-none" href="{{ route('faq.index') }}">{{ __('Faq') }}</a></li>
                        <li class="d-inline-flex align-items-center"><a class="body__text1 fw-normal text-decoration-none" href="{{ route('contact.index') }}">{{ __('Contact') }}</a></li>
                    </ul>
                </div>
                <div class="col-12 col-md-2">
                    <ul class="footer__contacts list-group list-unstyled">
                        <li class="d-inline-flex align-items-center"><span class="contact-item text-decoration-none d-flex align-items-center"><i class="far fa-clock"></i><span class="contact-text">{{ setting('time') }}</span></span></li>
                        <li class="d-inline-flex align-items-center"><a class="contact-item text-decoration-none d-flex align-items-center" href="tel:{{ setting('mobile') }}"><i class="far fa-phone"></i><span class="contact-text">{{ setting('mobile') }}</span></a></li>
                        <li class="d-inline-flex align-items-center"><a class="contact-item text-decoration-none d-flex align-items-center" href="mailto:{{ setting('email') }}"><i class="far fa-at"></i><span class="contact-text">{{ setting('email') }}</span></a></li>
                        <li class="d-inline-flex align-items-center"><a class="contact-item text-decoration-none d-flex align-items-center" href="https://maps.app.goo.gl/Qzs9dRBWz193Qoi47"><i class="far fa-location-dot"></i><span class="contact-text">{{ setting('address') }}</span></a></li>
                    </ul>
                </div>
                <div class="col-12 col-md-auto ms-0 ms-md-auto">
                    <a class="btn btn-md btn-white border-radius__30 d-inline-flex py-3 w-100 mb-4" href="tel:{{ setting('mobile') }}">
                        <i class="far fa-phone"></i>
                        <span class="text-uppercase body__text1 fw-bold">{{ __('Call us') }}</span>
                    </a>
                    <h6 class="h6 fw-normal text-white text-start mt-0 mt-md-3">{{ __('Follow us') }}</h6>
                    <ul class="social__list list-group-horizontal list-unstyled justify-content-between justify-content-md-start align-items-center d-flex flex-wrap">
                        <li class="d-inline-flex align-items-center"><a class="text-decoration-none" href="{{ setting('facebook') }}"  target="_blank"><i class="fab fa-facebook"></i></a></li>
                        <li class="d-inline-flex align-items-center"><a class="text-decoration-none" href="{{ setting('instagram') }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <li class="d-inline-flex align-items-center"><a class="text-decoration-none" href="{{ setting('linkedin') }}"  target="_blank"><i class="fab fa-linkedin"></i></a></li>
                        <li class="d-inline-flex align-items-center"><a class="text-decoration-none" href="{{ setting('telegram') }}"  target="_blank"><i class="fab fa-telegram"></i></a></li>
                        <li class="d-inline-flex align-items-center"><a class="text-decoration-none" href="{{ setting('whatsapp') }}"  target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="row footer__sub g-0 g-md-0">
                <div class="col-12 col-md-6 mx-auto">
                    <p class="rights__reserved text__white text-center text-md-center mt__0 mt__md-0 mb-0">{{ setting('copyright') }}</p>
                </div>
            </div>
        </div>
    </div>
</footer>
