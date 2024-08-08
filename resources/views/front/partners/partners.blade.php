    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section__title mb-2">
                    <h2 class="h2 fw-bold text__primary mb-0">{{ __('Trusted by global companies') }}</h2>
                </div>
                <p class="body__text1 fw-normal text__grey5 mb-4">{{ __('Raratroyinvest is accredited as a verified hosting provider') }}</p>
            </div>
        </div>
    </div>
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col">
                <div class="tricker-container bg__white">
                    <div class="tricker-track">
                        @foreach($partners as $partner)
                        <div class="tricker-slide"><img src="{{ asset($partner->image) }}" alt=""/></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
