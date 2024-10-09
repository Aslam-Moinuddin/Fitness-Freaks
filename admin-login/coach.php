<?php
include 'config.php';

$query = "SELECT DISTINCT name FROM subscription";
$result = mysqli_query($con, $query);
$sub = array();

if (!$result) {
    die("Database query failed: " . mysqli_error($con));
}

while ($row = mysqli_fetch_assoc($result)) {
    $sub[] = $row['name'];
}

if (isset($_POST["search"])) {
    $SUBtype = $_POST["sub"];
    $query1 = "SELECT * FROM coach WHERE subscription='$SUBtype'";
    $result1 = mysqli_query($con, $query1);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainer</title>
    <link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
    <link rel="manifest" href="../favicon/site.webmanifest">
    <link rel="manifest" href="../favicon/site.webmanifest">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../components/style.css">
    <style>
        body{
            background:#333333;
        }
        .text-center,mt-5{
            color:#fff;
        }
        #preloader{
            background: #111112 url(../img/preloader1.gif) no-repeat center center;
            background-size: 35%;
            height: 100vh;
            width: 100%;
            position: fixed;
            z-index: 100;
        }
        .btn-pencil:hover {
            border: 1px solid green; /* Border style when hovering */
        }
    </style>
</head>
<body>
    <div id="preloader"></div>
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
        <a class="navbar-brand" href="dashboard.php"><img src="../img/Fitness_Freaks-removebg-preview (2).png" width="70" height="70" alt=""> FitnessFreaks</a>
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
    <h2 class="text-center mt-5">Trainer Details</h2>
    <div class="form-container">
        <form method="POST">
            <div class="form-group">
                <label for="inputAddress2">Select Subscription</label>
                <select name="sub" class="form-control" style="padding:0px;">
                    <option value="">Select subscription</option>
                    <?php foreach ($sub as $s) : ?>
                        <option value="<?php echo $s; ?>"><?php echo $s; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="search">Search</button>
        </form>
        <?php if (isset($result1) && $result1 && mysqli_num_rows($result1) > 0) : ?>
            <div class="container">
                <h2> Available Trainer Details</h2>
                <div class="row">
                    <div class="col m-auto">
                        <div class="card mt-5">
                            <table class="table table-bordered">
                                <tr>
                                    <th> Trainer ID</th>
                                    <th> Trainer Name</th>
                                    <th> age</th>
                                    <th> Experience Level</th>
                                    <th> Subscription</th>
                                </tr>
                                <?php while ($row = mysqli_fetch_assoc($result1)) : ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['age']; ?></td>
                                        <td><?php echo $row['experience']; ?></td>
                                        <td><?php echo $row['subscription']; ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
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
