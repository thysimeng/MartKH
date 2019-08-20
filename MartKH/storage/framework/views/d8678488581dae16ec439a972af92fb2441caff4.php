<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="<?php echo e(route('home')); ?>">
            
            <span class="text-danger">MartKH</span> 
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        
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
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="<?php echo e(route('home')); ?>">
                            
                            <span class="text-danger">MartKH</span> 
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="<?php echo e(__('Search')); ?>" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('home')); ?>">
                        <i class="ni ni-tv-2 text-primary"></i> <?php echo e(__('Dashboard')); ?>

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        
                        <i class="fas fa-user-ninja text-danger"></i>
                        <span class="nav-link-text"><?php echo e(__('User')); ?></span>
                    </a>

                    <div class="collapse show" id="navbar-examples">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('admin.profile.edit')); ?>">
                                    <?php echo e(__('Profile')); ?>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('user.index')); ?>">
                                    <?php echo e(__('User Management')); ?>

                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('products.index')); ?>">
                        
                        <i class="fas fa-shopping-bag text-info"></i> <?php echo e(__('Product')); ?>

                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.category')); ?>">
                        
                        <i class="fas fa-store-alt" style="color:#1a8a6b;"></i><?php echo e(__('Category')); ?>

                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('home')); ?>">
                        
                        <i class="fas fa-cubes" style="color:#ffd600;"></i> <?php echo e(__('Stock')); ?>

                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('home')); ?>">
                        
                        <i class="fas fa-map-marked-alt" style="color:#f4645f;"></i> <?php echo e(__('Franchise')); ?>

                    </a>
                </li>
                
                
                
            </ul>
            <!-- Divider -->
                    
            <!-- Heading -->
                    
            <!-- Navigation -->
            
        </div>
    </div>
</nav><?php /**PATH C:\Users\asd\Documents\GitHub\MartKH\MartKH\resources\views/////layouts/navbars/sidebar.blade.php ENDPATH**/ ?>