@extends('layouts.app', ['title' => __('Sub-Category Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow"> 
                        <div class="card-header border-0">
                                <ul class="nav nav-tabs card-header-tabs" id="bologna-list" role="tablist">
                                            <form class="col-4" action="/admin/create_sub_category/search" method="get" role="search">
                                                {{ csrf_field() }}
                                                    <div class="form-group mb-4">
                                                        <div class="input-group input-group-alternative">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                                            </div>
                                                            <input class="form-control" placeholder="Search" type="text" name="search">
                                                            <span class="form-group-btn">
                                                                <button  type="submit" class="btn btn-primary">Search</button>
                                                            </span>
                                                        </div>
                                                    </div>
                                            </form>
                                                
                                            <div class="col-4 text-left">
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
                                                                        <option @if(old('category_id') == $sub_item->cid) selected @endif value="{{$sub_item->cid}}">{{$sub_item->categories_name}}</option>
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
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Sub Category ID') }}</th>
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('Category') }}</th>
                                    <th scope="col">{{ __('Create Date') }}</th>
                                    <th scope="col">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach($sub_categories_data as $item)
                                    <tr>
                                        <td>{{$item->sid}}</td>
                                        <td>{{$item->subcategory_name}}</td>
                                        <td>{{$item->categories_name}}</td>
                                       
                                        <td>{{$item->created_at}}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div data-id="" class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" data-toggle="modal" data-target="#editModalCenter" href="">{{ __('Edit') }}</a>
                                            
                                                    {{-- <a class="dropdown-item" href="">{{ __('View') }}</a> --}}
                                                    <a class="dropdown-item" href="/admin/sub_category/delete/{{ $item->sid }}">{{ __('Delete') }}</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <form class="form-horizontal" action="" enctype="multipart/form-data" method="post">
                                            @csrf
                                            <div class="modal fade" id="editModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalCenterTitle">Add Category</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="text" class="form-control" name="category" id="input_category" value="" required placeholder="">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </form>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                            <div class="wrapper-pagination">
                                {{-- {{$categories_data->appends($queryParams)->render()}} --}}
                            </div>
                        </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection

<script>

    function edit(clickEdit){
        var id = $(clickEdit).parent().attr("data-id");
        document.location.href='/edit/'+id;

    }

</script>