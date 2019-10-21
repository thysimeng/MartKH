@extends('layouts.app', ['title' => __('Sub-Category Management')])

@section('content')
    @include('layouts.headers.cards')

    @if($sidebar==1)
        <div class="container-fluid bg-dark mt--7">
            <div class="row">
                    <div class="col">
                        <div class="card bg-dark shadow text-white border">
                            <div class="card-header border-0 bg-transparent">
                                <ul class="nav nav-tabs card-header-tabs" id="bologna-list" role="tablist">
                                    <div class="col-4 text-left">
                                        <button type="button" class="btn " ><a href="/category" class="text-white">{{ __('Back') }}</a></button>
                                    </div>
    @else
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <ul class="nav nav-tabs card-header-tabs" id="bologna-list" role="tablist">
                                <div class="col-4 text-left">
                                    <button type="button" class="btn " ><a href="/category">{{ __('Back') }}</a></button>
                                </div>
    @endif
                            <form class="col-4" method="get" action="/admin/create_sub_category/search" autocomplete="off">
                                {{ csrf_field() }}
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
                            {{-- <form class="col-4" action="/admin/create_sub_category/search" method="get" role="search">
                                {{ csrf_field() }}
                                    <div class="form-group mb-4">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Search" type="text" name="search">
                                        </div>
                                    </div>
                            </form> --}}

                            <div class="col-4 text-right">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">{{ __('Add Sub Category') }}</button>

                            </div>
                            <form class="form-horizontal" action="/admin/create_sub_category" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Add Sub Category</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <label for="exampleFormControlSelect1">Category select</label>

                                                <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                                                    @foreach($categories_data as $sub_item)
                                                        <option @if(old('category_id') == $sub_item->id) selected @endif value="{{$sub_item->id}}">{{$sub_item->categories_name}}</option>
                                                    @endforeach
                                                </select>
                                                </div>
                                            <div class="modal-body">
                                                <input type="text" class="form-control" name="sub_category" id="" value="" required placeholder="sub category">
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
                        @if($sidebar==1)
                            <table class="table align-items-center table-flush table-hover table-dark">
                        @else
                            <table class="table align-items-center table-flush table-hover">
                        @endif
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Sub Category ID') }}</th>
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('Category') }}</th>
                                    <th scope="col">{{ __('Create Date') }}</th>
                                    <th scope="col">{{ __('Update Date') }}</th>
                                    <th scope="col">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach($sub_categories_data as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->subcategory_name}}</td>
                                        <td>{{$item->category->categories_name}}</td>
                                        <td>{{$item->created_at}}</td>
                                        <td>{{$item->updated_at}}</td>
                                        <td class="">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div data-id="{{$item->id}}" class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a onclick="edit({{$item->id}}, '{{$item->subcategory_name}}')" class="dropdown-item" data-toggle="modal" data-target="#editModalCenter" href="">{{ __('Edit') }}</a>

                                                    {{-- <a class="dropdown-item" href="">{{ __('View') }}</a> --}}
                                                    <a onclick="delet({{$item->id}})" class="dropdown-item" data-toggle="modal" data-target="#deleteModalCenter" href="">{{ __('Delete') }}</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    {{-- Delete Form --}}
                                    <div class="modal fade" id="deleteModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <form action="{{ route('admin.category.delete_sub_category') }}" method="post">
                                                @csrf
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalCenterTitle">Delete Stock</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="delete_sub_id" value="" >
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit"  class="btn btn-primary">Yes</button>
                                                        </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    @if($sidebar==1)
                                        <div class="modal fade" id="editModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <form action="/admin/sub_category/edit" method="post">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content bg-dark">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-white" id="exampleModalCenterTitle">Edit Sub Category</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true" class="text-white">&times;</span>
                                                            </button>
                                                        </div>
                                                        <input type="hidden" name="sub_category_id" value="" >
                                                        @csrf
                                                        <div class="modal-body">
                                                            <input type="text" class="form-control" name="sub_category_name" value="" required placeholder="">
                                                        </div>
                                                        <div  class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button onclick="saveEdit()"  class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    @else
                                        <div class="modal fade" id="editModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <form action="/admin/sub_category/edit" method="post">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalCenterTitle">Edit Sub Category</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <input type="hidden" name="sub_category_id" value="" >
                                                        @csrf
                                                        <div class="modal-body">
                                                            <input type="text" class="form-control" name="sub_category_name" value="" required placeholder="">
                                                        </div>
                                                        <div  class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button onclick="saveEdit()"  class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    @endif
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-7">
                            <div class="d-flex justify-content-end">
                                {{$sub_categories_data->appends($queryParams)->render()}}
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
        document.querySelector('[name="sub_category_id"]').setAttribute('value', id);
        document.querySelector('[name="sub_category_name"]').setAttribute('value', name);
    }

</script>

    <script>
        var id = null;

        function delet(id) {
            document.querySelector('[name="delete_sub_id"]').setAttribute('value', id);
        }

    </script>
