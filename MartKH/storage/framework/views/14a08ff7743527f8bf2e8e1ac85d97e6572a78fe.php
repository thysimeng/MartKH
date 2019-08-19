<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.users.partials.header', [
        'title' => __('Hello') . ' '. auth()->user()->name,
        'description' => __('This is your profile page. You can see the progress you\'ve made with your work and manage your projects or assigned tasks'),
        'class' => 'col-lg-7'
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
    

    <div class="container-fluid mt--7">
        
            
            <div class="offset-xl-2 col-xl-8">                 
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0"><?php echo e(__('Edit Profile')); ?></h3>
                        </div>
                    </div>
                    <div class="card-body">
                        

                        <form method="post" action="<?php echo e(route('admin.profile.update')); ?>" autocomplete="off">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('put'); ?>

                            <h6 class="heading-small text-muted mb-4"><?php echo e(__('User information')); ?></h6>
                            
                            
                            
                            <?php if(session('status')): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php echo e(session('status')); ?>

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                            
                            
                            <div class="justify-content-center pt-lg-4" >
                                    
                                            <div class="card-profile-image" style="position:relative !important;">
                                                <a href="#">
                                                    <img src="<?php echo e(asset('argon')); ?>/img/theme/panda.jpg" class="rounded-circle">
                                                </a>
                                            </div>
                                    
                            </div>

                            <div class="pl-lg-4">
                                <div class="form-group<?php echo e($errors->has('name') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-name"><?php echo e(__('Name')); ?></label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Name')); ?>" value="<?php echo e(old('name', auth()->user()->name)); ?>" required autofocus>

                                    <?php if($errors->has('name')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('name')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group<?php echo e($errors->has('email') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-email"><?php echo e(__('Email')); ?></label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Email')); ?>" value="<?php echo e(old('email', auth()->user()->email)); ?>" required>

                                    <?php if($errors->has('email')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4"><?php echo e(__('Save')); ?></button>
                                </div>
                            </div>
                        </form>
                        <hr class="my-4" />
                        <form method="post" action="<?php echo e(route('admin.profile.password')); ?>" autocomplete="off">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('put'); ?>

                            <h6 class="heading-small text-muted mb-4"><?php echo e(__('Password')); ?></h6>

                            <?php if(session('password_status')): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php echo e(session('password_status')); ?>

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>

                            <div class="pl-lg-4">
                                <div class="form-group<?php echo e($errors->has('old_password') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-current-password"><?php echo e(__('Current Password')); ?></label>
                                    <input type="password" name="old_password" id="input-current-password" class="form-control form-control-alternative<?php echo e($errors->has('old_password') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Current Password')); ?>" value="" required>
                                    
                                    <?php if($errors->has('old_password')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('old_password')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group<?php echo e($errors->has('password') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-password"><?php echo e(__('New Password')); ?></label>
                                    <input type="password" name="password" id="input-password" class="form-control form-control-alternative<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('New Password')); ?>" value="" required>
                                    
                                    <?php if($errors->has('password')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('password')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-password-confirmation"><?php echo e(__('Confirm New Password')); ?></label>
                                    <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="<?php echo e(__('Confirm New Password')); ?>" value="" required>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4"><?php echo e(__('Change password')); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        
        
        <?php echo $__env->make('layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['title' => __('User Profile')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Downloads\MartKH\MartKH_Admin\MartKH\MartKH\resources\views/admin/profile/edit.blade.php ENDPATH**/ ?>