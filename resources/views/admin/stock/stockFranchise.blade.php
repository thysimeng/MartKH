@extends('layouts.app', ['title' => __('Franchise Stock')])

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
                                    <h3 class="mb-0 text-white">Franchise Stock</h3>
                                </div>
    @else
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <h3 class="mb-0">Franchise Stock</h3>
                                </div>
    @endif
                                    <form class="col-4" method="get" action="{{route('admin.franchiseStockSearch')}}">
                                        <div class="input-group input-group-alternative">
                                                <input class="form-control" placeholder="Search" type="text" name="search" id="search" value="" style="border: 1px solid #11cdef">
                                                <span class="form-clear d-none"><i class="fas fa-times-circle">clear</i></span>
                                                <div class="input-group-append">
                                                    <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
                                                </div>
                                        </div>
                                    </form>

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
                                    <th scope="col">{{ __('Amount') }}</th>
                                    <th scope="col">{{ __('Product Name') }}</th>
                                    <th scope="col">{{ __('price') }}</th>
                                    <th scope="col">{{ __('Franchise Name') }}</th>
                                    <th scope="col">{{ __('Created Date') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stock_franchises as $stock_franchise)
                                    <tr>
                                        <td>{{ $stock_franchise->sfid }}</td>
                                        <td>{{ $stock_franchise->code }}</td>
                                        <td><img src="{{asset( 'uploads/product_image/' . $stock_franchise->image )}}" alt="" class="img-thumbnail " style="width:50px;heigth:50px;"></td>
                                        <td>{{ $stock_franchise->amount }}</td>
                                        <td>{{ $stock_franchise->name }}</td>
                                        <td>{{ $stock_franchise->price }}</td>
                                        <td>{{ $stock_franchise->franchise_name }}</td>
                                        <td>{{ Carbon\Carbon::parse($stock_franchise->sf_created)->format('d/m/Y H:i') }}</td>
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
                            {{ $stock_franchises->links() }}
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
    <div class="modal fade" id="viewProduct" tabindex="-1" role="dialog" aria-labelledby="viewProductTitle" aria-hidden="true">
            <div class="modal-dialog modal-xxl modal-dialog-centered " role="document">
              <div class="modal-content">
                <div class="modal-header red-brown">
                <h3 class="modal-title text-white">Product Information :</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
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
                                    <span><h5 id="description"></h5></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
@endsection


