<div class="sidebar sidebar-light sidebar-main sidebar-expand-lg">
    <div class="sidebar-content">
        <div class="sidebar-section sidebar-user my-1">
            <div class="sidebar-user-material">
                <div class="sidebar-section-body">
                    <div class="d-flex">
                        <div class="flex-1 text-right">
                            <button type="button"
                                    class="btn btn-outline-light border-transparent btn-icon rounded-pill btn-sm sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                                <i class="icon-transmission"></i>
                            </button>
                        </div>
                    </div>

                    <div class="text-center ">
                        <h6 class="mb-0 text-white text-shadow-dark mt-3">{{ auth()->guard('admin')->user()->fullname }}</h6>
                        <span
                            class="font-size-sm text-white text-shadow-dark">{{ auth()->guard('admin')->user()->roles->first()->name ?? "" }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar-section">
            <ul class="nav nav-sidebar" data-nav-type="accordion">
                <li class="nav-item">
                    <a href="{{ route('admin.index') }}"
                       class="nav-link {{ request()->routeIs('admin.index') ? 'active' : '' }}" onclick="loader();">
                        <i class="icon-home4"></i>
                        <span>{{ __('Dashboard') }}</span>
                    </a>
                </li>
                <li class="nav-item-header">
                    <div class="text-uppercase font-size-xs line-height-xs">{{ __('User Permissions') }}</div>
                    <i class="icon-menu" title="{{ __('User Permissions') }}"></i></li>
                @can('moderator.show', 'admin')
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link"><i class="icon-user-lock"></i> <span>{{ __('Moderators') }}</span></a>
                        <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                            <li class="nav-item"><a href="{{ route('admin.moderator.index') }}"
                                                    class="nav-link {{ request()->routeIs('admin.moderator.index') ? 'active' : '' }}"
                                                    onclick="loader();"><i class="icon-users4"></i> {{ __('Users') }}
                                </a></li>
                            <li class="nav-item"><a href="{{ route('admin.role.index') }}"
                                                    class="nav-link {{ request()->routeIs('admin.role.index') ? 'active' : '' }}"
                                                    onclick="loader();"><i
                                        class="icon-clipboard6"></i> {{ __('Roles') }}</a></li>
                            <li class="nav-item"><a href="{{ route('admin.permission.index') }}"
                                                    class="nav-link {{ request()->routeIs('admin.permission.index') ? 'active' : '' }}"
                                                    onclick="loader();"><i
                                        class="icon-grid"></i> {{ __('Permissions') }}</a></li>
                        </ul>
                    </li>
                @endcan


                <li class="nav-item-header">
                    <div class="text-uppercase font-size-xs line-height-xs">{{ __('House Parameters') }}</div>
                    <i class="icon-menu" title="{{ __('House Parameters') }}"></i></li>

                @can('mortgage.show', 'admin')
                    <li class="nav-item">
                        <a href="{{ route('admin.mortgage.index') }}"
                           class="nav-link {{ request()->routeIs('admin.mortgage.index') ? 'active' : '' }}"
                           onclick="loader();">
                            <i class="icon-credit-card"></i>
                            <span>{{ __('Mortgage') }}</span>
                        </a>
                    </li>
                @endcan
                @can('structure.show', 'admin')
                    <li class="nav-item">
                        <a href="{{ route('admin.structure.index') }}"
                           class="nav-link {{ request()->routeIs('admin.structure.index') ? 'active' : '' }}"
                           onclick="loader();">
                            <i class="icon-strategy"></i>
                            <span>{{ __('Structure') }}</span>
                        </a>
                    </li>
                @endcan
                @can('filter.show', 'admin')
                    <li class="nav-item">
                        <a href="{{ route('admin.filter.index') }}"
                           class="nav-link {{ request()->routeIs('admin.filter.index') ? 'active' : '' }}"
                           onclick="loader();">
                            <i class="icon-filter3"></i>
                            <span>{{ __('Filter') }}</span>
                        </a>
                    </li>
                @endcan
                @can('house.show', 'admin')
                    <li class="nav-item">
                        <a href="{{ route('admin.house.index') }}"
                           class="nav-link {{ request()->routeIs('admin.house.index') ? 'active' : '' }}"
                           onclick="loader();">
                            <i class="icon-home"></i>
                            <span>{{ __('House') }}</span>
                        </a>
                    </li>
                @endcan
                @can('portfolio.show', 'admin')
                    <li class="nav-item">
                        <a href="{{ route('admin.portfolio.index') }}"
                           class="nav-link {{ request()->routeIs('admin.portfolio.index') ? 'active' : '' }}"
                           onclick="loader();">
                            <i class="icon-portfolio"></i>
                            <span>{{ __('Portfolio') }}</span>
                        </a>
                    </li>
                @endcan

                <li class="nav-item-header">
                    <div class="text-uppercase font-size-xs line-height-xs">{{ __('Menus') }}</div>
                    <i class="icon-menu" title="{{ __('Menus') }}"></i></li>

                @can('about.show', 'admin')
                    <li class="nav-item">
                        <a href="{{ route('admin.about.show', 1) }}"
                           class="nav-link {{ request()->routeIs('admin.about.show') ? 'active' : '' }}"
                           onclick="loader();">
                            <i class="icon-address-book"></i>
                            <span>{{ __('About Us') }}</span>
                        </a>
                    </li>
                @endcan
                @can('news.show', 'admin')
                    <li class="nav-item">
                        <a href="{{ route('admin.news.index') }}"
                           class="nav-link {{ request()->routeIs('admin.news.index') ? 'active' : '' }}"
                           onclick="loader();">
                            <i class="icon-newspaper"></i>
                            <span>{{ __('Blog') }}</span>
                        </a>
                    </li>
                @endcan
                @can('faqs.show', 'admin')
                    <li class="nav-item">
                        <a href="{{ route('admin.faq.index') }}"
                           class="nav-link {{ request()->routeIs('admin.faq.index') ? 'active' : '' }}"
                           onclick="loader();">
                            <i class="icon-question3"></i>
                            <span>{{ __('Faq') }}</span>
                        </a>
                    </li>
                @endcan

                @can('contacts.show', 'admin')
                    <li class="nav-item">
                        <a href="{{ route('admin.contact.index') }}"
                           class="nav-link {{ request()->routeIs('admin.contact.index') ? 'active' : '' }}"
                           onclick="loader();">
                            <i class="icon-envelope"></i>
                            <span>{{ __('Contact Us') }}</span>
                        </a>
                    </li>
                @endcan
                @can('slider.show', 'admin')
                    <li class="nav-item">
                        <a href="{{ route('admin.slider.index') }}"
                           class="nav-link {{ request()->routeIs('admin.slider.index') ? 'active' : '' }}"
                           onclick="loader();">
                            <i class="icon-gallery"></i>
                            <span>{{ __('Slider') }}</span>
                        </a>
                    </li>
                @endcan
                @can('partners.show', 'admin')
                    <li class="nav-item">
                        <a href="{{ route('admin.partner.index') }}"
                           class="nav-link {{ request()->routeIs('admin.partner.index') ? 'active' : '' }}"
                           onclick="loader();">
                            <i class="icon-user"></i>
                            <span>{{ __('Partner') }}</span>
                        </a>
                    </li>
                @endcan
                @can('staff.show', 'admin')
                    <li class="nav-item">
                        <a href="{{ route('admin.staff.index') }}"
                           class="nav-link {{ request()->routeIs('admin.staff.index') ? 'active' : '' }}"
                           onclick="loader();">
                            <i class="icon-users"></i>
                            <span>{{ __('Staff') }}</span>
                        </a>
                    </li>
                @endcan
                @can('comments.show', 'admin')
                    <li class="nav-item">
                        <a href="{{ route('admin.comment.index') }}"
                           class="nav-link {{ request()->routeIs('admin.comment.index') ? 'active' : '' }}"
                           onclick="loader();">
                            <i class="icon-comments"></i>
                            <span>{{ __('Comments') }}</span>
                        </a>
                    </li>
                @endcan
                <li class="nav-item-header">
                    <div class="text-uppercase font-size-xs line-height-xs">{{ __('Settings') }}</div>
                    <i class="icon-menu" title="{{ __('Site Settings') }}"></i></li>
                @can('languages.show', 'admin')
                    <li class="nav-item">
                        <a href="{{ route('languages.index') }}"
                           class="nav-link {{ request()->routeIs('languages.index') ? 'active' : '' }}"
                           onclick="loader();">
                            <i class="icon-color-sampler"></i>
                            <span>{{ __('Language') }}</span>
                        </a>
                    </li>
                @endcan
                @can('settings.show', 'admin')
                    <li class="nav-item">
                        <a href="{{ route('admin.config') }}"
                           class="nav-link {{ request()->routeIs('admin.config') ? 'active' : '' }}"
                           onclick="loader();">
                            <i class="icon-cog3"></i>
                            <span>{{ __('Settings') }}</span>
                        </a>
                    </li>
                @endcan
            </ul>
        </div>
    </div>
</div>
