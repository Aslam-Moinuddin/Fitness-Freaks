<?php
include "config.php";
session_start();
if (isset($_GET['subID']) && isset($_GET['name']) && isset($_GET['email'])) {
    $subID = $_GET['subID'];
    $name=$_GET['name'];
    $email=$_GET['email'];
} else {
    echo "Error: Subscription ID parameter is missing.";
    exit();
}

$query1 = "SELECT DISTINCT experience FROM coach";
$result1 = mysqli_query($con, $query1);
$experience = array();
if ($result1 && mysqli_num_rows($result1) > 0) {
  while ($row = mysqli_fetch_assoc($result1)) {
      $experience[] = $row['experience'];
  }
}
$result1 = mysqli_query($con, $query1);
if (!$result1) {
    die("Database query failed: " . mysqli_error($con));
}

if (isset($_REQUEST["submit"])) {
  $SUBtype = $_REQUEST["subscription-type"];
  $experience = $_REQUEST["experience"];
  $query = "SELECT * FROM coach WHERE subscription='$subID' AND experience='$experience'";
  $result = mysqli_query($con, $query);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coach</title>
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
      <a class="navbar-brand" href="#.php"><img src="../img/Fitness_Freaks-removebg-preview (2).png" width="70" height="70" alt=""> FitnessFreaks</a>
    </nav>
    <!-- form start -->
    <div class="form-container">
      <form method="get" action="coach.php">
        <input type="hidden" name="subID" value="<?php echo $subID; ?>">
        <input type="hidden" name="name" value="<?php echo $name; ?>">
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <div class="form-group">
          <label for="inputAddress">Subscription Type</label>
          <input type="text" name="subscription-type" class="form-control" id="inputSubscription" readonly value="<?php echo $subID; ?>">
        </div>
        <div class="form-group">
          <label for="inputAddress2">Trainer Level</label>
          <select name="experience" class="form-control" style="padding:0px;">
            <option value="">Select Level</option>
            <?php
              foreach ($experience as $exp) {
                echo "<option value=\"$exp\">$exp</option>";
              }
            ?>
          </select>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Search</button>
      </form>
      <?php
        if (isset($result) && mysqli_num_rows($result) > 0) {
          echo '<div class="container">';
          echo '<h2> Available Trainer Details</h2>';
          echo '<div class="row">';
          echo '<div class="col m-auto">';
          echo '<div class="card mt-5">';
          echo '<table class="table table-bordered">';
          echo '<tr>';
          echo '<td> Trainer ID </td>';
          echo '<td> Trainer Name </td>';
          echo '<td> Level </td>';
          echo '<td> Subscription </td>';
          echo '<td> Add  </td>';
          echo '</tr>';
          while($row=mysqli_fetch_assoc($result)) {
            $trainerID = $row['id'];
            $trainerName = $row['name'];
            $trainerLevel = $row['experience'];
            $sub = $row['subscription'];
            echo '<tr>';
            echo "<td>$trainerID</td>";
            echo "<td>$trainerName</td>";
            echo "<td>$trainerLevel</td>";
            echo "<td>$sub</td>";
            echo '<td><a href="trainer.php?trainerName=' . $trainerName . ' &name='.$name.'&email='. $email.'" class="btn btn-pencil">Book Trainer</a></td>';
            echo '</tr>';
          }
          echo '</table>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
        } 
      ?>
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
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
