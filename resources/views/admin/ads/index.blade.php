@extends('layouts.app', ['title' => __('Ads Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <h3 class="mb-0">Ads</h3>
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
                                    <a href="ads/create" class="btn btn-sm btn-primary">{{ __('Add Ads') }}</a>
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
                                    <th scope="col">{{ __('ID') }}</th>
                                    <th scope="col">{{ __('Image') }}</th>
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('Created Date') }}</th>
                                    {{-- <th scope="col">{{ __('Updated Date') }}</th> --}}
                                    {{-- <th scope="col">{{ __('Description') }}</th> --}}
                                    <th scope="col">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ads as $ad)
                                    <tr>
                                        <td>{{ $ad->id }}</td>
                                        <td><img src="{{asset( 'uploads/ads_image/' . $ad->image )}}" alt="" class="img-thumbnail " style="width:500px;height:300px;"></td>
                                        <td>{{ $ad->name }}</td>
                                        <td>{{ $ad->created_at->format('d/m/Y H:i') }}</td>
                                        {{-- <td>{{ $ad->description }}</td> --}}
                                        <td>
                                        {{-- dot button to right most --}}
                                        {{-- <td class="text-right"> --}}
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    {{-- delete fucntion --}}
                                                    {{-- @if ($ad->id != auth()->id()) --}}
                                                        {{-- <form action="{{ route('user.destroy', $user) }}" method="post"> --}}
                                                        <form action="ads/{{$ad->id}}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            {{-- <a class="dropdown-item" href="{{ route('user.edit', $user) }}">{{ __('Edit') }}</a> --}}
                                                            {{-- View --}}
                                                            {{-- <button type="button" class="dropdown-item openImageDialog" data-toggle="modal" data-target="#viewProduct" data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                                                data-code="{{ $product->code }}" data-price="{{ $product->price }}" data-brand="{{ $product->brand }}"
                                                                data-country="{{ $product->country }}" data-size="{{ $product->size }}" data-image="{{ $product->image }}"
                                                                data-description="{{ $product->description }}" data-created_at="{{ $product->created_at->format('d/m/Y H:i') }}"
                                                                data-update="{{ $product->updated_at->format('d/m/Y H:i') }}" data-subcategory_id="{{ $product->subcategory_id }}">{{ __('View') }}</button> --}}
                                                            {{-- Edit --}}
                                                            <a class="dropdown-item" href="/admin/ads/{{$ad->id}}/edit" id="edit">{{ __('Edit') }}</a>
                                                            {{-- Delete  --}}
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
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{-- <!-- {{ $users->links() }} --> --}}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    <script>
        // $(document).ready(function(){
        //     $(function() {
        //         $('#viewProduct').on("show.bs.modal", function (e) {
        //             $("#id").html($(e.relatedTarget).data('id'));
        //             $("#name").html($(e.relatedTarget).data('name'));
        //             $("#code").html($(e.relatedTarget).data('code'));
        //             $("#brand").html($(e.relatedTarget).data('brand'));
        //             $("#price").html($(e.relatedTarget).data('price'));
        //             $("#size").html($(e.relatedTarget).data('size'));
        //             $("#country").html($(e.relatedTarget).data('country'));
        //             $("#description").html($(e.relatedTarget).data('description'));
        //             $("#subcategory_id").html($(e.relatedTarget).data('subcategory_id'));
        //             $("#created_at").html($(e.relatedTarget).data('created_at'));
        //             $("#update").html($(e.relatedTarget).data('updated_at'));

        //             $('#imagesrc').attr('src',$("#image").html($(e.relatedTarget).data('image'));
        //         });
        //     });
        // });
        $(document).on("click", ".openImageDialog", function () {
            var imgsrc = $(this).data('image');
            var imgsrc_path = '/uploads/ads_image/'.concat(imgsrc);
            $('#imagesrc').attr('src',imgsrc_path);
            // console.log(imgsrc);
        });
        $('.delete-btn').click(function(e){
            e.preventDefault();
            Swal.fire({
                title: 'Warning',
                text: "Are you sure you want to delete this ads?",
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
    {{-- <div class="modal fade" id="viewProduct" tabindex="-1" role="dialog" aria-labelledby="viewProductTitle" aria-hidden="true">
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
                            <div class="row mt-3">
                                <div class="col-lg-4">
                                    <span>Updated date : </span>
                                </div>
                                <div class="col-lg-8">
                                    <span id="updated_at"></span>
                                </div>
                            </div>
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
        </div> --}}
@endsection


