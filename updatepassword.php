<?php

  require ('config.php');

  error_reporting(0);

  if (isset($_GET['email']) && isset($_GET['reset_token'])) {
    date_default_timezone_set('Asia/Manila');
    $date = date("Y-m-d");
    $sql = "SELECT * FROM `users` WHERE `email`='$_GET[email]' AND `reset_token`='$_GET[reset_token]' AND `token_expiry`='$date'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
      if (mysqli_num_rows($result) == 1) {
        if (isset($_POST['change'])) {
          $password = md5($_POST['password']);
          $cpassword = md5($_POST['cpassword']);

          if ($password == $cpassword) {
            $sql = "UPDATE `users` SET `password`='$password',`reset_token`= NULL,`token_expiry`= NULL WHERE `email`='$_POST[email]'";

            if (mysqli_query($conn, $sql)) {
              echo "<script>alert('Your password has been changed successfully. Use your new password to login.')</script>";
            } else {
              echo "<script>alert('Server down. Please try again later.')</script>";
            }

          } else {
            echo "<script>alert('Passwords do not match.')</script>";
          }
        }
      } else {
        echo "<script>alert('Invalid or expired link.')</script>";
      }
    } else {
      echo "<script>alert('Server down. Please try again later.')</script>";
    }
  }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/update-password.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <title>Update Password</title>
  </head>
  <body>
    <div id="reset" class="login">
      <img src="https://i.ibb.co/zrnGdyP/logo-removebg-preview.png" alt="logo-removebg-preview" border="0"  class="login_logo">
      <p class="lg_heading">Create New Password</p>
      <p class="lg_subheading">Your new password must be different from any previous passwords you've used.</p>
      <form action="" method="POST">
        <div class="user_pass">
          <input class="lg_useracc" id="user_pass" type="password" placeholder="Password" name="password" autofocus="" autocapitalize="none" value="<?php echo $_POST['password']; ?>" required="" >
          <i onclick="showPass()" class="far fa-eye" id="togglePassword1"></i>
          <input class="lg_useracc" id="user_cpass" type="password" placeholder="Confirm Password" name="cpassword" autofocus="" autocapitalize="none" value="<?php echo $_POST['cpassword']; ?>" required="" >
          <i onclick="showCPass()" class="far fa-eye" id="togglePassword2"></i>
        </div>
        <div class="change_button">
          <input type="submit" id="resetpass" value="Change Password" name = "change">
        </div>
        <input type="hidden" name="email" value="<?php echo $_GET[email]; ?>">
      </form>
  </div>

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    function showPass() {
      var y = document.getElementById('user_pass');
      if (y.type === "password") {
        y.type = "text";
      } else {
        y.type = "password";
      }
    }

    function showCPass() {
      var z = document.getElementById('user_cpass');
      if (z.type === "password") {
        z.type = "text";
      } else {
        z.type = "password";
      }
    }
    </script>
  </body>
</html>
