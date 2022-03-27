<?php
date_default_timezone_set('Asia/kolkata');
include('database.php');

if (!isset($_SESSION['Id'])) {
  echo "<script>window.location.href='index.php';</script>";
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <title>Vishesh Mittal</title>

  <style type="text/css">
    .Absolute-Center {
      margin: auto;
      position: absolute;
      top: 0;
      left: 0;
      bottom: 0;
      right: 0;
      margin-top: 400px;
    }

    .Absolute-Center.is-Responsive {
      width: 100%;
      height: 60%;
      min-width: 200px;
      max-width: 900px;
      padding: 40px;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="dashboard.php">Vishesh Mittal</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Session_details.php">Session Details</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="uploads.php">Upload Documents</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://thumbs.dreamstime.com/b/welcome-25626493.jpg" class="d-block w-100" alt="..." width="100%" height="360px">
      </div>
    </div>
  </div>

  <div class="Absolute-Center is-Responsive">

    <table class="table">
      <h3 class="text-center">Session Details</h3>
      <tr>
        <th scope="col">Name</th>
        <td><?= $_SESSION['name'] ?></td>
      </tr>
      <tr>
        <th scope="col">Username</th>
        <td><?= $_SESSION['email'] ?></td>
      </tr>
      <tr>
        <th scope="col">Age</th>
        <td><?= $_SESSION['age'] ?></td>
      </tr>
    </table>
  </div>

</body>

</html>