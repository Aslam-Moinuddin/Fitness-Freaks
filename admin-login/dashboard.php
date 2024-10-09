<?php
include 'config.php';
$sql = 'SELECT * FROM register';
$query = mysqli_query($con, $sql);
$num_rows = $query->num_rows;
$sql1 = 'SELECT * FROM coach';
$query1 = mysqli_query($con, $sql1);
$num_rows1 = $query1->num_rows;
$sql2 = 'SELECT * FROM equipment';
$query2 = mysqli_query($con, $sql2);
$num_rows2 = $query2->num_rows;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | FitnessFreaks</title>
    <link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
    <link rel="manifest" href="../favicon/site.webmanifest">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        #preloader{
            background: #111112 url(../img/preloader1.gif) no-repeat center center;
            background-size: 35%;
            height: 100vh;
            width: 100%;
            position: fixed;
            z-index: 100;
        }
        body{
            background:#000;
        }
        /* CSS styles */
        .grid-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px; /* Increased gap between cards */
            padding: 20px;
        }
        
        .card {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #ccc; /* Added border */
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); /* Decreased box shadow */
            transition: transform 0.3s ease;
            height: 200px; /* Increased height of each card */
        }
        
        .card:hover {
            transform: scale(1.05);
        }
        
        .row-count {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            text-align: center;
            margin: 0;
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
    <!-- Display the number of rows in a grid -->
    <div class="grid-container">
        <!-- Card 1 -->
        <div class="card">
            <p class="row-count">Total Members: <?php echo $num_rows; ?></p>
        </div>
        
        <!-- Card 2 -->
        <div class="card">
            <p class="row-count">Total Trainers: <?php echo $num_rows1; ?></p>
            <!-- You can add additional content or data here if needed -->
        </div>
        
        <!-- Card 3 -->
        <div class="card">
            <p class="row-count">Total Equipments: <?php echo $num_rows2; ?></p>
            <!-- You can add additional content or data here if needed -->
        </div>
        
        <!-- Repeat the above pattern for the remaining cards -->
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
