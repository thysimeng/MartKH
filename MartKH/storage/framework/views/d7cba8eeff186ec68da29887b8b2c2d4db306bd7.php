<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.headers.cards', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow"> 
                        <div class="card-header border-0">
                                <ul class="nav nav-tabs card-header-tabs" id="bologna-list" role="tablist">
                                            <div class="col-4 text-left">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"><?php echo e(__('Add Category')); ?></button>
                                                <button type="button" class="btn " ><a href="/category/sub-category"><?php echo e(__('View Sub Category')); ?></a></button>
                                            </div>

                                            <form class="col-4" action="/search" method="get" role="search">
                                                <?php echo e(csrf_field()); ?>

                                                    <div class="form-group mb-4">
                                                        <div class="input-group input-group-alternative">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                                            </div>
                                                            <input class="form-control" placeholder="Search" type="text" name="search">
                                                            <span class="form-group-btn">
                                                                <button  type="submit" class="btn btn-primary">Search</button>
                                                            </span>
                                                        </div>
                                                    </div>
                                            </form>
                                           
                                            <form class="form-horizontal" action="/create_category" enctype="multipart/form-data" method="post">
                                                <?php echo csrf_field(); ?>
                                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Add Category</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <input type="text" class="form-control" name="category" id="input_category" value="" required placeholder="category">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            
                                </ul>
                            </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col"><?php echo e(__('Category ID')); ?></th>
                                    <th scope="col"><?php echo e(__('Name')); ?></th>
                                    <th scope="col"><?php echo e(__('Create Date')); ?></th>
                                    <th scope="col"><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php $__currentLoopData = $categories_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <tr>
                                        <td><?php echo e($item->cid); ?></td>
                                        <td><?php echo e($item->categories_name); ?></td>
                                        <td><?php echo e($item->created_at); ?></td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div data-id="<?php echo e($item->cid); ?>"  class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a onclick="edit(<?php echo e($item->cid); ?>, '<?php echo e($item->categories_name); ?>')"  class="dropdown-item" data-toggle="modal" data-target="#editModalCenter" href=""><?php echo e(__('Edit')); ?></a>
                                            
                                                    
                                                    <a class="dropdown-item" href="/delete/<?php echo e($item->cid); ?>"><?php echo e(__('Delete')); ?></a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                               
                                    <div class="modal fade" id="editModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <form action="/edit" method="post">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalCenterTitle">Edit Category</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <input type="hidden" name="category_id" value="" >
                                                        <?php echo csrf_field(); ?>
                                                        <div class="modal-body">
                                                            <input type="text" class="form-control" name="category_name" value="" required placeholder="">
                                                        </div>
                                                        <div  class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button onclick="saveEdit()"  class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                        </form>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                            <div class="wrapper-pagination">
                                <?php echo e($categories_data->appends($queryParams)->render()); ?>

                            </div>
                        </div>
                </div>
            </div>
        </div>
        <?php echo $__env->make('layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<script>
    var id = null;

    function edit(id,name) {
        document.querySelector('[name="category_id"]').setAttribute('value', id);
        document.querySelector('[name="category_name"]').setAttribute('value', name);
    }

    // function saveEdit(){
    //     var name = document.getElementById("input_category").value;
    //     console.log('ID:::',this.id)   
    //     console.log('ID:::',name)    
    // }

</script>
<?php echo $__env->make('layouts.app', ['title' => __('Category Management')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Downloads\MartKH\MartKH_Admin\MartKH\MartKH\resources\views/admin/category/index.blade.php ENDPATH**/ ?>