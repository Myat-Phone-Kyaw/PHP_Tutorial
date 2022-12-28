<!-- resources/views/common/errors.blade.php -->
 
<?php if(count($errors) > 0): ?>
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <strong>Whoops! Something went wrong!</strong>
 
        <br><br>
 
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/PHP_Tutorial/Laravel_Assignment_Quickstart/resources/views/common/errors.blade.php ENDPATH**/ ?>