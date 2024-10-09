<?php
// Define variables and initialize with empty values
$username = $password = $email = "";
$username_err = $password_err = $email_err = "";

// Processing form data when form is submitted
if (isset($_POST["submit"])) {
    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        $username = trim($_POST["username"]);
        if(!preg_match("/^[a-zA-Z]+$/",$username)){
            $username_err= "Invalid Username only Alphabets allowed";
        }
    }
    
    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } else {
        $password = trim($_POST["password"]);
        if(!preg_match("/^[a-zA-Z].*[0-9]$/",$password)){
            $password_err= "Password should start with alphabet and end with a digit.";
        }
    }
    
    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter an email.";
    } else {
        $email = trim($_POST["email"]);
        // Check if email address is well-formed
        if(!preg_match("/[a-z]@[a-z]*.com/",$email)){
            $email_err = "Invalid email format.";
        }
    }
    
    // If no errors, proceed further
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <style>
    body {
        font-family: Arial, sans-serif;
    }
    form {
        max-width: 400px;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    input[type="text"], input[type="password"] {
        width: 90%;
        padding: 10px;
        margin: 5px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    input[type="submit"] {
        width: 95%;
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #45a049;
    }
    .error {
        color: red;
    }
</style>
</head>
<body>
    <form method="post">
        <h2>Sign Up</h2>
        <div>
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
            <span class="error"><?php echo $username_err; ?></span>
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password" value="<?php echo $password; ?>">
            <span class="error"><?php echo $password_err; ?></span>
        </div>
        <div>
            <label>Email</label>
            <input type="text" name="email" value="<?php echo $email; ?>">
            <span class="error"><?php echo $email_err; ?></span>
        </div>
        <div>
            <input type="submit" name="submit" value="Submit">
        </div>
    </form>
    <?php 
    if(isset($_POST["submit"])){
        if (empty($username_err) && empty($password_err) && empty($email_err)) {
            echo "Welcome ".$username;
        }
    }
    ?>
</body>
</html>
