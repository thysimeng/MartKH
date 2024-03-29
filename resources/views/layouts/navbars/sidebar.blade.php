@if($sidebar==0)
    <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white trasition-left" id="sidenav-main">
@elseif($sidebar==1)
    <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-dark bg-dark trasition-left" id="sidenav-main">
@endif
    {{-- <div id="sidenav-main"> --}}
        <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
        {{-- <a class="navbar-brand pt-0" href="{{ route('home') }}"> --}}
            {{-- <img src="{{ asset('argon') }}/img/brand/blue.png" class="navbar-brand-img" alt="..."> --}}
            <img src="{{ asset('uploads') }}/logo/{{$logo}}" class="navbar-brand-img img-fluid" alt="...">
            {{-- <img src="{{ asset('icon') }}/mkh.svg" class="navbar-brand-img img-fluid svg social-link" alt="..."> --}}
            {{-- <span class="text-danger">MartKH</span>  --}}
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{ asset('uploads') }}/avatar/{{ auth()->user()->avatar}}">
                            {{-- <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1-800x800.jpg"> --}}
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ route('admin.profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>{{ __('Settings') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>{{ __('Activity') }}</span>
                    </a>
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
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            {{-- <img src="{{ asset('argon') }}/img/brand/blue.png"> --}}
                            <span class="text-danger">MartKH</span>
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link active" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples"> --}}
                        {{-- <i class="fab fa-laravel" style="color: #f4645f;"></i> --}}
                        {{-- <i class="fas fa-user-ninja text-danger"></i>
                        <span class="nav-link-text">{{ __('User') }}</span>
                    </a>

                    <div class="collapse show" id="navbar-examples">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.profile.edit') }}">
                                    {{ __('Profile') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.index') }}">
                                    {{ __('User Management') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link " data-toggle="collapse" data-target="#collapse_user" aria-expanded="false" aria-controls="collapse_user">
                        <i class="fas fa-user-ninja text-danger"></i>
                        <span class="nav-link-text">{{ __('User') }}</span>
                    </a>
                    <div class="collapse" id="collapse_user">
                        <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="{{ route('admin.profile.edit') }}" class="nav-link">{{ __('Profile') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.index') }}" class="nav-link">{{ __('User Management') }}</a>
                        </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.index') }}">
                        {{-- <i class="ni ni-tv-2 text-primary"></i> --}}
                        <i class="fas fa-shopping-bag text-info"></i> {{ __('Product') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.category') }}">
                        {{-- <i class="ni ni-tv-2 text-primary"></i>  --}}
                        <i class="fas fa-store-alt" style="color:#3cb44b;"></i>{{ __('Category') }}
                    </a>
                </li>

                <!-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.stock') }}">
                        {{-- <i class="ni ni-tv-2 text-primary"></i>  --}}
                        <i class="fas fa-cubes" style="color:#ffd600;"></i> {{ __('Stock') }}
                    </a>
                </li> -->

                <li class="nav-item">
                    <a class="nav-link " data-toggle="collapse" data-target="#collapse_stock" aria-expanded="false" aria-controls="collapse_user">
                        <i class="fas fa-cubes" style="color: #FF4500;"></i>
                        <span class="nav-link-text">{{ __('Stock') }}</span>
                    </a>
                    <div class="collapse" id="collapse_stock">
                        <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="{{ route('admin.stock') }}" class="nav-link">{{ __('Main Stock') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.viewFranchiseStock') }}" class="nav-link">{{ __('Franchise Stock') }}</a>
                        </li>
                        </ul>
                    </div>
                </li>

                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.request') }}">
                        <i class="ni ni-tv-2 text-primary"></i>
                        <i class="fas fa-envelope" style="color: #de6800;"></i> {{ __('Stock Requests') }}
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link " data-toggle="collapse" data-target="#collapse_request" aria-expanded="false" aria-controls="collapse_user">
                        <i class="fas fa-envelope" style="color: #f49628;"></i>
                        @if($gradientColor===NULL)
                        <span class="nav-link-text">{{ __('Stock Requests') }}</span> @if($requestData>0)<span class="badge badge-danger text-white ml-2" style="background-color:{{$basicColor}}">new</span>@endif
                        @else
                        <span class="nav-link-text">{{ __('Stock Requests') }}</span> @if($requestData>0)<span class="badge badge-danger text-white ml-2" style="background:{{$gradientColor}}">new</span>@endif
                        @endif
                        {{-- <span class="nav-link-text">{{ __('Stock Requests') }}</span> @if($requestData>0)<span class="badge badge-danger text-white ml-2" style="background-color:#fd0202">new</span>@endif --}}
                    </a>
                    <div class="collapse" id="collapse_request">
                        <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            @if($gradientColor===NULL)
                                <a href="{{ route('admin.request') }}" class="nav-link">{{ __('Requests') }} @if($requestData>0)<span class="badge badge-danger text-white ml-2" style="background-color:{{$basicColor}}">{{$requestData}}</span>@endif</a>
                            @else
                                <a href="{{ route('admin.request') }}" class="nav-link">{{ __('Requests') }} @if($requestData>0)<span class="badge badge-danger text-white ml-2" style="background:{{$gradientColor}}">{{$requestData}}</span>@endif</a>
                            @endif
                        </li>
                        <!-- <li class="nav-item">
                            <a href="{{ route('admin.stock.approved_request') }}" class="nav-link">{{ __('Approved Requests') }}</a>
                        </li> -->
                        <li class="nav-item">
                            <a href="{{ route('admin.requestHistory') }}" class="nav-link">{{ __('History') }}</a>
                        </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('franchises.index') }}">
                        {{-- <i class="ni ni-tv-2 text-primary"></i>  --}}
                        <i class="fas fa-map-marked-alt" style="color:#FF69B4;"></i> {{ __('Franchise') }}
                    </a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="{{ route('ads.index') }}">
                            <i class="fas fa-ad" style="color:turquoise;"></i> {{ __('Ads') }}
                        </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('settings.index') }}">
                        <i class="fas fa-cog text-purple"></i> {{ __('Settings') }}
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-planet text-blue"></i> {{ __('Icons') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-pin-3 text-orange"></i> {{ __('Maps') }}
                    </a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-key-25 text-info"></i> {{ __('Login') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-circle-08 text-pink"></i> {{ __('Register') }}
                    </a>
                </li> --}}
                {{-- <li class="nav-item mb-5" style="position: absolute; bottom: 0;">
                    <a class="nav-link" href="https://www.creative-tim.com/product/argon-dashboard-pro-laravel" target="_blank">
                        <i class="ni ni-cloud-download-95"></i> Upgrade Mart
                    </a>
                </li> --}}
            </ul>
            <!-- Divider -->
                    {{-- <hr class="my-3"> --}}
            <!-- Heading -->
                    {{-- <h6 class="navbar-heading text-muted">Documentation</h6> --}}
            <!-- Navigation -->
            {{-- <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html">
                        <i class="ni ni-spaceship"></i> About Us
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html">
                        <i class="ni ni-palette"></i> Foundation
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html">
                        <i class="ni ni-ui-04"></i> Components
                    </a>
                </li>
            </ul> --}}
        </div>
    </div>
    {{-- </div> --}}
</nav>
