<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<link rel="stylesheet" href="css/style.css">

<body>
    <?php
        require "connect.php";

        if (isset($_GET['postId'])) {
            $postid_to_update = $_GET['postId'];

            $query = "SELECT * FROM posts WHERE id=$postid_to_update";
            $post = mysqli_query($db, $query);

            if (mysqli_num_rows($post) == 1) {
                foreach ($post as $row) {
                    $titleId = $row['id'];
                    $title = $row['title'];
                    $content = $row['content'];
                }
            }
        }

        //Update
        if (isset($_POST['update-btn'])) {
            $post_Id = $_POST['post_id'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $publish = $_POST['publish'];

            $query = "UPDATE posts SET title='$title', content='$content', is_published='$publish', updated_datetime=current_timestamp() WHERE id=$post_Id";
            mysqli_query($db, $query);
            header('location: index.php');
        }

    ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Post</div>
                    </div>
                    <div class="card-body">
                        <form action="edit.php" method="POST">
                            <input type="hidden" name="post_id" value="<?php echo $titleId; ?>">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" placeholder="name@example.com" class="form-control" value="<?php echo $title; ?>">
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="content" class="form-control"><?php echo $content ?></textarea>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="publish" value="0">
                                <input type="checkbox" name="publish" value="1"> publish
                            </div>
                            <div class="row">
                                <div class="col-md-11"><a href="index.php" class="btn btn-secondary">Back</a></div>
                                <div class="col-md-1"><button type="submit" name="update-btn" class="btn btn-primary">Update</button></div>
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