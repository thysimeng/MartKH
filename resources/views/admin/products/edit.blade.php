@extends('layouts.app', ['title' => __('Product Management')])

@section('content')
    @include('admin.users.partials.header', ['title' => __('Edit Product')])   

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
                        {{-- <form method="post" action="{{ route('products.update', $product) }}" autocomplete="off"> --}}
                        <form method="post" action="{{ route('products.update',$product->pid) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('products information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('Image') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-image">{{ __('Image') }}</label>
                                <input type="text" name="image" id="input-image" class="form-control form-control-alternative{{ $errors->has('image') ? ' is-invalid' : '' }}" placeholder="{{ __('Image URL') }}" value="{{$product->image}}" required autofocus>

                                    @if ($errors->has('image'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                {{-- code and name input --}}
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12">
                                         <div class="form-group{{ $errors->has('code') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-code">{{ __('Code') }}</label>
                                            <input type="text" name="code" id="input-code" class="form-control form-control-alternative{{ $errors->has('code') ? ' is-invalid' : '' }}" placeholder="{{ __('Code') }}" value="{{$product->code}}" required autofocus>

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
                                            <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{$product->name}}" required autofocus>

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
                                            <label class="form-control-label" for="input-size">{{ __('Size') }}</label>
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
                                            <label class="form-control-label" for="input-brand">{{ __('Brand') }}</label>
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
                                            <label class="form-control-label" for="input-country">{{ __('Country') }}</label>
                                            <input type="text" name="country" id="input-country" class="form-control form-control-alternative{{ $errors->has('country') ? ' is-invalid' : '' }}" placeholder="{{ __('Country') }}" value="{{$product->country}}" autofocus>

                                            @if ($errors->has('country'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('country') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                {{-- category input --}}
                                <div class="form-group{{ $errors->has('category_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-category_id">{{ __('Category') }}</label>
                                    <select class="form-control" name="category_id" id="category_id" required>
                                        {{-- @if(count($categories)>0)
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}"
                                                >{{ $category->category}} </option>
                                            @endforeach
                                        @endif --}}
                                        <option value="1">Energy Drink</option>
                                        <option value="2">Soft Drink</option>
                                        <option value="2">Coffee</option>
                                    </select>
                                </div>
                                <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-description">{{ __('Description') }}</label>
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
        
        @include('layouts.footers.auth')
    </div>
@endsection