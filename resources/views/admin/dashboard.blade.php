@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    @if($sidebar==1)
        <div class="container-fluid bg-dark mt--7" style="min-height:660px;">
    @else
        <div class="container-fluid mt--7">
    @endif
         <div class="row">
            <div class="col-xl-8 mb-5 mb-xl-0">
                @if($gradientColor===NULL)
                <!-- <div class="card bg-gradient-default shadow"> -->
                <div class="card shadow" style="background-color:{{$basicColor}}">
                @else
                <div class="card shadow" style="background:{{$gradientColor}}">
                @endif
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                <h2 class="text-white mb-0">New Products</h2>
                            </div>
                            <div class="col">
                                {{-- <ul class="nav nav-pills justify-content-end">
                                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chartSales" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="$" data-suffix="k">
                                        <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                                            <span class="d-none d-md-block">Month</span>
                                            <span class="d-md-none">M</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" data-toggle="chart" data-target="#chartSales" data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}' data-prefix="$" data-suffix="k">
                                        <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                                            <span class="d-none d-md-block">Week</span>
                                            <span class="d-md-none">W</span>
                                        </a>
                                    </li>
                                </ul> --}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="background-color:white">
                        <!-- Chart -->
                        <div class="chart">
                            <!-- Chart wrapper -->
                            <canvas id="chartProduct" class="chart-canvas"></canvas>
                            <!-- <canvas id="chartSales"></canvas> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                                <h2 class="mb-0">User Growth</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="chartUser" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div> 

        <div class="row mt-5">
            <div class="col-xl-8 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Most Recent Users</h3>
                            </div>
                            {{--<div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-primary">See all</a>
                            </div>--}}
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Creation Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($newUsers as $newUser)
                                <tr>
                                    <th scope="row">
                                        {{ $newUser->name }}
                                    </th>
                                    <td>
                                        {{ $newUser->email }}
                                    </td>
                                    <td>
                                        {{ $newUser->created_at }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Most Wishlisted Products</h3>
                            </div>
                            {{--<div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-primary">See all</a>
                            </div>--}}
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">By Users</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mostWishlisted as $mostWishlist)
                                <tr>
                                    <th scope="row">
                                        {{ $mostWishlist->name }}
                                    </th>
                                    <td>
                                        {{ $mostWishlist->wishlistCount }}
                                    </td>
                                    {{--<td>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2">60%</span>
                                            <div>
                                                <div class="progress">
                                                <div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>--}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

<!-- Chart JS -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js'></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script>
    $(document).ready(function(){
        // Chart Product
        // !!! cPC stands for chartProductCount
        var cPC = @json($chartProductCount);
        var ctx1 = document.getElementById('chartProduct').getContext('2d');
        var chartProduct = new Chart(ctx1, {
            type: 'line',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: '# of Votes',
                    data: [cPC[1], cPC[2], cPC[3], cPC[4], cPC[5], cPC[6], cPC[7], cPC[8], cPC[9], cPC[10], cPC[11], cPC[12]],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'red',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        })
        
        // Chart User
        // !!! cUC stands for chartUserCount
        var cUC = @json($chartUserCount);
        var ctx2 = document.getElementById('chartUser').getContext('2d');
        var chartUser = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ["Jan-Feb", "Mar-Apr", "May-Jun", "Jul-Aug", "Sep-Oct", "Nov-Dec"],
                datasets: [{
                    label: '# of Votes',
                    data: [cUC[1]+cUC[2], cUC[3]+cUC[4], cUC[5]+cUC[6], cUC[7]+cUC[8], cUC[9]+cUC[10], cUC[11]+cUC[12]],
                    // backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    // borderColor: 'red',
                    backgroundColor: '#ffc000',
                    borderColor: 'orange',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        }) 
    });
</script>

{{-- @push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush --}}
