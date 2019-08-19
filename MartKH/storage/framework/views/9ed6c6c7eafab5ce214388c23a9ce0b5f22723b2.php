<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="<?php echo e(route('home')); ?>"><?php echo e(__('Dashboard')); ?></a>
        <!-- Form -->
        
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="<?php echo e(asset('argon')); ?>/img/theme/panda.jpg">
                        </span>
                        <div class="media-body ml-2 d-none d-lg-block">
                            <span class="mb-0 text-sm  font-weight-bold"><?php echo e(auth()->user()->name); ?></span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0"><?php echo e(__('Welcome!')); ?></h6>
                    </div>
                    <a href="<?php echo e(route('admin.profile.edit')); ?>" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span><?php echo e(__('My profile')); ?></span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span><?php echo e(__('Settings')); ?></span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span><?php echo e(__('Activity')); ?></span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span><?php echo e(__('Support')); ?></span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="<?php echo e(route('logout')); ?>" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span><?php echo e(__('Logout')); ?></span>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav><?php /**PATH C:\Users\User\Downloads\MartKH\MartKH_Admin\MartKH\MartKH\resources\views/layouts/navbars/navs/auth.blade.php ENDPATH**/ ?>