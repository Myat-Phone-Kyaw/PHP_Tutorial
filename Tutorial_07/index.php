<?php
require_once './lib/phpqrcode/qrlib.php';

$path = 'images/';
if (!is_dir($path)) {
    mkdir($path);
}

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $file = $path.'/'.$name.'.png';

    QRcode::png($name, $file, 'H', 8, 4);

    echo '<img src="'.$file.'" class="qr">';
}
?>

<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/style.css">
<h1 class="ttl">QR Code Generator</h1>
<div class="container">
    <form method="post" enctype="multipart/form-data" class="form">
        <div class="form-div">
            <label class="label">Enter the data: </label>
            <input class="input" type="text" name="name" placeholder="File Name">
        </div>
        <div class="div-center">
        <button type="submit" name="submit" class="upload">Upload</button>
        </div>
    </form>
</div>