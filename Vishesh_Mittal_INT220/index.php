<?php
date_default_timezone_set('Asia/kolkata');
include('database.php');

if (isset($_SESSION['Id'])) {
  echo "<script>window.location.href='dashboard.php';</script>";
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">

  <title>Sign In</title>
</head>

<body>

  <div class="container">
    <div class="row">
      <div class="Absolute-Center is-Responsive">
        <div id="logo-container"><img src="uploads/images/user.jpg" width="200px" height="200px"></div><br>
        <div class="col-sm-12 col-md-10 col-md-offset-1">
          <h3 class="text-center" style="color: #000;">Login</h3><br>
          <form action="" method="post" id="loginForm">
            <div class="form-group input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input class="form-control" type="email" name='email' placeholder="email" required>
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input class="form-control" type="password" name='password' placeholder="password" required>
            </div>
            <div class="form-group">
              <button type="submit" name="login" class="btn btn-success btn-block">Login</button>
            </div>
            <div class="form-group text-center">
              <a href="signup.php">Sign Up</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>

</html>

<?php

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $check = "SELECT * from signup where email = '$email' and password = '$password' limit 1";
  $res = mysqli_query($con, $check);

  $count = mysqli_num_rows($res);

  if ($count == 1) {
    $rows = mysqli_fetch_array($res);
    $Id = $rows['id'];
    $name = $rows['name'];
    $email = $rows['email'];
    $age = $rows['age'];

    $_SESSION['Id'] = $Id;
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    $_SESSION['age'] = $age;
    echo "<script>window.location.href='dashboard.php';</script>";
  } else {
    echo "<script>alert('Email address and password is wrong.');window.location.href='index.php';</script>";
  }
}

?>