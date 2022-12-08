<?php
session_start();
session_destroy();

if (isset($_POST['logout'])) {
    unset($_SESSION['user']);
    unset($_SESSION['pass']);
}

header('location: index.php');
?>