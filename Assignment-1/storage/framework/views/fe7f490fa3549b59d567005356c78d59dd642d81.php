<?php $__env->startSection('content'); ?>
    <h2>Edit</h2>
    <form action="<?php echo e(url('/update/' . $data->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="form-group">
            <label for="task" class="col-sm-3 fw-bold">Task</label>
            <div>
                <input type="text" name="name" id="task-name" class="form-control" value="<?php echo e($data->name); ?>">
            </div>
            <?php if($errors->any()): ?>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <small class="text-danger"><?php echo e($error); ?></small>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
        <div class="form-group mt-3 d-flex justify-content-between">
            <a href="<?php echo e(url('/')); ?>" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-light btn-sm border">Update Task</button>
        </div>
    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/PHP_Tutorial/SCM_Frame_Laravel/resources/views/edit.blade.php ENDPATH**/ ?>