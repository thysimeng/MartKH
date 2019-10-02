@extends('layouts.app', ['title' => __('Franchise Management')])

@section('content')
    @include('admin.users.partials.header', ['title' => __('Add Franchise')])

    @if($sidebar==1)
        <div class="container-fluid bg-dark mt--7">
            <div class="row">
                <div class="col-xl-12 order-xl-1">
                    <div class="card bg-dark shadow border">
                        <div class="card-header bg-transparent border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0 text-white">{{ __('Franchise Management') }}</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{ route('franchises.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
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
                                    <h3 class="mb-0">{{ __('Franchise Management') }}</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{ route('franchises.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
    @endif
                        <form method="post" action="{{ route('franchises.store') }}" autocomplete="off">
                            @csrf
                            @if($sidebar==1)
                                <h6 class="heading-small text-muted mb-4 text-white">{{ __('Franchise information') }}</h6>
                            @else
                                <h6 class="heading-small text-muted mb-4">{{ __('Franchise information') }}</h6>
                            @endif
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('franchise_name') ? ' has-danger' : '' }}">
                                    @if($sidebar==1)
                                        <label class="form-control-label text-white" for="input_franchise_name">{{ __('Name') }}</label>
                                    @else
                                        <label class="form-control-label" for="input_franchise_name">{{ __('Name') }}</label>
                                    @endif
                                    <input type="text" name="franchise_name" id="input_franchise_name" class="form-control form-control-alternative{{ $errors->has('franchise_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('franchise_name') }}" required autofocus>

                                    @if ($errors->has('franchise_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('franchise_name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                                    @if($sidebar==1)
                                        <label class="form-control-label text-white" for="input-address">{{ __('Address') }}</label>
                                    @else
                                        <label class="form-control-label" for="input-address">{{ __('Address') }}</label>
                                    @endif
                                    <input type="text" name="address" id="input-address" class="form-control form-control-alternative{{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="{{ __('Address') }}" value="{{ old('address') }}" required autofocus>

                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <!-- <div class="form-group{{ $errors->has('lat') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-lat">{{ __('Latitude') }}</label>
                                    <input type="text" name="lat" id="input-lat" class="form-control form-control-alternative{{ $errors->has('lat') ? ' is-invalid' : '' }}" placeholder="{{ __('Latitude') }}" value="{{ old('lat') }}">

                                    @if ($errors->has('lat'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('lat') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('lng') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-lng">{{ __('Longitude') }}</label>
                                    <input type="text" name="lng" id="input-lng" class="form-control form-control-alternative{{ $errors->has('lng') ? ' is-invalid' : '' }}" placeholder="{{ __('Longitude') }}" value="{{ old('lng') }}">

                                    @if ($errors->has('lng'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('lng') }}</strong>
                                        </span>
                                    @endif
                                </div> -->

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
