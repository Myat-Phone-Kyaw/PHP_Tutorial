<?php
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email == "myatphonekyaw5505@gmail.com" && $password == "123") {
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        header('location: links.php');
    } else
        echo "You are not a valid user.";
}
?>