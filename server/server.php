<?php


include('../function.php');

$url = 'http://localhost/app_project1/register.php';

$error = [];

if (empty($_POST['name'])) {

    $error[] = 'Name is required';
}
if (empty($_POST['email'])) {

    $error[] = 'Email is required';
}
if (empty($_POST['password'])) {

    $error[] = 'Password is required';
}
if (empty($_POST['phone'])) {

    $error[] = 'Phone is required';
}
if (empty($_POST['address'])) {

    $error[] = 'Address is required';
}

$unique_name = false;

if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {

    $tmp = $_FILES['image']['tmp_name'];
    $name = $_FILES['image']['name'];
    $path = pathinfo($name);

    $extension = $path['extension'];
    $file_name = $path['filename'];
    $unique_name = time() . '.' . $extension;
    $destination = '../uploads/' . $unique_name;
    $is_uploaded = move_uploaded_file($tmp, $destination);
}


if (count($error) == 0) {

    $id = $_SESSION['loggedInUserId'];
    $name = $_POST['name'];
    $email =  $_POST['email'];
    $password = $_POST['password'];
    $ph = $_POST['phone'];
    $add = $_POST['address'];
    $image = $unique_name;

    $_SESSION['data'][] = ['name' => $name, 'email' => $email, 'password' => $password, 'phone' => $ph, 'address' => $add, 'image' => $image];
    $query = "INSERT INTO `user` (`name`, `email`, `password`, `phone`, `address`, `image`) VALUES ('$name', '$email', '$password', '$ph', '$add', '$image')";
    $result = mysqli_query($connection, $query);

    if ($result) {

        $_SESSION['success'] = 'Registered Successfully!';
    } else {

        $_SESSION['error'] = 'Something went wrong';
    }
} else {

    $_SESSION['error'] = $error;
}
header('location:' . $url);


exit;
