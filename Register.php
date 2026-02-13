 <!-- #region -->
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <title>Document</title>
  </head>
  <link rel="stylesheet" href="logstyle.css">
  <body>
  <form method="post" action="">
  <div class="container" id="signup">
  <h1 class="form-title">Register</h1>
  <form action='' method='post'>   
            <i class="fas fa-user"></i>
            Name:<input type='text' name='name' required="Name"><br><br><br>
            <i class="fas fa-envelope"></i>
  Email: <input type='email' name='email' required><br><br>
  <i class="fas fa-lock"></i>
        Password:<br><input type='password' name='password' required><br><br><br>


        <div class="btn">
            <input type='submit' name='signup' value='Signup'></div>
      </form>
      <p class="or">
            ----------or--------
          </p>
          <div class="links">
<a href="login.php">Login</a>
          </div>
        
  </body>
  </html> 
  <?php
$con = mysqli_connect("localhost", "root", "", "users");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
 }
if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = "user"; 
    $stmt = $con->prepare("INSERT INTO users (Name, Email, Password, Role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $password, $role);

    if ($stmt->execute()) {
        echo "New Account successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}


mysqli_close($con);
?>
<a href="net.php">Display</a>