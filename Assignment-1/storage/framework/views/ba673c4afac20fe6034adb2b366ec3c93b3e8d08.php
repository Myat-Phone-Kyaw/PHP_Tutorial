<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laravel_Assignment_Quickstart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="<?php echo e(asset('fontawesome/css/all.min.css')); ?>" rel="stylesheet">
</head>

<body>
    <div class="container">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <nav class="navbar bg-light mb-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?php echo e(route('task.index')); ?>">Task List</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Task</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="<?php echo e(route('task.index')); ?>">Home</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
        </div>
        <div class="col-md-3"></div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>


</html><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/PHP_Tutorial/SCM_Frame_Laravel/resources/views/layouts/app.blade.php ENDPATH**/ ?>