<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<link rel="stylesheet" href="css/style.css">

<body>
    <?php
        require "connect.php";
        $titleError = '';
        $contentError = '';
        $title = '';
        $content = '';

        if (isset($_POST['create-btn'])) {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $publish = $_POST['publish'];

            if (empty($title)) {
                $titleError = "Enter post title";
            }

            if (empty($content)) {
                $contentError = "Enter your content";
            }


            if (!empty($title) && !empty($content)) {
                $query = "INSERT INTO `batch_06`.`posts`(title, content, is_published, created_datetime) VALUES('$title', '$content', '$publish', current_timestamp())";
                mysqli_query($db, $query);
                header('location: index.php');
            }

        }

    ?>
    
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Create Post</div>
                    </div>
                    <div class="card-body">
                        <form action="create.php" method="POST">
                            <div class="form-group mb-3">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter post title" value="<?php echo $title ?>">
                                <span class="text-danger">
                                    <?php echo $titleError ?>
                                </span>
                            </div>
                            <div class="form-group mb-3">
                                <label>Content</label>
                                <textarea name="content" class="form-control" placeholder="Content..." cols="30" rows="5"><?php echo $content; ?></textarea>
                                <span class="text-danger">
                                    <?php echo $contentError ?>
                                </span>
                            </div>
                            <div class="form-group mb-3">
                                <input type="hidden" name="publish" value="0">
                                <input type="checkbox" name="publish" value="1"> publish
                            </div>
                            
                            <div class="row">
                                <div class="col-md-11"><a href="index.php" class="btn btn-secondary">Back</a></div>
                                <div class="col-md-1"><button type="submit" name="create-btn" class="btn btn-primary">Create</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>