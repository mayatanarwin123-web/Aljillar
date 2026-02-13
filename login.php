
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register & Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="logstyle.css">
</head>
<body> <div class="container" id="signIn">
    <h1 class="form-title">Login</h1>
    <form method="POST" action="">
    <div class="input-group">
        <i class="fas fa-user"></i>
        <input type="email" name="email" required>
        <label for="email">Email</label>
    </div>
    <div class="input-group">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" required>
        <label for="password">Password</label>
    </div>
    <input type="submit" class="btn" value="Sign In" name="login">
</form>
<?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
    <p class="or">
        -------or-------

    </p>
        <div class="links">
  <p>Don't have account yet?</p>
<a href="Register.php">Register</a>
</div>
</body>
</html>
<?php
session_start();
require 'db.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE Email = '$email'";
    $result = mysqli_query($con, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
      
        if ($password === $user['Password']) { 
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['Name'];
            header("Location: Project.html");
            exit();
        } else {
            $error = "Password!";
        }
    } else {
        $error = "Email!";
    }
}
?>