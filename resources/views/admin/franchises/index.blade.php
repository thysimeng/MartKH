@extends('layouts.app', ['title' => __('Franchise Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                                    <div class="col-4">
                                        <h3 class="mb-0">Franchise</h3>
                                    </div>
                                    <form class="col-4" id="search-franchises" method="get" action="{{ route('franchises.search') }}">
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
                                            <a href="{{ route('franchises.create') }}" class="btn btn-sm btn-primary">{{ __('Add Franchise') }}</a>
                                    </div>

                        </div>
                    </div>

                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Franchise ID') }}</th>
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('Address') }}</th>
                                    <th scope="col">{{ __('Creation Date') }}</th>
                                    <th scope="col">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($franchises as $franchise)
                                    <tr>
                                        <td>{{ $franchise->id }}</td>
                                        <td>{{ $franchise->franchise_name }}</td>
                                        <td>{{ $franchise->address }}</td>
                                        <td>{{ Carbon\Carbon::parse($franchise->created_at)->format('d/m/Y H:i') }}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    {{-- delete fucntion --}}
                                                        @if(isset($franchise->id))
                                                        <form method="post" action="{{ route('franchises.destroy', $franchise->id) }}">
                                                            @csrf
                                                            @method('delete')
                                                            <a class="dropdown-item" href="{{ route('franchises.edit', $franchise->id) }}">{{ __('Edit') }}</a>
                                                            <!-- <a class="dropdown-item" href="">{{ __('Edit') }}</a> -->
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Delete') }}
                                                            </button>
                                                        </form>
                                                        @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{-- <!-- {{ $users->links() }} --> --}}
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>

    <script type="test/javascript">
        document.getElementById('search-franchises').submit();
    </script>
@endsection