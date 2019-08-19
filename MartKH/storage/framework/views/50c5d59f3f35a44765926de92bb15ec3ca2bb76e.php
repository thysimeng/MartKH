<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.headers.cards', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                                    <div class="col-4">
                                        <h3 class="mb-0">Products</h3>
                                    </div>
                                    <form class="col-4">
                                            <div class="form-group mb-2 mt-2">
                                                <div class="input-group input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                                    </div>
                                                    <input class="form-control" placeholder="Search" type="text">
                                                </div>
                                            </div>
                                    </form>
                                    <div class="col-4 text-right">
                                            <a href="<?php echo e(route('products.create')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Add Product')); ?></a>
                                    </div>

                        </div>
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
                        <table class="table align-items-center table-flush table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col"><?php echo e(__('Code')); ?></th>
                                    
                                    <th scope="col"><?php echo e(__('Image')); ?></th>
                                    <th scope="col"><?php echo e(__('Name')); ?></th>
                                    <th scope="col"><?php echo e(__('Price')); ?></th>
                                    <th scope="col"><?php echo e(__('Size')); ?></th>
                                    
                                    
                                    
                                    
                                    <th scope="col"><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        
                                        <td><?php echo e($product->code); ?></td>
                                        <td><img src="<?php echo e($product->image); ?>" alt="" class="img-thumbnail " style="width:100px;heigth:100px;"></td>
                                        
                                        <td><?php echo e($product->name); ?></td>
                                        
                                        <td><?php echo e($product->price); ?></td>
                                        <td><?php echo e($product->size); ?></td>
                                        
                                        <!--  -->
                                        
                                        <td>
                                        
                                        
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    
                                                    
                                                        
                                                        <form action="" method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('delete'); ?>
                                                            
                                                        <a class="dropdown-item" href="/products/<?php echo e($product->pid); ?>"><?php echo e(__('View')); ?></a>
                                                            <a class="dropdown-item" href=""><?php echo e(__('Edit')); ?></a>
                                                            <button type="button" class="dropdown-item" onclick="confirm('<?php echo e(__("Are you sure you want to delete this user?")); ?>') ? this.parentElement.submit() : ''">
                                                                <?php echo e(__('Delete')); ?>

                                                            </button>
                                                        </form>
                                                    
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
                            
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <?php echo $__env->make('layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['title' => __('Product Management')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Downloads\MartKH\MartKH_Admin\MartKH\MartKH\resources\views/admin/products/index.blade.php ENDPATH**/ ?>