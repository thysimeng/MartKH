<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.headers.cards', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <ul class="nav nav-tabs card-header-tabs" id="bologna-list" role="tablist">
                                    <li class="nav-item col-2">
                                      <a class="nav-link active" href="#admin" role="tab" aria-controls="admin" aria-selected="true"><?php echo e(__('Admin')); ?></a>
                                    </li>
                                    <li class="nav-item col-2">
                                      <a class="nav-link"  href="#user" role="tab" aria-controls="user" aria-selected="false"><?php echo e(__('User')); ?></a>
                                    </li>
                                    <li class="nav-item col-2">
                                      <a class="nav-link" href="#franchise" role="tab" aria-controls="franchise" aria-selected="false"><?php echo e(__('Franchise')); ?></a>
                                    </li>

                                    <form class="col-4">
                                            <div class="form-group mb-4">
                                                <div class="input-group input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                                    </div>
                                                    <input class="form-control" placeholder="Search" type="text">
                                                </div>
                                            </div>
                                    </form>
                                        
                                        
                                    <div class="col-2 text-right">
                                            <a href="<?php echo e(route('user.create')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Add user')); ?></a>
                                    </div>
                        </ul>
                        
                    </div>
                    
                    <div class="col-12">
                        <?php if(session('status')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo e(session('status')); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col"><?php echo e(__('Name')); ?></th>
                                    <th scope="col"><?php echo e(__('Email')); ?></th>
                                    <th scope="col"><?php echo e(__('Creation Date')); ?></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($user->name); ?></td>
                                        <td>
                                            <a href="mailto:<?php echo e($user->email); ?>"><?php echo e($user->email); ?></a>
                                        </td>
                                        <td><?php echo e($user->created_at->format('d/m/Y H:i')); ?></td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <?php if($user->id != auth()->id()): ?>
                                                        <form action="<?php echo e(route('user.destroy', $user)); ?>" method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('delete'); ?>
                                                            
                                                            <a class="dropdown-item" href="<?php echo e(route('user.edit', $user)); ?>"><?php echo e(__('Edit')); ?></a>
                                                            <button type="button" class="dropdown-item" onclick="confirm('<?php echo e(__("Are you sure you want to delete this user?")); ?>') ? this.parentElement.submit() : ''">
                                                                <?php echo e(__('Delete')); ?>

                                                            </button>
                                                        </form>    
                                                    <?php else: ?>
                                                        <a class="dropdown-item" href="<?php echo e(route('profile.edit')); ?>"><?php echo e(__('Edit')); ?></a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            <?php echo e($users->links()); ?>

                        </nav>
                    </div>
                </div>
            </div>
        </div>
            
        <?php echo $__env->make('layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['title' => __('User Management')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\asd\Documents\GitHub\MartKH\MartKH\resources\views/users/index.blade.php ENDPATH**/ ?>