<?php
date_default_timezone_set('Asia/kolkata');
include('database.php');

if (!isset($_SESSION['Id'])) {
  echo "<script>window.location.href='index.php';</script>";
}

$Id = $_SESSION['Id'];
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
    <h3 class="text-center">Upload Documents</h3>
    <form method="post" enctype="multipart/form-data">
      <div class="form-group">
        <input type="file" class="form-control" name="doc" required>
      </div>
      <div class="form-group">
        <input type="submit" class="form-control btn btn-success" name="submit">
      </div>
    </form>
    <hr>
    <table class="responsive">
      <thead>
        <tr>
          <th>Date</th>
          <th>Download</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $fetch = "SELECT * from docs where uId = '$Id' ORDER BY id desc";
        $res = mysqli_query($con, $fetch);
        while ($row = mysqli_fetch_array($res)) {
          $date = strtotime($row['date']);
        ?>
          <tr>
            <td><?= date('d-M-Y', $date) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td><a target="_blank" href="uploads/<?= $row['doc_name'] ?>">View</a></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

</body>

</html>

<?php

if (isset($_POST['submit'])) {

  $uid = $_SESSION['Id'];

  $fileName = $_FILES['doc']['name'];
  $fileTmpName = $_FILES['doc']['tmp_name'];

  $fileSize = $_FILES['doc']['size'];

  $fileError = $_FILES['doc']['error'];
  $fileType = $_FILES['doc']['type'];

  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));


  if ($fileError === 0) {
    if ($fileSize < 5000000) {
      $fileNameNew = uniqid('', true) . "." . $fileActualExt;
      $fileDestination = 'uploads/' . $fileNameNew;
      move_uploaded_file($fileTmpName, $fileDestination);
      $insert = "INSERT into docs (uId,doc_name) values ('$uid','$fileNameNew')";
      $result = mysqli_query($con, $insert);
      if ($result) {
        echo "<script>alert('File Uploaded Successfully.');window.location.href='uploads.php'</script>";
      } else {
        echo "<script>alert('Something went wrong');window.location.href='uploads.php'</script>";
      }
    } else {
      echo "<script>alert('File size is too high');window.location.href='uploads.php'</script>";
    }
  } else {
    echo "<script>alert('Error. Something went wrong.');window.location.href='uploads.php'</script>";
  }
}

?>