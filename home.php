<?php

include(__DIR__ . '/./function.php');

$url = 'http://localhost/app_project1/login.php';

$authenticated = isAuthenticated();

if ($authenticated == false) {

    redirect($url);
}

$success = false;
if (isset($_SESSION['success'])) {
    $success = $_SESSION['success'];
    unset($_SESSION['success']);
}
$error = false;
if (isset($_SESSION['error'])) {
    $error  = $_SESSION['error'];
    unset($_SESSION['error']);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include(__DIR__ . '/partial/head.php');

    ?>
</head>

<body>
    <?php
    include(__DIR__ . '/partial/header.php');

    ?>

    <div class="main-body">
        <?php if ($error) { ?>
            <?php foreach ($error as $key => $value) { ?>
                <div class="alert alert-danger"><?php echo $value; ?></div>
            <?php } ?>
        <?php } ?>

        <?php if ($success) {  ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php } ?>
        <form action="./server/contact_server.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
            </div>
            <div class="form-group">
                <label for="namel">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone">
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" placeholder="Address" name="address">
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control" id="image" placeholder="Choose File" name="image">
            </div>
            <div class="checkbox">
                <label><input type="checkbox" name="remember"> Remember me</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>


    <?php
    include(__DIR__ . '/partial/footer.php');
    ?>
    <?php
    include(__DIR__ . '/partial/footer-script.php');

    ?>
</body>

</html>