<?php

	session_start();
	include('includes/config.php');
	include('includes/db.php');
	include('includes/functions.php');
	
	if (loggedIn()) {
    header("Location: myaccount.php");
    exit();
  	}
	
	if (isset($_POST['Login'])) {
		$email 		= mysqli_real_escape_string($db, $_POST['email']);
		$password 	= mysqli_real_escape_string($db, $_POST['password']);
		$query= "select * from users where email='$email' and password = '$password'";
		$result = $db->query($query);
		if ($row  = $result->fetch_assoc()) {
			if ($row['status'] == 1) {
				$_SESSION['user_email'] = $email;
					if (isset($_POST['rememeberme'])) {
						setcookie("user_email", $email, time()+60*5);
					}
				header("Location: myaccount.php");
				exit();
			}else{
				header("Location: index.php?err=".urlencode("The user account is not activated"));
				exit();
			}
		}else{
				header("Location: index.php?err=".urlencode("Wrong Email or Password"));
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

    <title>Login</title>

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
            <li class="active"><a href="index.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
    <h2>Login</h2>
    <?php if (isset($_GET['success'])) {?>
    	<div class="alert alert-success"><?php echo $_GET['success'];?></div>
    <?php }	?>
    <?php if (isset($_GET['err'])) {?>
    	<div class="alert alert-danger"><?php echo $_GET['err'];?></div>
    <?php }	?>
    <hr>
    <form action="index.php" method="POST" style="margin-top:35px">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name = "email"class="form-control" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" placeholder="Password">
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox" name="rememeberme"> Remember Me
    </label>
  </div>
  <button type="submit" name="Login" class="btn btn-default">Login</button>
  <a href="forgot_password.php">Forgot Password?</a>
</form>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>