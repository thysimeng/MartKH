@extends('layouts.app', ['title' => __('Product Management')])

@section('content')
    @include('layouts.headers.cards')

    @if($sidebar==1)
        <div class="container-fluid bg-dark mt--7" style="min-height:660px;">
            <div class="row">
                <div class="col">
                    <div class="card bg-dark shadow text-white border">
                        <div class="card-header bg-transparent">
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <h3 class="mb-0 text-white">Products</h3>
                                </div>
    @else
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <h3 class="mb-0">Products</h3>
                                </div>
    @endif
                                    <form class="col-4 mb-2 mt-2" method="get" action="{{ route('products.index') }}">
                                                <div class="input-group input-group-alternative">
                                                    {{-- <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                                    </div> --}}
                                                <input class="form-control" placeholder="Search" type="text" name="search" id="search" value="{{$keyword}}" style="border: 1px solid #11cdef">
                                                <span class="form-clear d-none"><i class="fas fa-times-circle">clear</i></span>
                                                <div class="input-group-append">
                                                    <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
                                                    </div>
                                            </div>
                                    </form>
                                    {{-- <div class="col-4 mb-2 mt-2">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Search" type="text" name="search" id="search">
                                            <div class="input-group-append">
                                                    <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="col-2">
                                    <span class="mb-0" id="total_records">Total data : {{$products->total()}}</span>
                                    </div>
                                    <div class="col-2 text-right">
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
                        @if($sidebar==1)
                            <table class="table align-items-center table-flush table-hover table-dark">
                        @else
                            <table class="table align-items-center table-flush table-hover">
                        @endif
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('ID') }}</th>
                                    <th scope="col">{{ __('Code') }}</th>
                                    <th scope="col">{{ __('Image') }}</th>
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('Price') }}</th>
                                    <th scope="col">{{ __('Size') }}</th>
                                    <th scope="col">{{ __('Brand') }}</th>
                                    <th scope="col">{{ __('Country') }}</th>
                                    {{-- <th scope="col">{{ __('Subcategory ID') }}</th> --}}
                                    {{-- <th scope="col">{{ __('Stock ID') }}</th> --}}
                                    {{-- <th scope="col">{{ __('View') }}</th> --}}
                                    <th scope="col">{{ __('Created Date') }}</th>
                                    {{-- <th scope="col">{{ __('Updated Date') }}</th> --}}
                                    {{-- <th scope="col">{{ __('Description') }}</th> --}}
                                    <th scope="col">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody id="products_table">
                                @foreach ($products as $product)
                                    @if($sidebar==1)
                                        <tr style="border:2px solid white;border-bottom:0;">
                                    @else
                                        <tr>
                                    @endif
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->code }}</td>
                                        <td><img src="{{asset( 'uploads/product_image/' . $product->image )}}" alt="" class="img-thumbnail " style="width:100px;heigth:100px;"></td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->size }}</td>
                                        <td>{{ $product->brand }}</td>
                                        <td>{{ $product->country }}</td>
                                        <td>{{ $product->created_at->format('d/m/Y H:i') }}</td>
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
                                                    {{-- @if ($product->id != auth()->id()) --}}
                                                        {{-- <form action="{{ route('user.destroy', $user) }}" method="post"> --}}
                                                        <form action="products/{{$product->id}}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            {{-- <a class="dropdown-item" href="{{ route('user.edit', $user) }}">{{ __('Edit') }}</a> --}}
                                                            <button type="button" class="dropdown-item openImageDialog" data-toggle="modal" data-target="#viewProduct" data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                                                data-code="{{ $product->code }}" data-price="{{ $product->price }}" data-brand="{{ $product->brand }}"
                                                                data-country="{{ $product->country }}" data-size="{{ $product->size }}" data-image="{{ $product->image }}"
                                                                data-description="{{ $product->description }}" data-created_at="{{ $product->created_at->format('d/m/Y H:i') }}"
                                                                data-update="{{ $product->updated_at->format('d/m/Y H:i') }}" data-subcategory_id="{{ $product->subcategory_id }}">{{ __('View') }}</button>
                                                            <a class="dropdown-item" href="/admin/products/{{$product->id}}/edit?page={{$products->currentPage()}}" id="edit">{{ __('Edit') }}</a>
                                                            <button class="dropdown-item delete-btn" type="submit">Delete</button>
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
                        {{-- {{ $products->links() }}  --}}
                    </div>
                    @if($sidebar==1)
                        <div class="card-footer bg-dark py-4 border">
                    @else
                        <div class="card-footer py-4">
                    @endif
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $products->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>
            $(window).on('hashchange', function() {
                if (window.location.hash) {
                    var page = window.location.hash.replace('#', '');
                    if (page == Number.NaN || page <= 0) {
                        return false;
                    } else {
                        getProducts(page);
                    }
                }
            });
            $(document).ready(function() {
                // $(document).on('click', '.pagination a', function (e) {
                //     $('.products').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="../public/images/loading.gif" />');
                //     var url = $(this).attr('href');
                //     getProducts($(this).attr('href').split('page=')[1]);
                //     e.preventDefault();
                // });
                $(document).on('click', '.pagination a', function (e) {
                    getProducts($(this).attr('href').split('page=')[1]);
                    e.preventDefault();
                });
            });
            function getproducts(page) {
                $.ajax({
                    url : '?page=' + page,
                    type : "get",
                    dataType: 'json',
                    data:{
                        search: $('#search').val()
                    },
                }).done(function (data) {
                    $('.products').html(data);
                    location.hash = page;
                }).fail(function (msg) {
                    alert('page can\'t be load');
                });
            }
        </script>
        <script>
            //view modal
            $(document).ready(function(){
                $(function() {
                    $('#viewProduct').on("show.bs.modal", function (e) {
                        $("#id").html($(e.relatedTarget).data('id'));
                        $("#name").html($(e.relatedTarget).data('name'));
                        $("#code").html($(e.relatedTarget).data('code'));
                        $("#brand").html($(e.relatedTarget).data('brand'));
                        $("#price").html($(e.relatedTarget).data('price'));
                        $("#size").html($(e.relatedTarget).data('size'));
                        $("#country").html($(e.relatedTarget).data('country'));
                        $("#description").html($(e.relatedTarget).data('description'));
                        $("#subcategory_id").html($(e.relatedTarget).data('subcategory_id'));
                        $("#created_at").html($(e.relatedTarget).data('created_at'));
                        // $("#update").html($(e.relatedTarget).data('updated_at'));
                        // $('#imagesrc').attr('src',$("#image").html($(e.relatedTarget).data('image'));
                    });
                });
            });
            $(document).on("click", ".openImageDialog", function () {
                var imgsrc = $(this).data('image');
                var imgsrc_path = '/uploads/product_image/'.concat(imgsrc);
                $('#imagesrc').attr('src',imgsrc_path);
                // console.log(imgsrc);
            });
            $('.delete-btn').click(function(e){
                e.preventDefault();
                Swal.fire({
                    title: 'Warning',
                    text: "Are you sure you want to delete this product?",
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
            @include('layouts.footers.auth')
            </div>
        </div>
    <div class="modal fade" id="viewProduct" tabindex="-1" role="dialog" aria-labelledby="viewProductTitle" aria-hidden="true">
            <div class="modal-dialog modal-xxl modal-dialog-centered" role="document">
              <div class="modal-content">
                @if($gradientColor===NULL)
                <div class="modal-header" style="background:{{$basicColor}}">
                @else
                <div class="modal-header" style="background:{{$gradientColor}}">
                @endif
                <h3 class="modal-title text-white">Product Information :</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                  </button>
                </div>
                @if($sidebar==1)
                    <div class="modal-body text-white" style="background: #000;">
                @else
                    <div class="modal-body">
                @endif
                    <div class="row">
                        <div class="col-lg-6">
                            <img id="imagesrc" style="width:auto;"/>
                        </div>
                        <div class="col-lg-6">
                            <div class="row mt-3">
                                <div class="col-lg-4">
                                    <span>Name : </span>
                                </div>
                                <div class="col-lg-8">
                                    <span id="name"></span>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-4">
                                    <span>Code : </span>
                                </div>
                                <div class="col-lg-8">
                                    <span id="code"></span>
                                </div>
                            </div>
                            <div class="row mt-3">
                                    <div class="col-lg-4">
                                        <span>Price : </span>
                                    </div>
                                    <div class="col-lg-8">
                                        <span id="price"></span>
                                    </div>
                                </div>
                            <div class="row mt-3">
                                <div class="col-lg-4">
                                    <span>Size : </span>
                                </div>
                                <div class="col-lg-8">
                                    <span id="size"></span>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-4">
                                    <span>Brand : </span>
                                </div>
                                <div class="col-lg-8">
                                    <span id="brand"></span>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-4">
                                    <span>Country : </span>
                                </div>
                                <div class="col-lg-8">
                                    <span id="country"></span>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-4">
                                    <span>Created date : </span>
                                </div>
                                <div class="col-lg-8">
                                    <span id="created_at"></span>
                                </div>
                            </div>
                            {{-- <div class="row mt-3">
                                <div class="col-lg-4">
                                    <span>Updated date : </span>
                                </div>
                                <div class="col-lg-8">
                                    <span id="updated_at"></span>
                                </div>
                            </div> --}}
                            <div class="row mt-3">
                                <div class="col-lg-4">
                                    <span>Description : </span>
                                </div>
                                <div class="col-lg-8">
                                    @if($sidebar==1)
                                        <span><h5 id="description" class="text-white"></h5></span>
                                    @else
                                        <span><h5 id="description"></h5></span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


