<?php
include(__DIR__ . '/./function.php');


$guest= isguest();

$error = false; 
$success = false;

if(isset($_SESSION['error'])){
    $error = $_SESSION['error'];
   unset($_SESSION['error']);
}
if(isset($_SESSION['success'])){
    $success= $_SESSION['success'];
    unset($_SESSION['success']);
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container jumbotron">
  <h2>Login Yourself</h2>
  <?php if($error){ ?>

    <div class="alert alert-danger"><?php echo $error; ?></div>
    
<?php } ?>

<?php  if($success){  ?>
 
 <div class="alert alert-success"><?php echo $success; ?></div>

<?php } ?>

  <form action="./server/login_server.php" method="POST">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</div>
</body>
</html>