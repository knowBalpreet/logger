<?php
  include('includes/config.php');
  include('includes/db.php');
  if (isset($_POST['send_my_password'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);

  $query = "select * from users where email='$email'";
  $result = $db->query($query);

  if ($row = $result->fetch_assoc()) {
    $password = $row['password'];
    if (mail($email, "Your Password!!", "Your password is: $password", "From:balpreet.m23@gmail.com")) {
      header("Location:forgot_password.php?success=".urlencode("Your password has been sent to your registered email "));
      exit();
    }else{
      header("Location:forgot_password.php?err=".urlencode("Sorry we could not process your request at this time "));
      exit();
    }
  }else{
    header("Location:forgot_password.php?err=".urlencode("Sorry no user exists with provided email address! "));
      exit();
      }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Forgot Password</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
        
    <form action="forgot_password.php" method="POST" style="margin-top:35px">
    <h2>Retrieve Password</h2>
        <?php if (isset($_GET['success'])) {?>
      <div class="alert alert-success"><?php echo $_GET['success'];?></div>
    <?php } ?>
    <?php if (isset($_GET['err'])) {?>
      <div class="alert alert-danger"><?php echo $_GET['err'];?></div>
    <?php } ?>
    <hr>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name = "email"class="form-control" placeholder="Email" required>
  </div>

  <button type="submit" name="send_my_password" class="btn btn-default">Send My Password</button>
    <a href="index.php" class="btn btn-danger">Cancel</a>
</form>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>