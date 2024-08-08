<div class="navbar navbar-expand-lg navbar-dark bg-indigo navbar-static">
    <div class="d-flex flex-1 d-lg-none">
        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-paragraph-justify3"></i>
        </button>

        <button data-target="#navbar-search" type="button" class="navbar-toggler" data-toggle="collapse">
            <i class="icon-search4"></i>
        </button>
    </div>

    <div class="navbar-brand text-center text-lg-left">
        <a href="{{ route('admin.index') }}" class="d-inline-block">
            <img src="/{{ setting('logo_white') != "logo white" ? setting('logo_white') : ''}}" class="d-none d-sm-block" alt="">
            <img src="/{{ setting('logo_white') != "logo white" ? setting('logo_white') : ''}}" class="d-sm-none" alt="">
        </a>
    </div>

    <div class="navbar-collapse collapse flex-lg-1 mx-lg-3 order-2 order-lg-1" id="navbar-search">
    </div>

    <div class="d-flex justify-content-end align-items-center flex-1 flex-lg-0 order-1 order-lg-2">
        <ul class="navbar-nav flex-row">
             <li class="nav-item nav-item-dropdown-lg dropdown">
                <a href="#" class="navbar-nav-link">
                    <span class="d-none d-lg-inline-block ml-2">{{ auth()->guard('admin')->user()->fullname }}</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.logout') }}" class="navbar-nav-link navbar-nav-link-toggler">
                    <i class="icon-switch2"></i>
                </a>
            </li>
        </ul>
    </div>
</div>
