@extends('layouts.app', ['title' => __('Franchise Management')])

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
                                    <h3 class="mb-0 text-white">Franchise</h3>
                                </div>
    @else
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <h3 class="mb-0">Franchise</h3>
                                </div>
    @endif
                                    <form class="col-4 mb-2 mt-2" method="get" id="search-franchises" action="{{ route('admin.stock.logSearch') }}" autocomplete="off">
                                        <div class="input-group input-group-alternative">
                                            {{-- <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                            </div> --}}
                                        <input class="form-control" placeholder="Search" type="text" name="search" id="search" value="" style="border: 1px solid #11cdef">
                                        <span class="form-clear d-none"><i class="fas fa-times-circle">clear</i></span>
                                        <div class="input-group-append">
                                            <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                    {{-- <form class="col-4" id="search-franchises" method="get" action="{{ route('admin.stock.logSearch') }}">
                                            <div class="form-group mb-2 mt-2">
                                                <div class="input-group input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                                    </div>
                                                    <input class="form-control" placeholder="Search" type="search" name="search">
                                                </div>
                                            </div>
                                    </form> --}}
                                    <div class="col-4 text-right">
                                            <a href="{{ route('admin.stock') }}" class="btn btn-md btn-primary">{{ __('Back to list') }}</a>
                                    </div>
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
                    @if($sidebar==1)
                        <div class="card-footer bg-dark py-4 border">
                    @else
                        <div class="card-footer py-4">
                    @endif
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
