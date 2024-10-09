<?php
include "config.php";
session_start();
if(isset($_GET['email'])){
  $email=$_GET['email'];
}
else{
  echo "Error: missing email id ";
  exit();
}

$query = "SELECT DISTINCT name FROM subscription";
$result = mysqli_query($con, $query);
$name = array();
if ($result && mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
      $name[] = $row['name'];
  }
}
$result = mysqli_query($con, $query);
if (!$result) {
    die("Database query failed: " . mysqli_error($con));
}

if (isset($_REQUEST["submit"])) {  
  $name = $_REQUEST["fullname"];
  $dob = $_REQUEST["dob"];
  $phone = $_REQUEST["phone"];
  $subID = $_REQUEST["name"];
  $ins = "INSERT INTO member (name,dob,phone,subscription,email) VALUES ('$name','$dob','$phone','$subID','$email')";
  $query1 = mysqli_query($con, $ins);
  header("Location: coach.php?subID=" . urlencode($subID) ."&name=" . urlencode($name) ."&email=" . urlencode($email));
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscribers</title>
    <link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
    <link rel="manifest" href="../favicon/site.webmanifest">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../components/style.css">
    <style>
      #preloader{
        background: #fff url(../img/preloader2.gif) no-repeat center center;
        background-size: 35%;
        height: 100vh;
        width: 100%;
        position: fixed;
        z-index: 100;
      }
    </style>
  </head>
  <body>
    <div id="preloader"></div>
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#"><img src="../img/Fitness_Freaks-removebg-preview (2).png" width="70" height="70" alt=""> FitnessFreaks</a>
    </nav>
    <!-- form start -->
    <div class="form-container">
      <form method="POST">
        <div class="form-group">
          <label for="inputAddress">Full Name</label>
          <input type="text" name="fullname" class="form-control" id="inputAddress" placeholder="Full Name" required>
        </div>
        <div class="form-group">
          <label for="inputAddress2">Date of Birth</label>
          <input type="text" name="dob" class="form-control" id="inputAddress2" placeholder="Date of Birth" required>
        </div>
        <div class="form-group">
          <label for="inputAddress2">Phone</label>
          <input type="text" name="phone" class="form-control" id="inputAddress2" placeholder="Phone" required>
        </div>
        <div class="form-group">
          <label for="inputAddress2">Subscription</label>
          <select name="name" class="form-control" style="padding:0px;">
            <option value="">Select Subscription</option>
            <?php
              foreach ($name as $name) {
                echo "<option value=\"$name\">$name</option>";
              }
            ?>
          </select>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Save</button>
      </form>
    </div>
  <!-- form end -->
    <script>
      var loader=document.getElementById("preloader");
      window.addEventListener("load",function(){
          setTimeout(function(){
              loader.style.display="none";
          },2000);
      });
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>