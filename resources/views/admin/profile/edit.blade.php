@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('admin.users.partials.header', [
        'title' => __('Hello') . ' '. auth()->user()->name,
        'description' => __('This is your profile page.'),
        'class' => 'col-lg-12'
    ])


    @if($sidebar==1)
        <div class="container-fluid bg-dark mt--7">
    @else
        <div class="container-fluid mt--7">
    @endif
        {{-- <div class="row"> --}}
            {{-- <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img src="{{ asset('argon') }}/img/theme/panda.jpg" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-sm btn-info mr-4">{{ __('Connect') }}</a>
                            <a href="#" class="btn btn-sm btn-default float-right">{{ __('Message') }}</a>
                        </div>
                    </div>
                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                    <div>
                                        <span class="heading">22</span>
                                        <span class="description">{{ __('Friends') }}</span>
                                    </div>
                                    <div>
                                        <span class="heading">10</span>
                                        <span class="description">{{ __('Photos') }}</span>
                                    </div>
                                    <div>
                                        <span class="heading">89</span>
                                        <span class="description">{{ __('Comments') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3>
                                {{ auth()->user()->name }}<span class="font-weight-light">, 27</span>
                            </h3>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>{{ __('Bucharest, Romania') }}
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>{{ __('Solution Manager - Creative Tim Officer') }}
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i>{{ __('University of Computer Science') }}
                            </div>
                            <hr class="my-4" />
                            <p>{{ __('Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music.') }}</p>
                            <a href="#">{{ __('Show more') }}</a>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="offset-xl-2 col-xl-8">
                <div class="card bg-secondary shadow">
                    @if($sidebar==1)
                        <div class="card-header bg-dark border-0">
                            <div class="row align-items-center">
                                <h3 class="col-12 mb-0 text-white">{{ __('Edit Profile') }}</h3>
                            </div>
                        </div>
                    @else
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <h3 class="col-12 mb-0">{{ __('Edit Profile') }}</h3>
                            </div>
                        </div>
                    @endif
                    @if($sidebar==1)
                        <div class="card-body bg-dark border">
                            <h6 class="heading-small text-muted mb-5 text-white">{{ __('User information') }}</h6>
                    @else
                        <div class="card-body">
                            <h6 class="heading-small text-muted mb-5">{{ __('User information') }}</h6>
                    @endif
                        <!-- Success Message -->
                        <!-- @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show mb-5" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif -->
                        <!-- img -->
                        <div class="justify-content-center pt-lg-4" >
                                <!-- {{-- <div class="pl-lg-4"> --}} -->
                                        <div class="card-profile-image" style="position:relative !important;">
                                            <a href="#">
                                                <img src="{{ asset('uploads') }}/avatar/{{ auth()->user()->avatar }}" class="rounded-circle" id="img-preview">
                                            </a>
                                        </div>
                                <!-- {{-- </div> --}} -->
                        </div>
                        @if($sidebar==1)
                            <h6 class="heading-small text-muted mb-4 text-white">{{ __('Profile Picture') }}</h6>
                        @else
                            <h6 class="heading-small text-muted mb-4">{{ __('Profile Picture') }}</h6>
                        @endif
                        <div class="pl-lg-4">
                            <div class="form-group{{ $errors->has('avatar') ? ' has-danger' : '' }}">
                                <form action="{{ route('admin.profile.upload') }}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <!-- <label class="form-control-label" for="upload-avatar">{{ __('Update Profile Picture') }}</label> -->
                                    <br>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="avatar" id="upload-avatar" class="{{ $errors->has('avatar') ? ' is-invalid' : '' }} custom-file-input">
                                            <label class="custom-file-label" for="upload-avatar" id="input-file-label">{{ __('Choose file')}}</label>
                                        </div>
                                    </div>
                                    <div class="text-center mt-3">
                                        <input type="submit" class="btn btn-success rounded upload-btn" value="{{ __('Upload') }}">
                                    </div>
                                    @if ($errors->has('avatar'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('avatar') }}</strong>
                                        </span>
                                    @endif
                                </form>
                            </div>
                        </div>
                        @if($sidebar==1)
                            <hr style="border:1px solid white">
                                <h6 class="heading-small text-muted mb-4 text-white">{{ __('Name and Email') }}</h6>
                        @else
                            <hr>
                            <h6 class="heading-small text-muted mb-4">{{ __('Name and Email') }}</h6>
                        @endif
                        <form method="post" action="{{ route('admin.profile.update') }}" autocomplete="off">
                            @csrf
                            @method('put')
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    @if($sidebar==1)
                                        <label class="form-control-label text-white" for="input-name">{{ __('Name') }}</label>
                                    @else
                                        <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    @endif
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required>

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
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                        <hr class="my-4" />
                        <form method="post" action="{{ route('admin.profile.password') }}" autocomplete="off">
                            @csrf
                            @method('put')
                            @if($sidebar==1)
                                <hr style="border:1px solid white">
                                <h6 class="heading-small text-muted mb-4 text-white">{{ __('Password') }}</h6>
                            @else
                                <h6 class="heading-small text-muted mb-4">{{ __('Password') }}</h6>
                            @endif
                            <!-- Password Success Status -->
                            <!-- @if (session('password_status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('password_status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif -->
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                    @if($sidebar==1)
                                        <label class="form-control-label text-white" for="input-current-password">{{ __('Current Password') }}</label>
                                    @else
                                        <label class="form-control-label" for="input-current-password">{{ __('Current Password') }}</label>
                                    @endif
                                    <input type="password" name="old_password" id="input-current-password" class="form-control form-control-alternative{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Current Password') }}" value="" required>
                                    @if ($errors->has('old_password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('old_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    @if($sidebar==1)
                                        <label class="form-control-label text-white" for="input-password">{{ __('New Password') }}</label>
                                    @else
                                        <label class="form-control-label" for="input-password">{{ __('New Password') }}</label>
                                    @endif
                                    <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    @if($sidebar==1)
                                        <label class="form-control-label text-white" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                                    @else
                                        <label class="form-control-label" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                                    @endif
                                    <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirm New Password') }}" value="" required>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Change password') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        {{-- </div> --}}

        @include('layouts.footers.auth')
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            // preview image before upload

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#img-preview').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#upload-avatar").change(function() {
                readURL(this);
            });

            $('#upload-avatar').on("change",function() {
                var i = $(this).prev('#input-file-label').clone();
                var file = $('#upload-avatar')[0].files[0].name;
                $(this).next('#input-file-label').text(file);
            });

            $('.upload-btn').click(function(e){
                var form = $(this).parents('form:first');
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You can not switch back to current profile picture!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.value) {
                    form.submit();
                }
                })
            });

        });
    </script>
@endsection
