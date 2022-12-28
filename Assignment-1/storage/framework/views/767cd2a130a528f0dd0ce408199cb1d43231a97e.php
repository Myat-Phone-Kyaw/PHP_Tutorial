<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        New Task
    </div>
    <div class="card-body">
        <form action="<?php echo e(url('task/'. $post->id)); ?>" method="POST" class="form-horizontal">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="form-group">
                <label for="task" class="col-12 control-label">Edit Task</label>
                <div class="col-12">
                    <input type="text" name="task" id="task-name" class="form-control" value="<?php echo e($post->name); ?> ">
                    <?php $__errorArgs = ["task"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="font-weight-bold text-danger"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
            <div class="form-group mt-3">
                <div class="col-offset-3 col-6">
                    <button type="submit" class="btn btn-light btn-sm border">
                        Update Task
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/PHP_Tutorial/Laravel_Assignment_Quickstart/resources/views/task/edit.blade.php ENDPATH**/ ?>