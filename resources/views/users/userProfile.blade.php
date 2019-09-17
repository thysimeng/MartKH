@extends('layouts.users')
@section('contents')

<div v-if="show==1" class="container-fluid mt-4 mb-4">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-12 col-lg-6">
            <div class="card border-0">
                <div class="card-header bg-gradient-red mb-xs-5">
                    <h3 class="mb-xs-5 p-xs-4 p-sm-4 p-md-1 p-lg-2 mt-sm-4 text-white">Profile</h3>
                </div>

                <div class="card-body" style="border:2px solid #f7931e;border-radius:5px;border-top:transparent;">
                    <!-- Image -->
                    <div class="justify-content-center mt-xs-6 mt-sm-6 mt-md-5 mt-lg-5 pt-lg-4">
                        <div class="card-profile-image" style="position:relative !important;">
                            <a href="#" id="imgProfile">
                                <img src="{{ asset('uploads') }}/avatar/{{ auth()->user()->avatar }}"
                                    class="rounded-circle" id="img-preview">
                            </a>
                        </div>
                    </div>
                    @if ($errors->has('avatar'))
                    <span class="invalid-feedback text-center" style="display: block;" role="alert">
                        <strong>{{ $errors->first('avatar') }}</strong>
                    </span>
                    @endif
                    <div style="display:none">
                        <form action="{{ route('uploadProfile') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <input type="file" name="avatar" id="upload-avatar"
                                class="{{ $errors->has('avatar') ? ' is-invalid' : '' }} custom-file-input">
                        </form>
                    </div>
                    <!-- End Image -->
                    <h5 class="text-muted my-xs-4 my-sm-4 ml-lg-4 mb-md-4">{{ __('Name and Email') }}</h5>
                    <form action="{{ route('updateUserProfile')}}" method="post">
                        @csrf
                        <div class="px-lg-4">
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                    </div>
                                    <input type="text" name="name" id="input-name"
                                        class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}"
                                        required>
                                </div>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input type="email" name="email" id="input-email"
                                        class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Email') }}"
                                        value="{{ old('email', auth()->user()->email) }}" required>
                                </div>

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn mt-4 mb-3 text-white"
                                    style="background:#f7931e;padding:10px 45px 35px;">{{ __('Save') }}</button>
                            </div>
                        </div>
                    </form>
                    <hr class="m-4">
                    <form method="post" action="{{ route('admin.profile.password') }}" autocomplete="off">
                        @csrf
                        @method('put')

                        <h5 class="text-muted my-xs-4 my-sm-4 ml-lg-4 mb-md-4">{{ __('Password') }}</h5>

                        <div class="px-lg-4">
                            <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                <label class="form-control-label"
                                    for="input-current-password">{{ __('Current Password') }}</label>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input type="password" name="old_password" id="input-current-password"
                                        class="form-control form-control-alternative{{ $errors->has('old_password') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Current Password') }}" value="" required>
                                </div>

                                @if ($errors->has('old_password'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('old_password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-password">{{ __('New Password') }}</label>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input type="password" name="password" id="input-password"
                                        class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('New Password') }}" value="" required>
                                </div>
                                @if ($errors->has('password'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-control-label"
                                    for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                            </div>
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                </div>
                                <input type="password" name="password_confirmation" id="input-password-confirmation"
                                    class="form-control form-control-alternative"
                                    placeholder="{{ __('Confirm New Password') }}" value="" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn mt-4 mb-4 text-white"
                                    style="background:#f7931e;padding:10px 45px 35px;">{{ __('Change password') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Vue route --}}
<router-view v-if="show==2"></router-view>
<shop-Home-Page :products="products" :show="show" v-if="show==3"></shop-Home-Page>
<router-view name="userProfile"></router-view>
<router-view name="wishlistDisplay"></router-view>
{{--End  Vue route --}}
@endsection
