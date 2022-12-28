
<?php $__env->startSection('contents'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Major Create</h3>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(url('major/store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label>Major Name</label>
                            <input type="text" name="name" class="form-control" />
                        </div>
                        <?php if($errors->any()): ?>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <small class="text-danger"><?php echo e($error); ?></small>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <div class="d-flex justify-content-between form-group mt-2">
                            <a href=<?php echo e(url('/major')); ?> class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('./../layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/PHP_Tutorial/Assignment-1/resources/views/major/create.blade.php ENDPATH**/ ?>