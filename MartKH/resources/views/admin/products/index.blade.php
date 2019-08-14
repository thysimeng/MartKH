@extends('layouts.app', ['title' => __('Product Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                                    <div class="col-4">
                                        <h3 class="mb-0">Products</h3>
                                    </div>
                                    <form class="col-4">
                                            <div class="form-group mb-2 mt-2">
                                                <div class="input-group input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                                    </div>
                                                    <input class="form-control" placeholder="Search" type="text">
                                                </div>
                                            </div>
                                    </form>
                                    <div class="col-4 text-right">
                                            <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary">{{ __('Add Product') }}</a>
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
                        <table class="table align-items-center table-flush table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Code') }}</th>
                                    {{-- <th scope="col">{{ __('Product ID') }}</th> --}}
                                    <th scope="col">{{ __('Image') }}</th>
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('Price') }}</th>
                                    <th scope="col">{{ __('Size') }}</th>
                                    {{-- <th scope="col">{{ __('Brand') }}</th>
                                    <th scope="col">{{ __('Country') }}</th> --}}
                                    {{-- <th scope="col">{{ __('Subcategory ID') }}</th>
                                    <th scope="col">{{ __('Stock ID') }}</th> --}}
                                    {{-- <th scope="col">{{ __('View') }}</th>
                                    <th scope="col">{{ __('Created Date') }}</th>
                                    <th scope="col">{{ __('Updated Date') }}</th> --}}
                                    {{-- <th scope="col">{{ __('Description') }}</th> --}}
                                    <th scope="col">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        {{-- <td>{{ $product->pid }}</td> --}}
                                        <td>{{ $product->code }}</td>
                                        <td><img src="{{ $product->image }}" alt="" class="img-thumbnail " style="width:100px;heigth:100px;"></td>
                                        
                                        <td>{{ $product->name }}</td>
                                        {{-- <td>{{ $product->description }}</td> --}}
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->size }}</td>
                                        {{-- <td>{{ $product->brand }}</td>
                                        <td>{{ $product->country }}</td> --}}
                                        <!-- {{-- <td>{{ $p->created_at->format('d/m/Y H:i') }}</td> --}} -->
                                        {{-- <td>{{ $product->description }}</td> --}}
                                        <td>
                                        {{-- dot button to right most --}}
                                        {{-- <td class="text-right"> --}}
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    {{-- delete fucntion --}}
                                                    {{-- @if ($product->pid != auth()->id()) --}}
                                                        {{-- <form action="{{ route('user.destroy', $user) }}" method="post"> --}}
                                                        <form action="" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            {{-- <a class="dropdown-item" href="{{ route('user.edit', $user) }}">{{ __('Edit') }}</a> --}}
                                                        <a class="dropdown-item" href="/products/{{$product->pid}}">{{ __('View') }}</a>
                                                            <a class="dropdown-item" href="">{{ __('Edit') }}</a>
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Delete') }}
                                                            </button>
                                                        </form>
                                                    {{-- @else
                                                        <a class="dropdown-item" href="{{ route('admin.profile.edit') }}">{{ __('Edit') }}</a>
                                                        <a class="dropdown-item" href="">{{ __('Edit') }}</a>
                                                    @endif --}}
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
@endsection
