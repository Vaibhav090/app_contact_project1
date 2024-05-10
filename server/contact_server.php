<?php


include(__DIR__ . '/../function.php');

$url = 'http://localhost/app_project1/home.php';

$error = [];

if (empty($_POST['email'])) {

    $error[] = 'Email is required';
}
if (empty($_POST['name'])) {

    $error[] = 'Name is required';
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

    $email =  $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $ph = $_POST['phone'];
    $add = $_POST['address'];
    $image = $unique_name;
    $id = $_SESSION['loggedInUserId'];

    $query = "INSERT INTO `contact` (`email`,`name`,`phone`,`address`,`image`,`author_id`) VALUES ('$email','$name', '$ph', '$add', '$image','$id')";
    $result = mysqli_query($connection, $query);

    if ($success) {

        $_SESSION['success'] = 'Registered Successfully!';
    } else {

        $_SESSION['error'] = 'Something went wrong';
    }
} else {

    $_SESSION['error'] = $error;
}
header('location:' . $url);


exit;
