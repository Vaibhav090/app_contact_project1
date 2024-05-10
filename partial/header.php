<?php

$detail = getUserDetail();


?>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#"><img src="<?php echo $image_directory_url . $detail['image']; ?>" width="30" height="30" class="d-inline-block align-top" alt=""></a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="http://localhost/app_project1/register.php">Home</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Contact
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="home.php">Add Contact</a></li>
                    <li><a href="contact_listing.php">Contact Listing</a></li>
                </ul>
            </li>
            <li><a href="logout.php" style="color:crimson;">LOGOUT</a></li>
        </ul>
    </div>
</nav>