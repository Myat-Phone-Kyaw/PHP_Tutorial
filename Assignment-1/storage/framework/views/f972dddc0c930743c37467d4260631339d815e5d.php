<?php $__env->startSection('contents'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="float-left">Admin Dashboard</h3>
                </div>
                <div class="card-body">
                    <div class="float-right">
                        <a href=<?php echo e(url('major')); ?> class="btn btn-outline-primary">Majors</a>
                        <a href=<?php echo e(url('student')); ?> class="btn btn-outline-primary">Students</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('./../layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/PHP_Tutorial/Assignment-1/resources/views/index.blade.php ENDPATH**/ ?>