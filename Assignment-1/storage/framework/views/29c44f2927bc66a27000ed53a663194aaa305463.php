<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            New Task
        </div>
        <div class="card-body">
            <form action="<?php echo e(url('/store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="task" class="col-sm-3 fw-bold">Task</label>
                    <div>
                        <input type="text" name="name" id="task-name" class="form-control">
                    </div>
                    <?php if($errors->any()): ?>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <small class="text-danger"><?php echo e($error); ?></small>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
                <div class="form-group mt-3">
                    <div class="col-offset-3 col-6">
                    <button type="submit" class="btn btn-light btn-sm">
                        + Add Task
                    </button>
                </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            Current Tasks
        </div>
        <div class="card-body">
            <table class="table table-striped task-table">
                <thead>
                    <th>Task</th>
                    <th>&nbsp;</th>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="position-relative">
                            <td class="table-text col-md-8">
                                <div><?php echo e($data->name); ?></div>
                            </td>
                            <td>
                                <a href="<?php echo e(url('/edit/' . $data->id)); ?>"><button class="btn btn-warning">Edit</button></a>
                                <form action="<?php echo e(url('/delete/' . $data->id)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-danger delete-btn">
                                        Delete<input type="hidden" name="" value="DELETE">
                                    </button>
                                    <div class="alert alert-danger position-absolute top-50 start-50 translate-middle col-md-10 delete-box"
                                        role="alert" style="display:none;">
                                        <small>Are You Sure You Want To Delete?</small>
                                        <div class="d-flex justify-content-between mt-3">
                                            <a href="<?php echo e(url('/')); ?>" class="btn btn-sm btn-secondary">Cancel</a>
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/PHP_Tutorial/SCM_Frame_Laravel/resources/views/tasks.blade.php ENDPATH**/ ?>