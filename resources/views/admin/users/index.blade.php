@extends('layouts.app', ['title' => __('User Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <!-- Tabs -->
                        <ul class="nav nav-tabs card-header-tabs" id="bologna-list" role="tablist">
                                    <li class="nav-item col-2">
                                      <a class="nav-link active" id="nav-admin-tab" href="#nav-admin" data-toggle="tab" role="tab" aria-controls="admin" aria-selected="true">{{ __('Admin') }}</a>
                                    </li>
                                    <li class="nav-item col-2">
                                      <a class="nav-link"  href="#nav-user" data-toggle="tab" role="tab" aria-controls="user" aria-selected="false">{{ __('User') }}</a>
                                    </li>
                                    <li class="nav-item col-2">
                                      <a class="nav-link" href="#nav-franchise" data-toggle="tab" role="tab" aria-controls="franchise" aria-selected="false">{{ __('Franchise') }}</a>
                                    </li>
                                    
                                    <!-- Search -->
                                    <form class="col-4" id="search-user" method="get" action="{{ route('user.search') }}">
                                            <div class="form-group mb-4">
                                                <div class="input-group input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                                    </div>
                                                    <input class="form-control" placeholder="Search" type="search" name="search">
                                                </div>
                                            </div>
                                    </form>
                                        
                                    <!-- Add users -->
                                    <div class="col-2 text-right">
                                            <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">{{ __('Add user') }}</a>
                                    </div>
                        </ul>
                    </div>
                    
                    <!-- success message -->
                    <!-- <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div> -->
                    
                    <!-- Users Table -->
                    <div class="tab-content" id="nav-tabContent">
                        <!-- Admin List -->
                        <div class="tab-pane active" id="nav-admin" role="tabpanel1">
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">{{ __('Name') }}</th>
                                            <th scope="col">{{ __('Email') }}</th>
                                            <th scope="col">{{ __('Role') }}</th>
                                            <th scope="col">{{ __('Creation Date') }}</th>
                                            <th scope="col">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            @if ($user->role == 'admin')
                                                <tr>
                                                    <td>{{ $user->name }}</td>
                                                    <td>
                                                        <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                                    </td>
                                                    <td>{{ $user->role }}</td>
                                                    <td>{{ Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i') }}</td>
                                                    <td class="text-right">
                                                        <div class="dropdown">
                                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                @if ($user->id != auth()->id())
                                                                    <form action="{{ route('user.destroy', $user) }}" method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        
                                                                        <a class="dropdown-item" href="{{ route('user.edit', $user) }}">{{ __('Edit') }}</a>
                                                                        <button type="button" class="dropdown-item delete-btn">
                                                                            {{ __('Delete') }}
                                                                        </button>
                                                                    </form>    
                                                                @else
                                                                    <a class="dropdown-item" href="{{ route('admin.profile.edit') }}">{{ __('Edit') }}</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                         <!-- User List -->
                         <div class="tab-pane" id="nav-user" role="tabpanel1">
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">{{ __('Name') }}</th>
                                            <th scope="col">{{ __('Email') }}</th>
                                            <th scope="col">{{ __('Role') }}</th>
                                            <th scope="col">{{ __('Creation Date') }}</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            @if($user->role == 'user')
                                                <tr>
                                                    <td>{{ $user->name }}</td>
                                                    <td>
                                                        <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                                    </td>
                                                    <td>{{ $user->role }}</td>
                                                    <td>{{ Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i') }}</td>
                                                    <td class="text-right">
                                                        <div class="dropdown">
                                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                @if ($user->id != auth()->id())
                                                                    <form action="{{ route('user.destroy', $user) }}" method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        
                                                                        <a class="dropdown-item" href="{{ route('user.edit', $user) }}">{{ __('Edit') }}</a>
                                                                        <button type="button" class="dropdown-item delete-btn">
                                                                            {{ __('Delete') }}
                                                                        </button>
                                                                    </form>    
                                                                @else
                                                                    <a class="dropdown-item" href="{{ route('admin.profile.edit') }}">{{ __('Edit') }}</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Franchise List -->
                        <div class="tab-pane" id="nav-franchise" role="tabpanel1">
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">{{ __('Name') }}</th>
                                            <th scope="col">{{ __('Email') }}</th>
                                            <th scope="col">{{ __('Role') }}</th>
                                            <th scope="col">{{ __('Creation Date') }}</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            @if($user->role == 'franchise')
                                                <tr>
                                                    <td>{{ $user->name }}</td>
                                                    <td>
                                                        <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                                    </td>
                                                    <td>{{ $user->role }}</td>
                                                    <td>{{ Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i') }}</td>
                                                    <td class="text-right">
                                                        <div class="dropdown">
                                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                @if ($user->id != auth()->id())
                                                                    <form action="{{ route('user.destroy', $user) }}" method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        
                                                                        <a class="dropdown-item" href="{{ route('user.edit', $user) }}">{{ __('Edit') }}</a>
                                                                        <button type="button" class="dropdown-item delete-btn">
                                                                            {{ __('Delete') }}
                                                                        </button>
                                                                    </form>    
                                                                @else
                                                                    <a class="dropdown-item" href="{{ route('admin.profile.edit') }}">{{ __('Edit') }}</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $users->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>

    <script type="text">
        document.getElementById('search-franchises').submit();
    </script>

    <script>
        $('.delete-btn').click(function(e){
            e.preventDefault();
            Swal.fire({
                title: 'Warning',
                text: "Are you sure you want to delete this user?",
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