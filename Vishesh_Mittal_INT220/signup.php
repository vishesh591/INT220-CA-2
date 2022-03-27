<?php 
date_default_timezone_set('Asia/kolkata');
include('database.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel = "stylesheet" href  = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<title>Sign Up</title>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="Absolute-Center is-Responsive">
      <div id="logo-container"><img src="uploads/images/user.jpg" width="200px" height="200px"></div><br>
      <div class="col-sm-12 col-md-10 col-md-offset-1">
        <h3 class="text-center" style="color: #000;">Sign Up</h3><br>
        <form action="" method="post" id="loginForm">
          <div class="form-group input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input class="form-control" type="text" name='name' placeholder="Name" required>
          </div>
          <div class="form-group input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input class="form-control" type="email" name='email' placeholder="email" required>
          </div>
          <div class="form-group input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input class="form-control" type="date" name='age' placeholder="age" required>
          </div>
          <div class="form-group input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input class="form-control" type="password" name='password' placeholder="password" required>     
          </div>
          <div class="form-group">
            <button type="submit" name="signup" class="btn btn-success btn-block">Sign Up</button>
          </div>
          <div class="form-group text-center">
            <a href="index.php">Login</a>
          </div>
        </form>        
      </div>  
    </div>    
  </div>
</div>

	<script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>


<?php

if (isset($_POST['signup'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $age = $_POST['age'];
  $password = md5($_POST['password']);

  $check = "SELECT * from signup where email = '$email' limit 1";
  $res = mysqli_query($con,$check);

  $count = mysqli_num_rows($res);

  if ($count == 1) {
    echo "<script>alert('Email address is already registered.');window.location.href='signup.php';</script>";
  } else {
    $insert = "INSERT into signup (name,email,age,password) values ('$name','$email','$age','$password')";
    $result = mysqli_query($con,$insert);

    if ($result) {
      echo "<script>alert('Account created successfully. Please login now');window.location.href='index.php';</script>";
    } else {
      echo "<script>alert('Error. Something went wrong.');window.location.href='signup.php';</script>";
    }

  }
}

?>