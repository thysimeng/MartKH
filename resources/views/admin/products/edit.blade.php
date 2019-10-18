@extends('layouts.app', ['title' => __('Product Management')])

@section('content')
    @include('admin.users.partials.header', ['title' => __('Edit Product')])

    @if($sidebar==1)
        <div class="container-fluid bg-dark mt--7">
            <div class="row">
                <div class="col-xl-12 order-xl-1">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-dark border-0">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h3 class="mb-0 text-white">{{ __('Product Management') }}</h3>
                                    </div>
                                    <div class="col-4 text-right">
                                            <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                                        </div>
                                    </div>
                                </div>
                            <div class="card-body bg-dark border">
    @else
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-xl-12 order-xl-1">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('Product Management') }}</h3>
                                </div>
                                <div class="col-4 text-right">
                                        <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                                    </div>
                                </div>
                            </div>
                        <div class="card-body">
    @endif
                        {{-- <form method="post" action="{{ route('products.update', $product) }}" autocomplete="off"> --}}
                        {{-- <form method="post" action="{{ route('products.update',$product->id) }}" autocomplete="off" enctype="multipart/form-data"> --}}
                        <form method="post" action="{{ route('products.update',$product->id) }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            @if($sidebar==1)
                                <h6 class="heading-small text-white text-muted mb-4">{{ __('products information') }}</h6>
                            @else
                                <h6 class="heading-small text-muted mb-4">{{ __('products information') }}</h6>
                            @endif
                            <div class="pl-lg-4">
                                {{-- <div class="form-group{{ $errors->has('Image') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-image">{{ __('Image') }}</label>
                                <input type="text" name="image" id="input-image" class="form-control form-control-alternative{{ $errors->has('image') ? ' is-invalid' : '' }}" placeholder="{{ __('Image URL') }}" value="{{$product->image}}" required autofocus>

                                    @if ($errors->has('image'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                </div> --}}
                                {{-- get url parameter --}}
                                <input type="hidden" value="{{app('request')->input('page')}}" name="page">
                                {{-- upload img --}}
                                <div class="form-group">
                                    @if($sidebar==1)
                                        <label class="form-control-label text-white" for="input-code">{{ __('Upload Image') }}</label>
                                    @else
                                        <label class="form-control-label" for="input-code">{{ __('Upload Image') }}</label>
                                    @endif
                                    <input type="hidden" id="imgDB" name="imgDB" value="{{$product->image}}">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-default btn-file">
                                                Browse… <input type="file" id="imgInp" name="image">
                                            </span>
                                            <div>{{$errors->first('image')}}</div>
                                        </span>
                                        <input type="text" class="form-control" readonly>
                                    </div>
                                    <br>
                                    <img src="{{asset( 'uploads/product_image/' . $product->image )}}" id='img-upload' class="img-thumbnail rounded mx-auto d-block"/>
                                </div>
                                {{-- code and name input --}}
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12">
                                         <div class="form-group{{ $errors->has('code') ? ' has-danger' : '' }}">
                                            @if($sidebar==1)
                                                <label class="form-control-label text-white" for="input-code">{{ __('Code') }}</label>
                                            @else
                                                <label class="form-control-label" for="input-code">{{ __('Code') }}</label>
                                            @endif
                                            <input type="text" name="code" id="input-code" class="form-control form-control-alternative{{ $errors->has('code') ? ' is-invalid' : '' }}" placeholder="{{ __('Code') }}" value="{{$product->code}}" autofocus>

                                            @if ($errors->has('code'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('code') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            @if($sidebar==1)
                                                <label class="form-control-label text-white" for="input-name">{{ __('Name') }}</label>
                                            @else
                                                <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                            @endif
                                            <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{$product->name}}" autofocus>

                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    {{-- price input --}}
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                                            @if($sidebar==1)
                                                <label class="form-control-label text-white" for="input-price">{{ __('Price') }}</label>
                                            @else
                                                <label class="form-control-label" for="input-price">{{ __('Price') }}</label>
                                            @endif
                                            <input type="text" name="price" id="input-price" class="form-control form-control-alternative{{ $errors->has('price') ? ' is-invalid' : '' }}" placeholder="{{ __('Price') }}"  value="{{$product->price}}" required autofocus>

                                            @if ($errors->has('price'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('price') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- size input --}}
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="form-group{{ $errors->has('size') ? ' has-danger' : '' }}">
                                            @if($sidebar==1)
                                                <label class="form-control-label text-white" for="input-size">{{ __('Size') }}</label>
                                            @else
                                                <label class="form-control-label" for="input-size">{{ __('Size') }}</label>
                                            @endif
                                            <input type="text" name="size" id="input-size" class="form-control form-control-alternative{{ $errors->has('size') ? ' is-invalid' : '' }}" placeholder="{{ __('Size') }}"  value="{{$product->size}}" required autofocus>

                                            @if ($errors->has('size'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('size') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    {{-- brand input --}}
                                    <div class="col-lg-6 col-sm-12">
                                         <div class="form-group{{ $errors->has('brand') ? ' has-danger' : '' }}">
                                            @if($sidebar==1)
                                                <label class="form-control-label text-white" for="input-brand">{{ __('Brand') }}</label>
                                            @else
                                                <label class="form-control-label" for="input-brand">{{ __('Brand') }}</label>
                                            @endif
                                            <input type="text" name="brand" id="input-brand" class="form-control form-control-alternative{{ $errors->has('brand') ? ' is-invalid' : '' }}" placeholder="{{ __('Brand') }}" value="{{$product->brand}}" autofocus>

                                            @if ($errors->has('brand'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('brand') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- country input --}}
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="form-group{{ $errors->has('country') ? ' has-danger' : '' }}">
                                            @if($sidebar==1)
                                                <label class="form-control-label text-white" for="input-country">{{ __('Country') }}</label>
                                            @else
                                                <label class="form-control-label" for="input-country">{{ __('Country') }}</label>
                                            @endif
                                            <input type="text" name="country" id="input-country" class="form-control form-control-alternative{{ $errors->has('country') ? ' is-invalid' : '' }}" placeholder="{{ __('Country') }}" value="{{$product->country}}" autofocus>

                                            @if ($errors->has('country'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('country') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                {{-- subcategory input --}}
                                <div class="form-group{{ $errors->has('subcategory_id') ? ' has-danger' : '' }}">
                                    @if($sidebar==1)
                                        <label class="form-control-label text-white" for="input-subcategory_id">{{ __('Subcategory') }}</label>
                                    @else
                                        <label class="form-control-label" for="input-subcategory_id">{{ __('Subcategory') }}</label>
                                    @endif
                                    <select class="form-control" name="subcategory_id" id="subcategory_id" required>
                                        @if(count($subcategories)>0)
                                            @foreach ($subcategories as $subcategory)
                                                <option value="{{$subcategory->id}}"
                                                {{ ( $product['subcategory_id'] == $subcategory['id'] )? 'selected' : '' }}
                                                >{{ $subcategory->subcategory_name}} </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                    @if($sidebar==1)
                                        <label class="form-control-label text-white" for="input-description">{{ __('Description') }}</label>
                                    @else
                                        <label class="form-control-label" for="input-description">{{ __('Description') }}</label>
                                    @endif
                                        <textarea class="form-control form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('Description') }}" id="input-description" rows="4" name="description" required autofocus>{{$product->description}}</textarea>
                                        @if ($errors->has('description'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready( function() {
                $(document).on('change', '.btn-file :file', function() {
                var input = $(this),
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [label]);
                });
                $('.btn-file :file').on('fileselect', function(event, label) {

                    var input = $(this).parents('.input-group').find(':text'),
                        log = label;

                    if( input.length ) {
                        input.val(log);
                    } else {
                        if( log ) alert(log);
                    }

                });
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $('#img-upload').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(input.files[0]);
                    }
                }
                $("#imgInp").change(function(){
                    readURL(this);
                });
            });
        </script>
        @include('layouts.footers.auth')
    </div>
@endsection
