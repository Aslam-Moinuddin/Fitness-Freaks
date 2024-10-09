<?php
include "config.php";
session_start();
if (isset($_GET['name']) && isset($_GET['subscription']) && isset($_GET['price'])) {
    $name=$_GET['name'];
    $subscription = $_GET['subscription'];
    $price=$_GET['price'];
} 
else {
  echo "Error: parameter are missing.";
  exit();
}
$query2 = "INSERT INTO billing (name,subscription,amount) VALUES ('$name','$subscription','$price')";
$result2 = mysqli_query($con, $query2);
if (!$result2) {
  die("Insertion query failed: " . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainer</title>
    <link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
    <link rel="manifest" href="../favicon/site.webmanifest">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../components/style.css">
    <style>
      body{
        background:#333333;
      }
      #preloader{
        background: #111112 url(../img/preloader1.gif) no-repeat center center;
        background-size: 35%;
        height: 100vh;
        width: 100%;
        position: fixed;
        z-index: 100;
      }
      .message-container {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #ffffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        z-index: 99;
        text-align: center;
      }
      .message-container p{
        color: green;
        font-size: 28px;
        
      }
    </style>
  </head>
  <body>
    <div id="preloader"></div>
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
        <a class="navbar-brand" href="#"><img src="../img/Fitness_Freaks-removebg-preview (2).png" width="70" height="70" alt=""> FitnessFreaks</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"   aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="../index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="coach.php">Trainer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="equipment.php">Equipment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="billing.php">billing</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="message-container">
      <p>Amount Charged successfully!</p>
      <a href="dashboard.php?" class="btn btn-primary">Go to Dashboard</a>
    </div>
    <script>
      var loader=document.getElementById("preloader");
      window.addEventListener("load",function(){
        setTimeout(function(){
            loader.style.display="none";
        },2000);
      });
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>

