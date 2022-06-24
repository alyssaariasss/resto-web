<?php

require ('../config.php');

error_reporting(0);

session_start();

if (isset($_POST['login_ad'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM `admin` WHERE `email`='$email' AND `password`='$password'";
  $result = mysqli_query($conn, $sql);

  if ($result -> num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $row['email'];
    header("Location: index.php");
  } else {
    echo "<script>alert('Email or Password is incorect.')</script>";
    $email = "";
    $password = "";
  }
}

if (isset($_SESSION['email']) && isset($_POST['login_ad'])) {
	header("Location: index.php");
}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <title>Login</title>
  </head>
  <body>
    <div class="register" id="register_">
      <div class="reg_title">
        <h1>Admin Login</h1>
      </div>
      <div class="register-cont">
        <div class="login_main">
          <div class="reg_content">
            <form action="" method="POST">
              <div class="reg_input-box">
                <span class="regdetail">Email &nbsp; </span>
                <input type="text" placeholder="Email" name="email" autofocus="" autocapitalize="none" autocomplete="email" value="<?php echo $email; ?>" required="">
              </div>

              <div class="reg_input-box" >
                <span id="blank2" class="regdetail">Password  &nbsp; </span>
                <div id="reg_pass" class="reg_pass">
                  <input id="user_pass" type="password" placeholder="Password" name="password" autocomplete="current-password" value="<?php echo $password; ?>" required="">
                  <i onclick="showPass();" class="far fa-eye" id="togglePassword1"></i>
                </div>
              </div>

              <div class="reg_button">
                <input type="submit" id="createacc" value="Login" name="login_ad">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script>
      function showPass() {
        var x = document.getElementById('user_pass');
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
        var y = document.getElementById('user_pass1');
        if (y.type === "password") {
          y.type = "text";
        } else {
          y.type = "password";
        }
        var z = document.getElementById('user_pass2');
        if (z.type === "password") {
          z.type = "text";
        } else {
          z.type = "password";
        }
      }
    </script>

  </body>
</html>
