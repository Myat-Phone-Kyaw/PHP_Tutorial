<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial_06</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container">
  <form action="<?php $_PHP_SELF ?>" method="post" enctype="multipart/form-data">
    <span class="input">Folder name: <input type="text" name="folder-name" placeholder="filename" maxlength="15"></span> 
    <span class="input">Image: <input type="file" name="images[]" multiple></span> 

    <button type="submit" name="submit">Upload</button>
  </form>
  </div>
</body>
</html>


<?php

if(isset($_POST['submit'])){
  $folder = $_POST['folder-name'];
  $create = mkdir("".$folder);

  
  //echo "folder: " . $folder;

  foreach($_FILES['images']['tmp_name'] as $key => $value){
      echo $_FILES['images']['name'][$key];

    move_uploaded_file($_FILES['images']['tmp_name'][$key],
    $folder.'/'.$_FILES['images']['name'][$key]);
    
    $img_name = $_FILES['images']['name'][$key];
    echo "<br><img src =".$folder.'/'.$img_name.">";

    echo '<form action="index.php" method="post">';
    echo '<button type="submit" name="delete">Delete</button>';
    if(isset($_POST['delete'])){
      $img = $folder . '/' . $_FILES['images']['name'][$key];
      unlink($img);
    }
    echo '</form';

    //$del_img = $_FILES['images']['tmp_name'][$key];
    //$path = $folder.'/'.$_FILES['images']['tmp_name'][$key];
  }
}
?>