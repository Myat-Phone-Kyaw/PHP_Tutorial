<?php
    $server = 'localhost';
    $username = 'root';
    $password = 'root';
    $dbname = "batch_06";
    $db = mysqli_connect($server, $username, $password, $dbname);

    if (!$db == true) {
        die('Error: ' . mysqli_connect_error($db));
    }

    $sql = "CREATE TABLE `posts` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `title` varchar(255) NOT NULL,
            `content` text(255) DEFAULT NULL,
            `is_published` boolean,
            `created_datetime` timestamp DEFAULT CURRENT_TIMESTAMP,
            `updated_datetime` timestamp DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;";

mysqli_query($db, $sql);

?>