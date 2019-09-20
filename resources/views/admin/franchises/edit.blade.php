@extends('layouts.app', ['title' => __('Franchise Management')])

@section('content')
    @include('admin.users.partials.header', ['title' => __('Edit Franchise')])

    @if($sidebar==0)
        <div class="container-fluid mt--7">
    @elseif($sidebar==1)
        <div class="container-fluid bg-dark mt--7">
    @endif
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
                        <form method="post" action="{{ route('franchises.update', $franchise) }}" autocomplete="off">
                            @csrf
                            @method('post')

                            <h6 class="heading-small text-muted mb-4">{{ __('Franchise information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('franchise_name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-franchise-name">{{ __('Name') }}</label>
                                    <input type="text" name="franchise_name" id="input-franchise-name" class="form-control form-control-alternative{{ $errors->has('franchise_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('franchise_name', $franchise->franchise_name) }}" required autofocus>

                                    @if ($errors->has('franchise_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('franchise_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-address">{{ __('Address') }}</label>
                                    <input type="text" name="address" id="input-address" class="form-control form-control-alternative{{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="{{ __('Address') }}" value="{{ old('address', $franchise->address) }}" required>

                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
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
