<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<link rel="stylesheet" href="css/style.css">

<body>
    <?php
        require "connect.php";
        $postid_view = $_GET['postId'];
        $query = "SELECT * FROM posts WHERE id=$postid_view";
        $post = mysqli_query($db, $query);

        if (mysqli_num_rows($post) == 1) {
            foreach ($post as $row) {
                $title = $row['title'];
                $publish = $row['is_published'];
                $content = $row['content'];
                $create = $row['created_datetime'];
            }
        }
  ?>
    <div class="container">
        <div class="row">
            <dic class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Post Detail</div>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-1">
                            <?php echo '<b>' . $title . '</b>'; ?>
                        </div>
                        <div class="form-group mb-3">
                            <?php
                                if ($publish == 1) {
                                    echo 'Published at ' . $create;
                                } else {
                                    echo 'Unpublished';
                                }
                            ?>
                        </div>
                        <div class="form-group mb-3 content">
                            <?php echo $content; ?>
                        </div>
                        <div class="col-md-6"><a href="index.php" class="btn btn-secondary">Back</a></div>
                    </div>
                </div>
            </dic>
        </div>
    </div>





    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>