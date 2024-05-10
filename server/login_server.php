<?php

include(__DIR__ . '/../function.php');

$error = [];
$url = 'http://localhost/app_project1/home.php';

if (empty($_POST['email'])) {
    $error[] = 'Email is required';
}

if (empty($_POST['password'])) {
    $error[] = 'Password is required';
}

if (count($error) == 0) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$password'";
    $result = mysqli_query($connection, $query);

    $total_count = mysqli_num_rows($result);

    if ($total_count > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['loggedInUserId'] = $row['id'];
    } else {

        $error[] = 'Invalid Information';
        $_SESSION['error'] = $error;
        $url = 'http://localhost/app_project1/login.php';
    }
} else {
    $_SESSION['error'] = $error;
}

header('location:' . $url);
exit;
