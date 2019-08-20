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
                                    <th scope="col"><?php echo e(__('PID')); ?></th>
                                    <th scope="col"><?php echo e(__('Code')); ?></th>
                                    <th scope="col"><?php echo e(__('Image')); ?></th>
                                    <th scope="col"><?php echo e(__('Name')); ?></th>
                                    <th scope="col"><?php echo e(__('Price')); ?></th>
                                    <th scope="col"><?php echo e(__('Size')); ?></th>
                                    <th scope="col"><?php echo e(__('Brand')); ?></th>
                                    <th scope="col"><?php echo e(__('Country')); ?></th>
                                    
                                    
                                    
                                    <th scope="col"><?php echo e(__('Created Date')); ?></th>
                                    
                                    
                                    <th scope="col"><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($product->pid); ?></td>
                                        <td><?php echo e($product->code); ?></td>
                                        <td><img src="<?php echo e(asset( 'uploads/product_image/' . $product->image )); ?>" alt="" class="img-thumbnail " style="width:100px;heigth:100px;"></td>                                      
                                        <td><?php echo e($product->name); ?></td>
                                        <td><?php echo e($product->price); ?></td>
                                        <td><?php echo e($product->size); ?></td>
                                        <td><?php echo e($product->brand); ?></td>
                                        <td><?php echo e($product->country); ?></td>
                                        <td><?php echo e($product->created_at->format('d/m/Y H:i')); ?></td>
                                        
                                        <td>
                                        
                                        
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    
                                                    
                                                        
                                                        <form action="products/<?php echo e($product->pid); ?>" method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('delete'); ?>
                                                            
                                                            <button type="button" class="dropdown-item openImageDialog" data-toggle="modal" data-target="#viewProduct" data-pid="<?php echo e($product->pid); ?>" data-name="<?php echo e($product->name); ?>" 
                                                                data-code="<?php echo e($product->code); ?>" data-price="<?php echo e($product->price); ?>" data-brand="<?php echo e($product->brand); ?>" 
                                                                data-country="<?php echo e($product->country); ?>" data-size="<?php echo e($product->size); ?>" data-image="<?php echo e($product->image); ?>"
                                                                data-description="<?php echo e($product->description); ?>" data-created_at="<?php echo e($product->created_at->format('d/m/Y H:i')); ?>"
                                                                data-update="<?php echo e($product->updated_at->format('d/m/Y H:i')); ?>" data-subcategory_id="<?php echo e($product->subcategory_id); ?>"><?php echo e(__('View')); ?></button> 
                                                            <a class="dropdown-item" href="/admin/products/<?php echo e($product->pid); ?>/edit" id="edit"><?php echo e(__('Edit')); ?></a>
                                                            <button class="dropdown-item " type="submit">Delete</button>
 
                                                            
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
    <script>
        $(document).ready(function(){
            $(function() {
                $('#viewProduct').on("show.bs.modal", function (e) {
                    $("#pid").html($(e.relatedTarget).data('pid'));
                    $("#name").html($(e.relatedTarget).data('name'));
                    $("#code").html($(e.relatedTarget).data('code'));
                    $("#brand").html($(e.relatedTarget).data('brand'));
                    $("#price").html($(e.relatedTarget).data('price'));
                    $("#size").html($(e.relatedTarget).data('size'));
                    $("#country").html($(e.relatedTarget).data('country'));
                    $("#description").html($(e.relatedTarget).data('description'));
                    $("#subcategory_id").html($(e.relatedTarget).data('subcategory_id'));
                    $("#created_at").html($(e.relatedTarget).data('created_at'));
                    // $("#update").html($(e.relatedTarget).data('updated_at'));
                    
                    // $('#imagesrc').attr('src',$("#image").html($(e.relatedTarget).data('image'));
                });
            });
        });
        $(document).on("click", ".openImageDialog", function () {
            var imgsrc = $(this).data('image');
            var imgsrc_path = '/uploads/product_image/'.concat(imgsrc);
            $('#imagesrc').attr('src',imgsrc_path);
            // console.log(imgsrc);
        });
    </script>
        <?php echo $__env->make('layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="modal fade" id="viewProduct" tabindex="-1" role="dialog" aria-labelledby="viewProductTitle" aria-hidden="true">
            <div class="modal-dialog modal-xxl modal-dialog-centered " role="document">
              <div class="modal-content">
                <div class="modal-header red-brown">
                <h3 class="modal-title text-white">Product Information :</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="row">    
                        <div class="col-lg-6">
                            <img id="imagesrc" style="width:auto;"/>
                        </div>
                        <div class="col-lg-6">
                            <div class="row mt-3">
                                <div class="col-lg-4">
                                    <span>Name : </span>
                                </div>
                                <div class="col-lg-8">
                                    <span id="name"></span>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-4">
                                    <span>Code : </span>
                                </div>
                                <div class="col-lg-8">
                                    <span id="code"></span>
                                </div>
                            </div>
                            <div class="row mt-3">
                                    <div class="col-lg-4">
                                        <span>Price : </span>
                                    </div>
                                    <div class="col-lg-8">
                                        <span id="price"></span>
                                    </div>
                                </div>
                            <div class="row mt-3">
                                <div class="col-lg-4">
                                    <span>Size : </span>
                                </div>
                                <div class="col-lg-8">
                                    <span id="size"></span>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-4">
                                    <span>Brand : </span>
                                </div>
                                <div class="col-lg-8">
                                    <span id="brand"></span>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-4">
                                    <span>Country : </span>
                                </div>
                                <div class="col-lg-8">
                                    <span id="country"></span>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-4">
                                    <span>Created date : </span>
                                </div>
                                <div class="col-lg-8">
                                    <span id="created_at"></span>
                                </div>
                            </div>
                            
                            <div class="row mt-3">
                                <div class="col-lg-4">
                                    <span>Description : </span>
                                </div>
                                <div class="col-lg-8">
                                    <span><h5 id="description"></h5></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', ['title' => __('Product Management')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\asd\Documents\GitHub\MartKH\MartKH\resources\views/admin/products/index.blade.php ENDPATH**/ ?>