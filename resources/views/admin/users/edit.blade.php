@extends('layouts.app', ['title' => __('User Management')])

@section('content')
    @include('admin.users.partials.header', ['title' => __('Edit User')])

    @if($sidebar==1)
        <div class="container-fluid bg-dark mt--7">
            <div class="row">
                <div class="col-xl-12 order-xl-1">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-dark border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0 text-white">{{ __('User Management') }}</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
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
                                    <h3 class="mb-0">{{ __('User Management') }}</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
    @endif
                        <form method="post" action="{{ route('user.update', $user) }}" autocomplete="off">
                            @csrf
                            @method('put')
                            @if($sidebar==1)
                                <h6 class="heading-small text-muted mb-4 text-white">{{ __('User information') }}</h6>
                            @else
                                <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>
                            @endif
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    @if($sidebar==1)
                                        <label class="form-control-label text-white" for="input-name">{{ __('Name') }}</label>
                                    @else
                                        <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    @endif
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', $user->name) }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    @if($sidebar==1)
                                        <label class="form-control-label text-white" for="input-email">{{ __('Email') }}</label>
                                    @else
                                        <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                    @endif
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', $user->email) }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('role') ? ' has-danger' : '' }}">
                                    @if($sidebar==1)
                                        <label class="form-control-label text-white" for="input-role">{{ __('Role') }}</label>
                                    @else
                                        <label class="form-control-label" for="input-role">{{ __('Role') }}</label>
                                    @endif
                                    <select name="role" id="input-role" class="form-control form-control-alternative{{ $errors->has('role') ? ' is-invalid' : '' }}" placeholder="{{ __('Role') }}" value="{{ old('role', $user->role) }}" required>
                                        <option value="{{ $user->role }}" selected>{{ $user->role }}</option>
                                        @if ($user->role === 'admin')
                                        <option value="user">user</option>
                                        <option value="franchise">franchise</option>
                                        @elseif ($user->role === 'user')
                                        <option value="admin">admin</option>
                                        <option value="franchise">franchise</option>
                                        @else
                                        <option value="user">user</option>
                                        <option value="admin">admin</option>
                                        @endif
                                    </select>

                                    @if ($errors->has('role'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('role') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    @if($sidebar==1)
                                        <label class="form-control-label text-white" for="input-password">{{ __('Password') }}</label>
                                    @else
                                        <label class="form-control-label" for="input-password">{{ __('Password') }}</label>
                                    @endif
                                    <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" value="">

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    @if($sidebar==1)
                                        <label class="form-control-label text-white" for="input-password-confirmation">{{ __('Confirm Password') }}</label>
                                    @else
                                        <label class="form-control-label" for="input-password-confirmation">{{ __('Confirm Password') }}</label>
                                    @endif
                                    <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirm Password') }}" value="">
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
