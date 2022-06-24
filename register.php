<?php

include ('config.php');
include ('nav.php');

error_reporting(0);

session_start();

if (isset($_SESSION['fname'])) {
	header("Location: login.php");
}

if (isset($_POST['register'])) {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $password = md5($_POST['password']);
  $cpassword = md5($_POST['cpassword']);

  if ($password == $cpassword) {
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (!$result -> num_rows > 0) {
      $sql = "INSERT INTO users (first_name, last_name, address, email, mobile_num, password)
            VALUES('$fname', '$lname', '$address', '$email', '$mobile', '$password')";
      $result = mysqli_query($conn, $sql);

      if ($result) {
        echo "<script>alert('Your registration has been successfully completed. Please login to continue.')</script>";
        $fname = "";
        $lname = "";
        $email = "";
        $mobile = "";
        $_POST['password'] = "";
        $_POST['cpassword'] = "";
      } else {
          echo "<script>alert('Something went wrong.')</script>";
      }
    } else {
        echo "<script>alert('Email is already registered.')</script>";
    }

  } else {
      echo "<script>alert('Passwords do not match.')</script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  </head>
  <body>
    <div class="register" id="register_">
      <div class="reg_title">
        <h1>Register</h1>
        <p id="reg_sub">Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
      </div>
      <div class="register-cont">
        <div class="login_main">
          <div class="reg_content" id="reg_content">
            <p id="user-detail" class="regdetail"> User Details </p>
            <form action="" method="POST">
              <div class="reg-details">
                <div class="reg_input-box">
                  <span class="regdetail">First Name &nbsp;   </span>
                  <input type="text" placeholder="John" name="fname" value="<?php echo $fname; ?>" required>
                </div>
                <div class="reg_input-box">
                  <span class="regdetail">Last Name  &nbsp; </span>
                  <input class="lmc" type="text" placeholder="Doe" name="lname" value="<?php echo $lname; ?>" required>
                </div>
                <div class="reg_input-box">
                  <div class="address_input">
                    <span class="regdetail">Address  &nbsp; </span>
                    <input class="address" type="text" placeholder="111 Sampaloc Street" name="address" value="<?php echo $address; ?>" required>
                  </div>
                </div>
              </div>
            <p id="login-detail" class="regdetail"> Login and Contact Details </p>
              <div id="email_mobile" class="reg-details">
                <div class="reg_input-box">
                  <span class="regdetail">Email &nbsp; </span>
                  <input type="email" placeholder="jondoe@email.com" name="email" value="<?php echo $email; ?>" required>
                </div>
                <div class="reg_input-box">
                  <span id="blank1" class="regdetail">Mobile Number  &nbsp; </span>
                  <input class="lmc" type="text" placeholder="09010111011" name="mobile" value="<?php echo $mobile; ?>" maxlength = "11" required>
                </div>
              </div>
              <div class="reg-details" id="pc">
                <div class="reg_input-box" >
                  <span id="blank2" class="regdetail">Password &nbsp; </span>
                  <div id="reg_pass" class="reg_pass">
                    <input id="user_pass1" type="password" placeholder="Password" autocomplete="current-password" name="password" value="<?php echo $_POST['password']; ?>" required="" >
                    <i onclick="showPass()" class="far fa-eye" id="togglePassword1"></i>
                  </div>
                </div>
                <div class="reg_input-box">
                  <span id="blank3" class="regdetail">Confirm password  &nbsp; </span>
                  <div id="reg_pass">
                    <input class="lmc" id="user_pass2" type="password" placeholder="Confirm Password" autocomplete="current-password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
                    <i onclick="showCPass()" class="far fa-eye" id="togglePassword2"></i>
                  </div>
                </div>
              </div>
              <div id="reg_checkbox" class="reg_checkbox">
                <input type="checkbox" id="checkbox_1" name="checkbox_1" value="">
                <label class="lg_subheading" for="checkbox_1"> I would like to receive announcements and promotions from D' Nacars' Place.</label><br>
                <input type="checkbox" id="checkbox_2" name="checkbox_2" value="" required>
                <label class="lg_subheading" for="checkbox_2"> I have fully read, understood, and agree to D' Nacars' Place's <a href="#">Terms and Conditions</a>.</label><br>
              </div>
              <div class="reg_button">
                <input type="submit" id="createacc" value="CREATE ACCOUNT" name="register">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

		<!-- Footer -->
		<div class="wrapper">
      <footer>
        <div class="row">
          <div class="col">
            <div class="img_wrapper">
              <img src="img/retraced-logo.png">
							<p><span>&copy; </span>2021 D' Nacars' Place. All Rights Reserved.</p>
            </div>
          </div>

          <div class="col">
            <h4>Location</h4>
            <p>Near the National Highway, Bubog, San Jose, Occ. Mindoro.</p>
          </div>

          <div class="col">
            <h4>Store Hours</h4>
            <p>10:00 AM to 10:00 PM</p>
          </div>

          <div class="col">
            <h4>Contact Us</h4>
            <div class="phone">
              <div class="child"><i class="fas fa-phone-alt"></i></div>
              <div class="child"><p>+63 928 338 2732</p></div>
              <p style="padding-left: 20px;">+63 929 288 2833</p>
            </div>
            <div class="email">
              <div class="child"><i class="fas fa-envelope"></i></div>
              <div class="child"n><p>helloworld@gmail.com</p></div>
            </div>
          </div>

          <div class="col">
            <div class="socials">
              <a href="https://www.facebook.com/D-Nacars-Place-113366404336432/" target="_blank"><i class="fab fa-facebook-f"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
          </div>
        </div>
      </footer>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      function showPass() {
        var y = document.getElementById('user_pass1');
        if (y.type === "password") {
          y.type = "text";
        } else {
          y.type = "password";
        }
      }

      function showCPass() {
        var z = document.getElementById('user_pass2');
        if (z.type === "password") {
          z.type = "text";
        } else {
          z.type = "password";
        }
      }

      function closeLogin() {
          document.getElementById('login_').style.display="none";
      }
      function closeResetpass() {
          document.getElementById('login_').style.display="block";
          document.getElementById('reset').style.display="none";
      }
      function backtoLogin() {
          document.getElementById('login_').style.display="block";
          document.getElementById('register_').style.display="none";
      }
      function showDiv() {
        div = document.getElementById('reset');
        div.style.display = "block";
        document.getElementById('login_').style.display="none";
      }
      function showReset() {
        div = document.getElementById('login_');
        div.style.display = "block";
        document.getElementById('reset').style.display="none";
      }
      function showRegister() {
        div = document.getElementById('register_');
        div.style.display = "block";
        document.getElementById('login_').style.display="none";
      }
    </script>
  </body>
</html>
