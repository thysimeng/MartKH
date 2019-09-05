{{-- @extends('layouts.app', ['class' => 'bg-default'])

@section('content')
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
            .custom-control-input:checked ~ .custom-control-label::before {
                color: #fff;
                border-color: #f7931e !important;
                background-color: #f7931e !important;
            }
            .invalid-feedback {
                font-size: 14px !important;
            }
        </style>
@extends('layouts.users')
@section('contents')
    <div class="container mt-4">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10">
                <div class="card border-0">
                    <div class="card-header bg-gradient-red pb-5">
                        <div class="text-muted text-center mt-2 mb-4"><h4 class="text-white">{{ __('Sign up with') }}</h4></div>
                        <div class="text-center">
                            <a href="#" class="btn btn-neutral btn-icon mr-4">
                                <span class="btn-inner--icon"><img src="{{ asset('argon') }}/img/icons/common/github.svg"></span>
                                <span class="btn-inner--text">{{ __('Github') }}</span>
                            </a>
                            <a href="#" class="btn btn-neutral btn-icon">
                                <span class="btn-inner--icon"><img src="{{ asset('argon') }}/img/icons/common/google.svg"></span>
                                <span class="btn-inner--text">{{ __('Google') }}</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body px-lg-5 py-lg-5" style="border:2px solid #f7931e;border-radius:5px;border-top:transparent;">
                        <div class="text-center text-muted mb-4">
                            <span>{{ __('Or sign up with credentials') }}</span>
                        </div>
                        <form role="form" method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" style="font-size:14px !important;" placeholder="{{ __('Name') }}" type="text" name="name" value="{{ old('name') }}" required autofocus>
                                </div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" style="font-size:14px !important;" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" required>
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
                                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" style="font-size:14px !important;" placeholder="{{ __('Password') }}" type="password" name="password" id="password" required data-toggle="popover">
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="{{ __('Confirm Password') }}" style="font-size:14px !important;" type="password" name="password_confirmation" required>
                                </div>
                            </div>
                            <div class="progress">
                                    <div id="StrengthProgressBar" class="progress-bar"></div>
                            </div>
                            {{-- <div class="form-group">
                                    <label class="form-label col-sm-2">Password Strength</label>
                                    <div class="col-sm-12" id="example-progress-bar-container">
                                        hello
                                    </div>
                                </div> --}}
                            {{-- <div class="text-muted font-italic">
                                <small>{{ __('password strength') }}: <span class="text-success font-weight-700">{{ __('strong') }} </span></small>
                            </div> --}}
                            <div class="row my-4">
                                <div class="col-12">
                                    <div class="custom-control custom-control-alternative custom-checkbox">
                                        <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                                        <label class="custom-control-label" for="customCheckRegister">
                                            <small class="text-muted">{{ __('I agree with the') }} <a href="#!">{{ __('Privacy Policy') }}</a></small>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn text-white" style="background:#f7931e;padding:10px 50px 40px;">{{ __('Create account') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mt-3 mb-3"> 
                    <div class="col-12 text-right">
                        <a href="{{ route('login') }}" >
                            <span>{{ __('Already have account?') }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
