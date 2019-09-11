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
        .alert {
            font-size: 14px !important;
        }
    </style>
@extends('layouts.users')
@section('contents')
    <div class="container mt-4">
            {{-- @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong><br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif --}}
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card bg-gradient-red border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <h4 class="text-white">{{ __('Reset Password') }}</h4>
                        </div>
                        <form role="form" method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" style="font-size:14px !important;" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ $email ?? old('email') }}" required autofocus>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong class="text-white" style="font-size:14px;">{{ $errors->first('email') }}</strong>
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
                                        <strong class="text-white" style="font-size:14px;">{{ $errors->first('password') }}</strong>
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
                            <div class="text-center">
                                <input type="submit" class="btn my-4 text-white" value="Reset Password">                                                            
                                {{-- <button type="submit" class="btn btn-primary my-4">{{ __('Reset Password') }}</button> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
