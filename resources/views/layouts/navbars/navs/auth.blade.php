<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark d-none d-md-flex" id="navbar-main">
    <div class="container-fluid">
        {{-- nav  --}}
        {{-- <button class="navbar-toggler"  type="button" data-toggle="collapse" data-target="#sidenav-main">Hello</button> --}}
        <button class="navbar-toggler shadow-none--hover shadow-none" style="display:block !important;" type="button" onclick="closeNav()" id="nav-toggle-icon">
                <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        {{-- <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('home') }}">{{ __('Dashboard') }}</a> --}}
        <!-- Form -->
        {{-- <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
            <div class="form-group mb-0">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                    </div>
                    <input class="form-control" placeholder="Search" type="text">
                </div>
            </div>
        </form> --}}
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle d-flex">
                            <img alt="Image placeholder" src="{{ asset('uploads') }}/avatar/{{ auth()->user()->avatar}}">
                        </span>
                        <div class="media-body ml-2 d-none d-md-block">
                            <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->name }}</span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <!-- My Profile -->
                    @if (auth()->user()->role == 'admin')
                    <a href="{{ route('admin.profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
                    @elseif (auth()->user()->role == 'franchise')
                    <a href="{{ route('franchise.edit.profile') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
                    @endif
                    <a href="{{route('settings.index')}}" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>{{ __('Settings') }}</span>
                    </a>
                    {{-- <a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>{{ __('Dark Mode') }}</span>
                        <label class="custom-toggle">
                            <input type="checkbox" checked="">
                            <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                        </label>
                    </a> --}}
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>{{ __('Support') }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
