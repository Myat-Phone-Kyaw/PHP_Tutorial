<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        New Task
    </div>
    <div class="card-body">
        <form action="<?php echo e(route('task.store')); ?>" method="POST" class="form-horizontal">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="task" class="col-12 control-label">Task</label>
                <div class="col-12">
                    <input type="text" name="task" id="task-name" class="form-control">
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
                    <button type="submit" class="btn btn-light btn-sm">
                        + Add Task
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card mt-3">
    <div class="card-header">
        Current Tasks
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Task</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($task->id); ?></td>
                    <td><?php echo e($task->name); ?></td>
                    <td>
                        <a href="<?php echo e(route('task.edit',$task->id)); ?>" class="text-decoration-none">
                            <button class="btn btn-warning btn-sm">Edit</button>
                        </a>
                        <form action="<?php echo e(route('task.destroy',$task->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            
                            <button class="btn btn-danger btn-sm" onclick='return confirm("Are you sure to delete?")'>
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/PHP_Tutorial/SCM_Frame_Laravel/resources/views/task/index.blade.php ENDPATH**/ ?>