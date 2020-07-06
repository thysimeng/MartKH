@extends('layouts.app', ['title' => __('Stocks')])

@section('content')
    @include('franchise.layouts.headers.cards')

    @if($franDarkMode==1)
        <div class="container-fluid bg-dark mt--7" style="min-height:630px;">
    @else
        <div class="container-fluid mt--7">
    @endif
    {{--<div class="container-fluid mt--7">--}}
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                                    <div class="col-4">
                                        <h3 class="mb-0">Stocks</h3>
                                    </div>
                                    <form class="col-4" id="search-stockFranchise" method="get" action="{{ route('franchise.stock.search') }}">
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
                                    <div class="col-4 text-right">
                                            <a href="{{ route('franchise.requestHistory') }}" class="btn btn-sm btn-primary">{{ __('Request History') }}</a>
                                            <a href="{{ route('franchise.request') }}" class="btn btn-sm btn-primary">{{ __('Request Stock') }}</a>
                                    </div>
                                    
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Stock ID') }}</th>
                                    <th scope="col">{{ __('Code') }}</th>
                                    <th scope="col">{{ __('Image') }}</th>
                                    <th scope="col">{{ __('Product Name') }}</th>
                                    <th scope="col">{{ __('Amount') }}</th>
                                    <th scope="col">{{ __('Price') }}</th>
                                    <th scope="col">{{ __('Created Date') }}</th>
                                    <!-- <th scope="col">{{ __('Action') }}</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stock_fran as $stock_frans)
                                    <tr>
                                        <td>{{ $stock_frans->sfid }}</td>
                                        <td>{{ $stock_frans->code }}</td>
                                        <td><img src="{{asset( 'uploads/product_image/' . $stock_frans->image )}}" alt="" class="img-thumbnail " style="width:50px;"></td>
                                        <td>{{$stock_frans->name}}</td>
                                        <td>{{$stock_frans->amount}}</td>
                                        <td>{{$stock_frans->price}}</td>
                                        <td>{{ Carbon\Carbon::parse($stock_frans->sf_created)->format('d/m/Y H:i') }}</td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $stock_fran->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @include('franchise.layouts.footers.auth')
    </div>

    <script type="test/javascript">
        document.getElementById('search-stockFranchise').submit();
    </script>
    <script type="text/javascript">
        $('.delete-btn').click(function(e){
            e.preventDefault();
            Swal.fire({
                title: 'Warning',
                text: "Are you sure you want to delete this franchise?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
            if (result.value) {
                this.parentElement.submit()
            }
            })
        });
    </script>
@endsection