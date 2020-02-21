@extends('layouts.app', ['title' => __('Stock Management')])

@section('content')
    @include('layouts.headers.cards')

    @if($sidebar==1)
        <div class="container-fluid bg-dark mt--7" style="min-height:660px;">
            <div class="row">
                <div class="col">
                    <div class="card shadow bg-dark border">
                        <div class="card-header bg-transparent border-0">
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <h3 class="mb-0 text-white">Stock Requests</h3>
                                </div>
    @else
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <h3 class="mb-0">Stock Requests</h3>
                                </div>
    @endif
                            <form class="col-4" action="{{route('admin.request_stock.search')}}" method="get" role="search">
                                    {{ csrf_field() }}
                                    <div class="form-group mb-2 mt-2">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Search" type="text" name="search">
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
                                    <th scope="col">{{ __('Main Stock') }}</th>
                                    <th scope="col">{{ __('Request Date') }}</th>
                                    <th scope="col">{{ __('Status') }}</th>
                                    <th scope="col">{{ __('Action') }}</th>
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
                                        <td>{{ $requestStock->product->stocks->amount }}</td>
                                        <td>{{ $requestStock->created_at->diffForHumans() }}</td>
                                        <td>
                                            @if ($requestStock->status == 'pending')
                                                <span class="badge badge-primary text-white" style="background-color:#fb6340; font-size:.8rem">{{ $requestStock->status }}</span>
                                            @elseif ($requestStock->status == 'approved')
                                                <span class="badge badge-success" style="font-size:.8rem">{{ $requestStock->status }}</span>
                                            @elseif ($requestStock->status == 'declined')
                                                <span class="badge badge-danger" style="font-size:.8rem">{{ $requestStock->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <form method="get" action="{{ route('admin.request.approve', $requestStock->id) }}" id="approveForm">
                                                        @csrf
                                                        <button type="button" class="dropdown-item text-success" data-toggle="modal" data-target="#approveModal"
                                                        data-franchise_name="{{ $requestStock->franchise->franchise_name}}" data-product_name="{{ $requestStock->product->name }}"
                                                        data-amount="{{$requestStock->amount}}" data-stock="{{$requestStock->product->stocks->amount}}">
                                                            {{ __('Approve') }}
                                                        </button>
                                                        <a class="dropdown-item text-danger declineBtn" href="{{ route('admin.request.decline', $requestStock->id) }}">{{ __('Decline') }}</a>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-7">
                        <div class="d-flex justify-content-end">
                            {{$requestStocks->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>

    <div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="approveTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="approveTitle">Confirm</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mt-3">
                    <div class="col-lg-4">
                        <span>To Franchise: </span>
                    </div>
                    <div class="col-lg-8">
                        <span id="franchise_name"></span>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-4">
                        <span>Product: </span>
                    </div>
                    <div class="col-lg-8">
                        <span id="product_name"></span>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-4">
                        <span>Amount: </span>
                    </div>
                    <div class="col-lg-8">
                        <span id="amount"></span>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-4">
                        <span>Amount in Stock: </span>
                    </div>
                    <div class="col-lg-8">
                        <span id="stock"></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success approveBtn">Approve</button>
            </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $(function() {
                $('#approveModal').on("show.bs.modal", function (e) {
                    // $("#id").html($(e.relatedTarget).data('id'));
                    $("#franchise_name").html($(e.relatedTarget).data('franchise_name'));
                    $("#product_name").html($(e.relatedTarget).data('product_name'));
                    $("#amount").html($(e.relatedTarget).data('amount'));
                    $("#stock").html($(e.relatedTarget).data('stock'));

                });
            });
        });
        $('.approveBtn').click(function(e){
            e.preventDefault();
            console.log('approveBtn');
            $('#approveForm').submit();
        });
        $('.declineBtn').click(function(e){
            e.preventDefault();
            var link = $(this).attr('href');
            Swal.fire({
                title: 'Warning',
                text: "Are you sure you want to decline this request?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
            if (result.value) {
                window.location.href = link;
            }
            })
        });
    </script>
@endsection


