<?php

include(__DIR__ . '/./function.php');
$url = 'http://localhost/app_project1/login.php';

$authenticated = isAuthenticated();

if ($authenticated == false) {

    redirect($url);
}

$count = getTotalUser();


$page =1;
if(isset($_GET['page'])){
    $page = $_GET['page'];   
}
$limit = 1;
$num_of_pages =($count/$limit);

$offset = (($page -1)* $limit);
$contactList = getContactList($limit,$offset);

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
    <ul class="pagination">
  <?php for ($i=0; $i < $num_of_pages ; $i++) { ?>
    <li><a href="contact_listing.php?page=<?php echo $i + 1;?>"><?php echo $i + 1; ?></a></li>
  <?php }?>
</ul>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contactList as $key => $data) { ?>
                    <tr>
                        <td><?php echo $data['email']; ?></td>
                        <td><?php echo $data['name']; ?></td>
                        <td><?php echo $data['phone']; ?></td>
                        <td><?php echo $data['address']; ?></td>
                        <td>
                            <img src="<?php echo $image_directory_url . $data['image']; ?>" class="img img-thumbnail" width="75px" height="75px" />
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>


    <?php
    include(__DIR__ . '/partial/footer.php');
    ?>
    <?php
    include(__DIR__ . '/partial/footer-script.php');

    ?>
</body>

</html>