<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_06</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    $errorFolder = "";
    $errorImage = "";
    $errorSize = "";
    $successMsg = "";
    $validExtError = "";
    $getFolder = "";
    $fileSize = "";
    if (isset($_POST["upload"])) {
        $getFolder = $_POST["folder"];
        $getImage = $_FILES['image']['name'];
        $getTmp = $_FILES['image']['tmp_name'];
        $fileSize = $_FILES['image']['size'];
        $allowExtension = ["jpg", "png", "jpeg"];
        $splitImageName = explode(".", $getImage);
        $imageExtension = strtolower(end($splitImageName));
        if (!in_array($imageExtension, $allowExtension)) {
            $errorImage = "Choose .jpg, .png, .jpeg file";
        }
        if (empty($getFolder) || empty($getImage)) {
            if (empty($getFolder)) {
                $errorFolder = "Enter Folder Name!!!";
            }
            if (empty($getImage)) {
                $errorImage = "Choose Image!!!";
            }
        } elseif (isset($getFolder) && isset($getImage)) {
            if (!is_dir($getFolder)) {
                mkdir($getFolder);
            }
            $getImagePath = $getFolder . '/' . $getImage;
            $allowExtension = ["jpg", "png", "jpeg"];
            $splitImageName = explode(".", $getImage);
            $imageExtension = strtolower(end($splitImageName));
            if (in_array($imageExtension, $allowExtension)) {
                move_uploaded_file($getTmp, $getImagePath);
                $successMsg = "Image Uploaded Successfully";
            }
        }
    }
    ?>
    <div class="container">

        <form method="POST" enctype="multipart/form-data" class="form">
            <div class="group">
                Folder Name: <input type="text" name="folder" placeholder="Folder Name" value="<?php echo $getFolder; ?>" maxlength="15"><br>
                <caption class="cap">
                    <p class="text-danger">
                        <?php echo $errorFolder; ?>
                    </p>
                </caption>
            </div>
            <div class="form-group">
                Choose File: <input type="file" name="image"><br>
                <caption class="cap">
                    <p class="text-danger">
                        <?php echo $errorImage; ?>
                        <?php echo $errorSize; ?>
                    </p>
                </caption>
            </div>
            <div>
                <button type="submit" name="upload" class="upload button">Upload</button>
            </div><br>
            <h1 class="text-success">
                <?php echo $successMsg; ?>
                <?php echo $fileSize; ?>
            </h1>
            <h2 class="text-danger">
                <?php echo $validExtError; ?>
            </h2>
        </form>
    </div>
    <table class="table">
        <?php
        $dirs = array_filter(glob("*"), 'is_dir');
        foreach ($dirs as $dir) {
            $images = glob($dir . DIRECTORY_SEPARATOR . "*.{jpg,png,jpeg,JPG,PNG,JPEG}", GLOB_BRACE);
            foreach ($images as $image) {
                echo "<tr>";
                echo '<td class="td">';
                echo '<img class="images" src="' . $image . '"><br>';
                echo "</td>";
                echo '<td class="td"><h3>" . $image . "</h3></td>';
                echo "<td>";
        ?>
        <button class="button"><a href="delete.php?photo=<?php echo $image; ?>" class="delete" onclick="alert('Are You Sure You Want To Delete?')">Delete</a></button>
        <?php
                echo "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>