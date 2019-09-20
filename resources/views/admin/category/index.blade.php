@extends('layouts.app', ['title' => __('Category Management')])

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
                                <ul class="nav nav-tabs card-header-tabs" id="bologna-list" role="tablist">
                                            <div class="col-2 text-left">
                                                <button type="button" class="btn " ><a href="/category/sub-category">{{ __('View Sub Category') }}</a></button>
                                            </div>

                                            <form class="col-4" action="/search" method="get" role="search">
                                                {{ csrf_field() }}
                                                    <div class="form-group mb-4">
                                                        <div class="input-group input-group-alternative">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                                            </div>
                                                            <input class="form-control" placeholder="Search" type="text" name="search">
                                                            {{-- <span class="form-group-btn">
                                                                <button  type="submit" class="btn btn-primary">Search</button>
                                                            </span> --}}
                                                        </div>
                                                    </div>
                                            </form>

                                            <div class="col-6 text-right">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">{{ __('Add Category') }}</button>
                                            </div>

                                            <form class="form-horizontal" action="/create_category" enctype="multipart/form-data" method="post">
                                                @csrf
                                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Add Category</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <input type="text" class="form-control" name="category" id="input_category" value="" required placeholder="category">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                </ul>
                            </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Category ID') }}</th>
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('Create Date') }}</th>
                                    <th scope="col">{{ __('Update Date') }}</th>
                                    <th scope="col">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach($categories_data as $item)

                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->categories_name}}</td>
                                        <td>{{$item->created_at}}</td>
                                        <td>{{$item->updated_at}}</td>
                                        <td class="">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div data-id="{{$item->id}}"  class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a onclick="edit({{$item->id}}, '{{$item->categories_name}}')"  class="dropdown-item" data-toggle="modal" data-target="#editModalCenter" href="">{{ __('Edit') }}</a>

                                                    {{-- <a class="dropdown-item" href="">{{ __('View') }}</a> --}}
                                                    <a class="dropdown-item" href="/delete/{{ $item->id }}">{{ __('Delete') }}</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="editModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <form action="/edit" method="post">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalCenterTitle">Edit Category</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <input type="hidden" name="category_id" value="" >
                                                        @csrf
                                                        <div class="modal-body">
                                                            <input type="text" class="form-control" name="category_name" value="" required placeholder="">
                                                        </div>
                                                        <div  class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button onclick="saveEdit()"  class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                        </form>
                                    </div>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-7">
                            <div class="d-flex justify-content-end">
                                {{$categories_data->appends($queryParams)->render()}}
                            </div>
                        </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection

<script>
    var id = null;

    function edit(id,name) {
        document.querySelector('[name="category_id"]').setAttribute('value', id);
        document.querySelector('[name="category_name"]').setAttribute('value', name);
    }

</script>
