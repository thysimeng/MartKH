<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.users.partials.header', ['title' => __('Add Product')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0"><?php echo e(__('Product Management')); ?></h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="<?php echo e(route('products.index')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Back to list')); ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo e(route('products.store')); ?>" autocomplete="off" enctype="multipart/form-data">
                        
                            <?php echo csrf_field(); ?>
                            <h6 class="heading-small text-muted mb-4"><?php echo e(__('Product information')); ?></h6>
                            
                            <div class="pl-lg-4">
                                
                                
                                
                                <div class="form-group">
                                    <label class="form-control-label" for="input-code"><?php echo e(__('Upload Image')); ?></label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-default btn-file">
                                                Browse… <input type="file" id="imgInp" name="image">
                                            </span>
                                            <div><?php echo e($errors->first('image')); ?></div>
                                        </span>
                                        <input type="text" class="form-control" readonly>
                                    </div>
                                    <br>
                                    <img id='img-upload' class="img-thumbnail rounded mx-auto d-block"/>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12">
                                         <div class="form-group<?php echo e($errors->has('code') ? ' has-danger' : ''); ?>">
                                            <label class="form-control-label" for="input-code"><?php echo e(__('Code')); ?></label>
                                            <input type="text" name="code" id="input-code" class="form-control form-control-alternative<?php echo e($errors->has('code') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Code')); ?>" required autofocus>

                                            <?php if($errors->has('code')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('code')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="form-group<?php echo e($errors->has('name') ? ' has-danger' : ''); ?>">
                                            <label class="form-control-label" for="input-name"><?php echo e(__('Name')); ?></label>
                                            <input type="text" name="name" id="input-name" class="form-control form-control-alternative<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Name')); ?>" required autofocus>

                                            <?php if($errors->has('name')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="form-group<?php echo e($errors->has('price') ? ' has-danger' : ''); ?>">
                                            <label class="form-control-label" for="input-price"><?php echo e(__('Price')); ?></label>
                                            <input type="text" name="price" id="input-price" class="form-control form-control-alternative<?php echo e($errors->has('price') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Price')); ?>" required autofocus>

                                            <?php if($errors->has('price')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('price')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="form-group<?php echo e($errors->has('size') ? ' has-danger' : ''); ?>">
                                            <label class="form-control-label" for="input-size"><?php echo e(__('Size')); ?></label>
                                            <input type="text" name="size" id="input-size" class="form-control form-control-alternative<?php echo e($errors->has('size') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Size')); ?>" required autofocus>

                                            <?php if($errors->has('size')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('size')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-lg-6 col-sm-12">
                                         <div class="form-group<?php echo e($errors->has('brand') ? ' has-danger' : ''); ?>">
                                            <label class="form-control-label" for="input-brand"><?php echo e(__('Brand')); ?></label>
                                            <input type="text" name="brand" id="input-brand" class="form-control form-control-alternative<?php echo e($errors->has('brand') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Brand')); ?>" autofocus>

                                            <?php if($errors->has('brand')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('brand')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="form-group<?php echo e($errors->has('country') ? ' has-danger' : ''); ?>">
                                            <label class="form-control-label" for="input-country"><?php echo e(__('Country')); ?></label>
                                            <input type="text" name="country" id="input-country" class="form-control form-control-alternative<?php echo e($errors->has('country') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Country')); ?>" autofocus>

                                            <?php if($errors->has('country')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('country')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group<?php echo e($errors->has('category_id') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-category_id"><?php echo e(__('category')); ?></label>
                                    <select class="form-control" name="category_id" id="category_id" required>
                                        
                                        <option value="1">Energy Drink</option>
                                        <option value="2">Soft Drink</option>
                                        <option value="2">Coffee</option>
                                    </select>
                                </div>
                                <div class="form-group<?php echo e($errors->has('description') ? ' has-danger' : ''); ?>">
                                        <label class="form-control-label" for="input-description"><?php echo e(__('Description')); ?></label>
                                        <textarea class="form-control form-control-alternative<?php echo e($errors->has('description') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Description')); ?>" id="input-description" rows="4" name="description" required autofocus></textarea>
                                        <?php if($errors->has('description')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('description')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4"><?php echo e(__('Save')); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready( function() {
                $(document).on('change', '.btn-file :file', function() {
                var input = $(this),
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [label]);
                });
                $('.btn-file :file').on('fileselect', function(event, label) {
                    
                    var input = $(this).parents('.input-group').find(':text'),
                        log = label;
                    
                    if( input.length ) {
                        input.val(log);
                    } else {
                        if( log ) alert(log);
                    }
                
                });
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        
                        reader.onload = function (e) {
                            $('#img-upload').attr('src', e.target.result);
                        }
                        
                        reader.readAsDataURL(input.files[0]);
                    }
                }
                $("#imgInp").change(function(){
                    readURL(this);
                }); 	
            });
        </script>

        <?php echo $__env->make('layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['title' => __('Product Management')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\asd\Documents\GitHub\MartKH\MartKH\resources\views/admin/products/create.blade.php ENDPATH**/ ?>