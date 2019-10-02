@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('admin.users.partials.header', [
        'title' => __('Hello') . ' '. auth()->user()->name,
        'description' => __('This is your profile page.'),
        'class' => 'col-lg-12'
    ])   
    

    <div class="container-fluid mt--7">
            <div class="offset-xl-2 col-xl-8">                 
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">{{ __('Edit Profile') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">

                    <h6 class="heading-small text-muted mb-5">{{ __('User information') }}</h6>
                            
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

                        <h6 class="heading-small text-muted mb-4">{{ __('Profile Picture') }}</h6>

                        <div class="pl-lg-4">
                            <div class="form-group{{ $errors->has('avatar') ? ' has-danger' : '' }}">
                                <form action="{{ route('franchise.profile.upload') }}" enctype="multipart/form-data" method="post">
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

                        <hr>

                        <h6 class="heading-small text-muted mb-4">{{ __('Name and Email') }}</h6>

                        <form method="post" action="{{ route('franchise.update.profile') }}" autocomplete="off">
                            @csrf
                            @method('put')
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
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
                        <form method="post" action="{{ route('franchise.profile.password') }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Password') }}</h6>

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
                                    <label class="form-control-label" for="input-current-password">{{ __('Current Password') }}</label>
                                    <input type="password" name="old_password" id="input-current-password" class="form-control form-control-alternative{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Current Password') }}" value="" required>
                                    
                                    @if ($errors->has('old_password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('old_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-password">{{ __('New Password') }}</label>
                                    <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="" required>
                                    
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
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
        
        @include('franchise.layouts.footers.auth')
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