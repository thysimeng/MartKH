@extends('layouts.app', ['title' => __('Stock Request History')])

@section('content')
    @include('layouts.headers.cards')

    @if($sidebar==1)
        <div class="container-fluid bg-dark mt--7" style="min-height:660px;">
            <div class="row">
                <div class="col">
                    <div class="card bg-dark shadow border">
                        <div class="card-header bg-transparent border-0">
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <h3 class="mb-0 text-white">Request History</h3>
                                </div>
    @else
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <h3 class="mb-0">Request History</h3>
                                </div>
    @endif
                            <form class="col-4" action="{{route('admin.requestHistorySearch')}}" method="get" role="search">
                                    {{ csrf_field() }}
                                    <div class="form-group mb-2 mt-2">
                                        <div class="input-group input-group-alternative">
                                            <input class="form-control" placeholder="Search" type="text" name="search" id="search" value="" style="border: 1px solid #11cdef">
                                            <span class="form-clear d-none"><i class="fas fa-times-circle">clear</i></span>
                                            <div class="input-group-append">
                                                <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive">
                        @if($sidebar==1)
                            <table class="table align-items-center table-flush table-hover table-dark">
                        @else
                            <table class="table align-items-center table-flush table-hover">
                        @endif
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('ID') }} </th>
                                    <th scope="col">{{ __('Franchise Name') }}</th>
                                    <th scope="col">{{ __('Product Name') }}</th>
                                    <th scope="col">{{ __('Product Image') }}</th>
                                    <th scope="col">{{ __('Amount') }}</th>

                                    <th scope="col">{{ __('Request Date') }}</th>
                                    <th scope="col">{{ __('Status') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($requestStocks as $requestStock)
                                    <tr>
                                        <td>{{ $requestStock->id }}</td>
                                        <td>{{ $requestStock->franchise->franchise_name}}</td>
                                        <td>{{ $requestStock->product->name }}</td>
                                        <td><img src="{{asset( 'uploads/product_image/' .$requestStock->product->image  )}}" alt="" class="img-thumbnail " style="width:50px"></td>
                                        <td>{{ $requestStock->amount }}</td>
                                        <td>{{ $requestStock->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            @if ($requestStock->status == 'pending')
                                                <span class="badge badge-primary text-white" style="background-color:#fb6340; font-size:.8rem">{{ $requestStock->status }}</span>
                                            @elseif ($requestStock->status == 'approved')
                                                <span class="badge badge-success" style="font-size:.8rem">{{ $requestStock->status }}</span>
                                            @elseif ($requestStock->status == 'declined')
                                                <span class="badge badge-danger" style="font-size:.8rem">{{ $requestStock->status }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-7">
                        <div class="d-flex justify-content-end">
                            {{ $requestStocks->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>

@endsection


