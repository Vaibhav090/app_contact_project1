<?php

session_start();

include('connection.php');
$base_url = 'http://localhost/app_project1';
$image_directory_url = $base_url . '/uploads/';

function getUserDetail($id = null)
{
    global $connection;

    if (!$id) {
        $id = $_SESSION['loggedInUserId'];
    }
    $query = "SELECT * FROM `user` WHERE `id` = $id";
    $result =  mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    return $row;
}


function getUserList($id = null)
{
    global $connection;
    global $table;
    if ($id) {

        $query = "SELECT * FROM `user` WHERE id = $id";

        $result =  mysqli_query($connection, $query);

        $row = mysqli_fetch_assoc($result);

        return $row;
    }
}
function redirect($url = false)
{

    if ($url) {
        header('location:' . $url);
        exit;
    }
}

function logout()
{
    global $base_url;
    session_start();
    session_destroy();
    redirect($base_url . '/login.php');
}

function getContactList($limit = 1, $offset = 0)
{
    global $connection;

    $id = $_SESSION['loggedInUserId'];
    $query = "SELECT * FROM `contact` WHERE `author_id` = $id LIMIT $limit OFFSET $offset";

    $result =  mysqli_query($connection, $query);
    $output = [];
    while ($row = mysqli_fetch_assoc($result)) {

        $output[] = $row;
    };

    return $output;
}
function getTotalUser()
{
    global $connection;

    $id = $_SESSION['loggedInUserId'];

    $query = "SELECT * FROM `contact` WHERE author_id = $id";

    $data = mysqli_query($connection, $query);

    $row = mysqli_num_rows($data);
    return $row;
}
function isAuthenticated()
{

    if (!isset($_SESSION['loggedInUserId']) || empty($_SESSION['loggedInUserId'])) {

        return false;
    }
    return true;
}
function isguest(){
    global $base_url;

    if (isset($_SESSION['loggedInUserId']) || !empty($_SESSION['loggedInUserId'])) {
        redirect($base_url.'/home.php');
    }
}

