<?php

include ('nav.php');

require ('config.php');

error_reporting(0);

session_start();

// Fetch user data from users db
if (isset($_SESSION['email'])) {
	$sql = "SELECT * FROM `users` WHERE email = '".$_SESSION['email']."'";
	$result = mysqli_query($conn, $sql);

	if ($result -> num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$id = $row['id'];
		$fname = $row['first_name'];
		$lname = $row['last_name'];
		$address = $row['address'];
		$email = $row['email'];
		$mobile = $row['mobile_num'];
	}
}

if (isset($_POST['update'])) {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];

  $sql = "SELECT * FROM `users` WHERE id = '$id'";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    $sql = "UPDATE `users` SET `first_name` = '$fname', `last_name` = '$lname', `address` = '$address', `email` = '$email', `mobile_num` = '$mobile' WHERE `id` = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
      echo "<script>alert('Updated successfully.')</script>";
    } else {
      echo "<script>alert('Something went wrong.')</script>";
    }
  } else {
    	echo "<script>alert('Cannot run query.')</script>";
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
		<title>Settings</title>
  </head>
  <body>
		<div class="register" id="register_">
      <div class="reg_title">
        <h1>User Settings</h1>
        <p id="reg_sub">Change your basic information and select <span class="highlight">UPDATE</span> to continue.</p>
      </div>
      <div class="register-cont">
        <div class="login_main">
          <div class="reg_content" id="reg_content">
            <p id="user-detail" class="regdetail"> User Details </p>
            <form action="" method="POST">
              <div class="reg-details">
                <div class="reg_input-box">
                  <span class="regdetail">First Name &nbsp;   </span>
                  <input type="text" placeholder="First Name" name="fname" value="<?php echo (isset($fname))?$fname:'';?>">
                </div>
                <div class="reg_input-box">
                  <span class="regdetail">Last Name &nbsp; </span>
                  <input class="lmc" type="text" placeholder="Last Name" name="lname" value="<?php echo (isset($lname))?$lname:'';?>">
                </div>
                <div class="reg_input-box">
                  <div class="address_input">
                    <span class="regdetail">Address  &nbsp; </span>
                    <input class="address" type="text" placeholder="Address" name="address" value="<?php echo (isset($address))?$address:'';?>">
                  </div>
                </div>
              </div>
            <p id="login-detail" class="regdetail"> Login and Contact Details </p>
              <div id="email_mobile" class="reg-details">
                <div class="reg_input-box">
                  <span class="regdetail">Email &nbsp; </span>
                  <input type="email" placeholder="Email" name="email" value="<?php echo (isset($email))?$email:'';?>">
                </div>
                <div class="reg_input-box">
                  <span id="blank1" class="regdetail">Mobile Number  &nbsp; </span>
                  <input class="lmc" type="text" placeholder="Mobile Number" name="mobile" value="<?php echo (isset($mobile))?$mobile:'';?>">
                </div>
              </div>
              <div class="reg_button">
                <input type="submit" id="createacc" value="Update" name="update">
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
  </body>
</html>
