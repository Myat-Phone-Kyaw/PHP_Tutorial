<?php
    $server = 'localhost';
    $username = 'root';
    $password = 'root';
    $dbname = "PostList";
    $db = mysqli_connect($server, $username, $password, $dbname);

    if (!$db == true) {
        die('Error: ' . mysqli_connect_error($db));
    }
?>