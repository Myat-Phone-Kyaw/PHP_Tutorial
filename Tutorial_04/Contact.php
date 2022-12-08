<?php
session_start();

if (!isset($_SESSION['email']))
    header('location: index.php');

include('links.php');
?>

<h1>Contact Page</h1>