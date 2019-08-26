@extends('layouts.app', ['title' => __('Product Management')])

@section('content')
    @include('admin.users.partials.header', ['title' => __('Add Product')])

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
                        <form method="post" action="{{ route('products.store') }}" autocomplete="off" enctype="multipart/form-data">
                        {{-- <form method="post" action="{{ route('product.store') }}" autocomplete="off"> --}}
                            @csrf
                            <h6 class="heading-small text-muted mb-4">{{ __('Product information') }}</h6>
                            <div class="pl-lg-4">
                                {{-- upload img --}}
                                <div class="form-group">
                                    <label class="form-control-label" for="input-code">{{ __('Upload Image') }}</label>
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
                                    <img id='img-upload' class="img-thumbnail rounded mx-auto d-block"/>
                                </div>
                                {{-- code and name input --}}
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12">
                                         <div class="form-group{{ $errors->has('code') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-code">{{ __('Code') }}</label>
                                            <input type="text" name="code" id="input-code" class="form-control form-control-alternative{{ $errors->has('code') ? ' is-invalid' : '' }}" placeholder="{{ __('Code') }}" required autofocus>

                                            @if ($errors->has('code'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('code') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                            <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" required autofocus>

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
                                            <label class="form-control-label" for="input-price">{{ __('Price') }}</label>
                                            <input type="text" name="price" id="input-price" class="form-control form-control-alternative{{ $errors->has('price') ? ' is-invalid' : '' }}" placeholder="{{ __('Price') }}" required autofocus>

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
                                            <label class="form-control-label" for="input-size">{{ __('Size') }}</label>
                                            <input type="text" name="size" id="input-size" class="form-control form-control-alternative{{ $errors->has('size') ? ' is-invalid' : '' }}" placeholder="{{ __('Size') }}" required autofocus>

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
                                            <label class="form-control-label" for="input-brand">{{ __('Brand') }}</label>
                                            <input type="text" name="brand" id="input-brand" class="form-control form-control-alternative{{ $errors->has('brand') ? ' is-invalid' : '' }}" placeholder="{{ __('Brand') }}" autofocus>

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
                                            <label class="form-control-label" for="input-country">{{ __('Country') }}</label>
                                            <input type="text" name="country" id="input-country" class="form-control form-control-alternative{{ $errors->has('country') ? ' is-invalid' : '' }}" placeholder="{{ __('Country') }}" autofocus>

                                            @if ($errors->has('country'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('country') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                {{-- category input --}}
                                <div class="form-group{{ $errors->has('subcategory_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-subcategory_id">{{ __('subcategory') }}</label>
                                    <select class="form-control" name="subcategory_id" id="subcategory_id" required>
                                        @if(count($subcategories)>0)   
                                        @foreach ($subcategories as $subcategory)
                                            <option value="{{$subcategory->sid}}" 
                                            >{{ $subcategory->subcategory_name}} </option>               
                                        @endforeach  
                                    @endif
                                    </select>
                                </div>
                                <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-description">{{ __('Description') }}</label>
                                        <textarea class="form-control form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('Description') }}" id="input-description" rows="4" name="description" required autofocus></textarea>
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
