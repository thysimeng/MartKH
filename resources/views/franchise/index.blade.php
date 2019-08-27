@extends('layouts.app', ['title' => __('Stocks')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                                    <div class="col-4">
                                        <h3 class="mb-0">Stocks</h3>
                                    </div>
                                    <form class="col-4" id="search-stockFranchise" method="get" action="{{ route('franchises.search') }}">
                                            <div class="form-group mb-2 mt-2">
                                                <div class="input-group input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                                    </div>
                                                    <input class="form-control" placeholder="Search" type="search" name="search">
                                                </div>
                                            </div>
                                    </form>
                                    <div class="col-4 text-right">
                                            <a href="{{ route('franchise.request') }}" class="btn btn-sm btn-primary">{{ __('Request Stock') }}</a>
                                    </div>
                                    
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Stock ID') }}</th>
                                    <th scope="col">{{ __('Amount') }}</th>
                                    <th scope="col">{{ __('Product ID') }}</th>
                                    <th scope="col">{{ __('Creation Date') }}</th>
                                    <!-- <th scope="col">{{ __('Action') }}</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stock_fran as $stock_frans)
                                    <tr>
                                        <td>{{ $stock_frans->id }}</td>
                                        <td>{{ $stock_frans->amount }}</td>
                                        <td>{{ $stock_frans->product_id }}</td>
                                        <td>{{ Carbon\Carbon::parse($stock_frans->created_at)->format('d/m/Y H:i') }}</td>
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

        @include('layouts.footers.auth')
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