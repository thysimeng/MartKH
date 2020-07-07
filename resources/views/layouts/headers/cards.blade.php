{{-- <div class="header bg-gradient-custom pb-8 pt-5 pt-md-8"> --}}
@if($sidebar==0)
    <div class="header pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->
                <div class="row">
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Products</h5>
                                        <span class="h2 font-weight-bold mb-0">{{$productData}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                            <i class="fas fa-chart-bar"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    @if($productDataCurrentMonth > 0)
                                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> {{$productDataCurrentMonth}}</span>
                                    <span class="text-nowrap">New products this month</span>
                                    @else
                                    <span class="text mr-2"> {{$productDataCurrentMonth}}</span>
                                    <span class="text-nowrap">New products this month</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Categories</h5>
                                        <span class="h2 font-weight-bold mb-0">{{$categoryData}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                            <i class="fas fa-chart-pie"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    @if($categoryDataCurrentMonth > 0)
                                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> {{$categoryDataCurrentMonth}}</span>
                                    <span class="text-nowrap">New categories this month</span>
                                    @else
                                    <span class="text mr-2"> {{$categoryDataCurrentMonth}}</span>
                                    <span class="text-nowrap">New categories this month</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Users</h5>
                                        <span class="h2 font-weight-bold mb-0">{{$userData}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    @if($userDataCurrentMonth > 0)
                                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> {{$userDataCurrentMonth}}</span>
                                    <span class="text-nowrap">New users this month</span>
                                    @else
                                    <span class="text mr-2"> {{$userDataCurrentMonth}}</span>
                                    <span class="text-nowrap">New users this month</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Franchises</h5>
                                        <span class="h2 font-weight-bold mb-0">{{$franchiseData}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                            <i class="fas fa-percent"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    @if($franchiseDataCurrentMonth > 0)
                                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> {{$franchiseDataCurrentMonth}}</span>
                                    <span class="text-nowrap">New franchises this month</span>
                                    @else
                                    <span class="text mr-2"> {{$franchiseDataCurrentMonth}}</span>
                                    <span class="text-nowrap">New franchises this month</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@elseif($sidebar==1)
    <div class="header bg-dark pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->
                <div class="row">
                    <div class="col-xl-3 col-lg-6">
                        <div class="card border bg-dark card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0 text-white">Products</h5>
                                        <span class="h2 font-weight-bold mb-0 text-white">{{$productData}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                            <i class="fas fa-chart-bar"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    @if($productDataCurrentMonth > 0)
                                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> {{$productDataCurrentMonth}}</span>
                                    <span class="text-nowrap">New products this month</span>
                                    @else
                                    <span class="text mr-2"> {{$productDataCurrentMonth}}</span>
                                    <span class="text-nowrap">New products this month</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card bg-dark border card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0 text-white">Categories</h5>
                                        <span class="h2 font-weight-bold mb-0 text-white">{{$categoryData}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                            <i class="fas fa-chart-pie"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    @if($categoryDataCurrentMonth > 0)
                                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> {{$categoryDataCurrentMonth}}</span>
                                    <span class="text-nowrap">New categories this month</span>
                                    @else
                                    <span class="text mr-2"> {{$categoryDataCurrentMonth}}</span>
                                    <span class="text-nowrap">New categories this month</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card border bg-dark card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0 text-white">Users</h5>
                                        <span class="h2 font-weight-bold mb-0 text-white">{{$userData}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    @if($userDataCurrentMonth > 0)
                                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> {{$userDataCurrentMonth}}</span>
                                    <span class="text-nowrap">New users this month</span>
                                    @else
                                    <span class="text mr-2"> {{$userDataCurrentMonth}}</span>
                                    <span class="text-nowrap">New users this month</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card border bg-dark card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0 text-white">Franchises</h5>
                                        <span class="h2 font-weight-bold mb-0 text-white">{{$franchiseData}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                            <i class="fas fa-percent"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    @if($franchiseDataCurrentMonth > 0)
                                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> {{$franchiseDataCurrentMonth}}</span>
                                    <span class="text-nowrap">New franchises this month</span>
                                    @else
                                    <span class="text mr-2"> {{$franchiseDataCurrentMonth}}</span>
                                    <span class="text-nowrap">New franchises this month</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

