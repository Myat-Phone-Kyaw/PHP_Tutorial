<?php require "connect.php"; ?>

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<link rel="stylesheet" href="css/style.css">

<body>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <a href="create.php" class="btn btn-primary">Create</a>
        <a href="weekly.php" class="btn btn-primary">Graph</a>
        <div class="card mt-3">
          <div class="card-header">
            <div class="card-title">Post List</div>
          </div>
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Content</th>
                  <th>Is Published</th>
                  <th>Created Date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $query = "SELECT * FROM posts";
                    $result = mysqli_query($db, $query);

                    foreach ($result as $row) {
                ?>
                    <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['content']; ?></td>
                    <td>
                        <?php 
                            if($row['is_published']==1){
                            echo 'Published';
                            }else{
                            echo 'Unpublished';
                            }
                        ?>
                    </td>
                    <td><?php echo $row['created_datetime'];?></td>
                    <td>
                        <a href="view.php?postId=<?php echo $row['id']; ?>" class="btn btn-info">View</a>
                        <a href="edit.php?postId=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a>
                        <a href="index.php?postId_to_delete=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>
                    </td>
                    </tr>
                <?php
                    }
                ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Delete -->
    <?php
        if(isset($_GET['postId_to_delete'])){
            $postId_to_delete = $_GET['postId_to_delete'];

            $query = "DELETE FROM posts WHERE id=$postId_to_delete";
            $delete = mysqli_query($db, $query);
            header('location: index.php');
        }
    ?>




  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>