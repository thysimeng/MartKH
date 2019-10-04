@extends('layouts.app', ['title' => __('Franchise Management')])

@section('content')
    @include('layouts.headers.cards')

    @if($sidebar==0)
        <div class="container-fluid mt--7">
    @elseif($sidebar==1)
        <div class="container-fluid bg-dark mt--7">
    @endif
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                                    <div class="col-4">
                                        <h3 class="mb-0">Franchise</h3>
                                    </div>
                                    <form class="col-4" id="search-franchises" method="get" action="{{ route('admin.stock.logSearch') }}">
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
                                            <a href="{{ route('admin.stock') }}" class="btn btn-md btn-primary">{{ __('Back to list') }}</a>
                                    </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('ID') }}</th>
                                    <th scope="col">{{ __('Product') }}</th>
                                    <th scope="col">{{ __('Old Amount') }}</th>
                                    <th scope="col">{{ __('New Amount') }}</th>
                                    <th scope="col">{{ __('Reason') }}</th>
                                    <th scope="col">{{ __('Type') }}</th>
                                    <th scope="col">{{ __('Edited By') }}</th>
                                    <th scope="col">{{ __('Edited At') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stock_log as $stock_logs)
                                    <tr>
                                        <td>{{ $stock_logs->id }}</td>
                                        <td>{{ $stock_logs->product->name }}</td>
                                        <td>{{ $stock_logs->old_amount }}</td>
                                        <td>{{ $stock_logs->new_amount }}</td>
                                        <td>{{ $stock_logs->reason }}</td>
                                        <td>{{ $stock_logs->type }}</td>
                                        <td>{{ $stock_logs->edited_by }}</td>
                                        <td>{{ Carbon\Carbon::parse($stock_logs->created_at)->format('d/m/Y H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $stock_log->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>

@endsection
