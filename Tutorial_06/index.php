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
    <?php
    $errorFolder = "";
    $errorImage = "";
    $successMsg = "";
    $validExtError = "";
    $getFolder = "";
    if (isset($_POST["upload"])) {
        $getFolder = $_POST["folder"];
        $getImage = $_FILES['image']['name'];
        $getTmp = $_FILES['image']['tmp_name'];
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
            } else {
                $validExtError = "Choose Image File";
            }
        }
    }
    ?>
    <div class="container">

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="group">
                Folder Name: <input type="text" name="folder" placeholder="Folder Name" value="<?php echo $getFolder; ?>" maxlength="15"><br>
                <caption>
                    <?php echo $errorFolder; ?>
                </caption>
            </div>
            <div class="form-group">
                Choose File: <input type="file" name="image"><br>
                <caption>
                    <?php echo $errorImage; ?>
                </caption>
            </div>
            <div>
                <button type="submit" name="upload" class="upload">Upload</button>
            </div><br>
            <h1>
                <?php echo $successMsg; ?>
            </h1>
            <h2>
                <?php echo $validExtError; ?>
            </h2>
        </form>
    </div>
    <table>
        <?php
        $dirs = array_filter(glob("*"), 'is_dir');
        foreach ($dirs as $dir) {
            $images = glob($dir . DIRECTORY_SEPARATOR . "*.{jpg,png,jpeg,JPG,PNG,JPEG}", GLOB_BRACE);
            foreach ($images as $image) {
                echo "<tr>";
                echo "<td>";
                echo '<img class="images" src="' . $image . '"><br>';
                echo "</td>";
                echo "<td><h3>" . $image . "</h3></td>";
                echo "<td>";
        ?>
        <button><a href="delete.php?photo=<?php echo $image; ?>" class="delete" onclick="alert('Are You Sure You Want To Delete?')">Delete</a></button>
        <?php
                echo "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>

</body>

</html>