
<?php if(session('success')): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-success d-flex justify-content-between" role="alert">
            <?php echo e(session('success')); ?>

            <a href="<?php echo e(url('/major')); ?>" class="btn btn-outline-dark">&times;</a>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if(session('update')): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-success d-flex justify-content-between" role="alert">
            <?php echo e(session('update')); ?>

            <a href="<?php echo e(url('/major')); ?>" class="btn btn-outline-dark">&times;</a>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if(session('delete')): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-danger d-flex justify-content-between" role="alert">
            <?php echo e(session('delete')); ?>

            <a href="<?php echo e(url('/major')); ?>" class="btn btn-outline-dark">&times;</a>
        </div>
    </div>
</div>
<?php endif; ?>

<?php $__env->startSection('contents'); ?>
<?php $i = 1; ?>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Majors</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <a href=<?php echo e(url('/')); ?> class="btn btn-secondary">Back</a>
                        <a href=<?php echo e(url('major/create')); ?> class="btn btn-primary">Create</a>
                    </div>

                    <table class="table table-striped">
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                        <?php $__currentLoopData = $majors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $major): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php echo $i;
                                    $i++; ?>
                            </td>
                            <td><?php echo e($major->name); ?></td>
                            <td>
                                <a href=<?php echo e(url('major/edit/' . $major->id)); ?>

                                    class="btn btn-sm btn-warning text-light">Update</a>
                                <form action=<?php echo e(url('/major/delete/' . $major->id)); ?> method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </div>
            </div>
            </form>
            </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </table>

        </div>
    </div>
</div>
<div class="col-md-3"></div>
</div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('./../layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/PHP_Tutorial/Assignment-1/resources/views/major/index.blade.php ENDPATH**/ ?>