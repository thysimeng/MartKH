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
        .alert {
            font-size: 14px !important;
        }
        @media (min-width: 992px) and (max-width: 1199.98px) { 
            .button{
                padding:10px 30px 40px !important;
            }
        }
    </style>
@extends('layouts.users')
@section('contents')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card bg-gradient-red border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center mb-4">
                            <h4 class="text-white">{{ __('Reset password') }}</h4>
                        </div>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form role="form" method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" style="font-size:14px !important;" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" required autofocus>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong class="text-white" style="font-size:14px;">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn my-4 text-white" style="background:#f7931e;padding:10px 20px 40px;">{{ __('Send Password Reset Link') }}</button>                                
                                {{-- <button type="submit" class="btn btn-primary my-4">{{ __('Send Password Reset Link') }}</button> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
