<?php
include "config.php";
$register_fail_msg="";
$login_fail_msg = ""; 
if(isset($_POST["register-submit"])){
  $username=$_POST["username"];
  $email=$_POST["register-email"];
  $password=$_POST["register-password"];

  $check_query = "SELECT * FROM register WHERE email='$email'";
  $check_result = mysqli_query($con, $check_query);
  if (mysqli_num_rows($check_result) > 0) {
      $register_fail_msg = "Email address already exists. Please use a different email.";
  } 
  else {
      $sql="INSERT INTO register (username,email,password) VALUES ('$username','$email','$password')";
      $query=mysqli_query($con,$sql);
      header("location: profile.php?email=$email");
  }

}
if(isset($_POST["login-submit"])){
    $email=$_POST["email"];
    $password=$_POST["password"];
  
    $sql="SELECT * FROM register WHERE email='$email' and password='$password'";
    $query=mysqli_query($con,$sql);
    $count=mysqli_num_rows($query);
    if($count>0){
      header("location: user-profile.php?email=$email");
    }
    else{
      $login_fail_msg = "Invalid email or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login to FitnessFreaks</title>
    <link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
    <link rel="manifest" href="../favicon/site.webmanifest">

    
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css"
      rel="stylesheet"/>
    <link rel="stylesheet" href="css/styles.css" />
    <style>
      #preloader{
        background: #111112 url(../img/preloader1.gif) no-repeat center center;
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
    <section class="form__wrapper">
      <!-- Login Form -->
      <form action="" class="form form-active" id="login-form" method="POST">
        <h1 class="form__title"><i class="ri-account-circle-fill"></i> Login</h1>
        <?php if (!empty($login_fail_msg)): ?>
          <span id="login-fail-msg"><?php echo $login_fail_msg; ?></span>
        <?php endif; ?>
        <div class="form__content">
          <div class="form__box">
            <i class="ri-mail-line form__icon"></i>
            <div class="form__box-input">
              <input type="email" class="form__input" placeholder=" " name="email" id="login-email"/>
              <label for="login-email" class="form__label">Email</label>
            </div>
          </div>
          <div class="form__box">
            <i class="ri-lock-2-line form__icon"></i>
            <div class="form__box-input">
              <input type="password" class="form__input" placeholder=" " id="login-pass" name="password"/>
              <label for="login-pass" class="form__label">Password</label>
              <i class="ri-eye-off-line form__eye" id="login-eye"></i>
            </div>
          </div>
        </div>
        <div class="form__check">
          <div class="form__check-group">
            <input type="checkbox" class="form__check-input" />
            <label for="" class="form__check-label">Remember me</label>
          </div>
          <a href="#" class="form__forgot">Forgot Password?</a>
        </div>
        <button type="submit" class="form__button" name="login-submit">Login</button>
        <p class="login__register">
            Don't have an account? <span id="register-btn">Register</span>
        </p>
      </form>


      <!-- Register Form -->
      <form action="" method="post" class="form" id="register-form" onsubmit="return validateForm()">
        <h1 class="form__title">Register</h1>
        <?php if (!empty($register_fail_msg)): ?>
          <span id="register_fail_msg"><?php echo $register_fail_msg; ?></span>
        <?php endif; ?>
        <div class="form__content">
          <div class="form__box">
            <i class="ri-user-line form__icon"></i>
            <div class="form__box-input">
              <input type="text" class="form__input" placeholder=" " name="username"/>
              <label for="" class="form__label">Username</label>
            </div>
          </div>
          <div class="form__box">
            <i class="ri-mail-line form__icon"></i>
            <div class="form__box-input">
              <input type="email" class="form__input" placeholder=" " name="register-email" required/>
              <label for="" class="form__label">Email</label>
            </div>
          </div>
          <div class="form__box">
            <i class="ri-lock-2-line form__icon"></i>
            <div class="form__box-input">
              <input type="password" class="form__input" placeholder=" " id="register-pass" name="register-password" required/>
              <label for="" class="form__label">Password</label>
              <i class="ri-eye-off-line form__eye" id="register-eye"></i>
            </div>
          </div>
        </div>
        <div class="form__check">
          <div class="form__check-group">
            <input type="checkbox" class="form__check-input" required/>
            <label for="" class="form__check-label">I agree the terms and conditions.</label>
          </div>
        </div>
        <button type="submit" class="form__button" name="register-submit">Register</button>
        <p class="login__register">Already have an Account? <span     id="login-btn">Login</span>
        </p>
      </form>
    </section>
    <script>
        var loader=document.getElementById("preloader");
        window.addEventListener("load",function(){
            setTimeout(function(){
                loader.style.display="none";
            },2000);
        });
    </script>
    <script>
      var formSubmitted = false;  
      function validateForm() {
        if (!formSubmitted) {
          var password = document.getElementById("register-pass").value;
          if (password.length < 8) {
            alert("Password must be at least 8 characters long.");
            return false;
          }
        }
        formSubmitted = true; 
        return true;
      }
    </script>
    <script src="js/main.js"></script>
  </body>
</html>
