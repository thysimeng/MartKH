{{-- @extends('layouts.app', ['class' => 'bg-default']) --}}

{{-- @section('content')
    @include('layouts.headers.guest') --}}
    <style>
        .custom-control-label::before,
        .custom-control-label::after {
        width: 0.75rem !important;
        height: 0.75rem !important;
        border: 1px solid rgb(211,211,211);
        border-radius: 5px;
        margin-left:10px;
        /* background-color: #f7931e; */
        }
        input[type=submit]{
            background:#f7931e;
            padding:10px 20px 40px;
            width: 50%;
        }
        .custom-control-input:checked ~ .custom-control-label::before {
            color: #fff;
            border-color: #f7931e !important;
            background-color: #f7931e !important;
        }
    </style>
@extends('layouts.users')
@section('contents')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10">
                {{-- <div class="card bg-secondary shadow border-0"> --}}
                <div class="card border-0">
                    <div class="card-header bg-gradient-red pb-5">
                        <div class="text-muted text-center mt-2 mb-3"><h4 class="text-white">{{ __('Sign in with') }}</h4></div>
                        <div class="btn-wrapper text-center">
                            <a href="{{route('redirectToProvider','facebook')}}" class="btn btn-neutral btn-icon" style="background:#039BE5;">
                                <span class="btn-inner--icon" ><img src="{{ asset('argon') }}/img/icons/common/facebook.svg"></span>
                                <span class="btn-inner--text text-white">{{ __('Facebook') }}</span>
                            </a>
                            <a href="{{route('redirectToProvider','google')}}" class="btn btn-neutral btn-icon">
                                <span class="btn-inner--icon"><img src="{{ asset('argon') }}/img/icons/common/google.svg"></span>
                                <span class="btn-inner--text">{{ __('Google') }}</span>
                            </a>
                        </div>
                        {{-- <br>
                        <div class="btn-wrapper text-center">
                                <a href="#" class="btn btn-neutral btn-icon">
                                    <span class="btn-inner--icon"><img src="{{ asset('argon') }}/img/icons/common/github.svg"></span>
                                    <span class="btn-inner--text">{{ __('Github') }}</span>
                                </a>
                                <a href="{{route('redirectToGoogle')}}" class="btn btn-neutral btn-icon">
                                    <span class="btn-inner--icon"><img src="{{ asset('argon') }}/img/icons/common/google.svg"></span>
                                    <span class="btn-inner--text">{{ __('Google') }}</span>
                                </a>
                            </div> --}}
                    </div>
                    <div class="card-body px-lg-5 py-lg-5" style="border:2px solid #f7931e;border-radius:5px;border-top:transparent;">
                        <div class="text-center mb-4">
                            {{-- <span> --}}
                                <a href="{{ route('register') }}">{{ __('Create new account') }}</a>
                                <br>
                                <span>{{ __('OR Sign in with these credentials:') }}</span>
                            {{-- </span> --}}
                            <br>
                            {{-- <small>
                                {{ __('Username') }} <strong>admin@argon.com</strong>
                                {{ __('Password') }} <strong>secret</strong>
                            </small> --}}
                        </div>
                        <form role="form" method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    {{-- <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" value="admin@argon.com" required autofocus> --}}
                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" style="font-size:14px !important;" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" required autofocus>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" style="font-size:14px !important;" name="password" placeholder="{{ __('Password') }}" type="password" required>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="custom-control custom-control-alternative custom-checkbox">
                                <input class="custom-control-input" name="remember" id="customCheckLogin" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="customCheckLogin" >
                                    <small>{{ __('Remember me') }}</small>
                                </label>
                            </div>
                            <div class="text-center">
                                <input type="submit" class="btn my-4 text-white" value="Sign in">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mt-3 mb-3">
                    <div class="col-6">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                                <span>{{ __('Forgot password?') }}</span>
                            </a>
                        @endif
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{ route('register') }}" >
                            <span>{{ __('Create new account') }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- @endsection --}}
@endsection
