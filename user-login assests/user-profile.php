<?php
include "config.php";

session_start();
// Check if the email is set in the URL parameters
if (isset($_GET['email'])) {
    // Retrieve the email from the URL parameter
    $email = $_GET['email'];
    // $trainerName=$_GET['trainerName']; 
} else {
    // If email is not set, display an error message or redirect to another page
    echo "Error: Email ID parameter is missing.";
    exit(); // Stop executing the script further
}

// Fetch user details from the database
$query = "SELECT * FROM member WHERE email='$email'";
$result = mysqli_query($con, $query);

if (!$result) {
    die("Database query failed: " . mysqli_error($con));
}

// Fetch user details if the query was successful
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $dob = $row['dob'];
    $phone = $row['phone'];
    $subscription = $row['subscription'];
    $trainerName = $row['trainer'];
} else {
    // User not found in the database
    echo "Error: User not found.";
    exit(); // Stop executing the script further
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
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
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><img src="../img/Fitness_Freaks-removebg-preview (2).png" width="70" height="70" alt=""> FitnessFreaks</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"   aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="../index.html">Home</a>
      </li>
    </ul>
  </div>
</nav>
<!-- User details form -->
<div class="container mt-4">
  <form>
    <div class="form-group">
      <label for="name">Full Name</label>
      <input type="text" class="form-control" id="name" value="<?php echo $name; ?>" readonly>
    </div>
    <div class="form-group">
      <label for="dob">Date of Birth</label>
      <input type="text" class="form-control" id="dob" value="<?php echo $dob; ?>" readonly>
    </div>
    <div class="form-group">
      <label for="phone">Phone No</label>
      <input type="text" class="form-control" id="phone" value="<?php echo $phone; ?>" readonly>
    </div>
    <div class="form-group">
      <label for="subscription">Subscription</label>
      <input type="text" class="form-control" id="subscription" value="<?php echo $subscription; ?>" readonly>
    </div>
    <div class="form-group">
      <label for="trainerName">Trainer Name</label>
      <input type="text" class="form-control" id="trainerName" value="<?php echo $trainerName; ?>" readonly>
    </div>
  </form>
</div>
<script>
  var loader=document.getElementById("preloader");
  window.addEventListener("load",function(){
      setTimeout(function(){
          loader.style.display="none";
      },2000);
  });
</script>
<!-- Bootstrap JS dependencies -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
