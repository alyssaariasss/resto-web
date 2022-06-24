<?php

require ('config.php');

include ('forgotpass.php');

error_reporting(0);

session_start();


if (isset($_POST['submit'])) {
  $fname = $_POST['fname'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  $result = mysqli_query($conn, $sql);

  if ($result -> num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $row['email'];
  	$address = $row['address'];
  	$first_name = $row['first_name'];
  	$last_name = $row['last_name'];
  	$mobile_num = $row['mobile_num'];
    $_SESSION['address'] = $address;
  	$_SESSION['first_name'] = $first_name;
  	$_SESSION['last_name'] = $last_name;
  	$_SESSION['mobile_num'] = $mobile_num;

    header("Location: index.php");
  }else {
    echo "<script>alert('Email or Password is incorect.')</script>";
    $email = "";
    $password = "";
  }

}

if (isset($_SESSION['email']) && isset($_POST['submit'])) {
	header("Location: index.php");
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/nav.css">
  </head>
	<body>
		<nav>
			<input type="checkbox" id="cart">
			<label for="cart" class="checkBtn" id="cartLbl">
				<a><i class="fas fa-shopping-cart"></i></a>
			</label>

			<input type="checkbox" id="user">
				<label for="user" class="checkBtn" id="userLbl">
					<a><i class="far fa-user"></i></a>
				</label>

      <input type="checkbox" id="sidebar">
      <label for="sidebar" class="checkBtn">
        <a><i class="fas fa-bars"></i></a>
      </label>

			<label class="logo">D' Nacars' Place</label>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="menu.php">Menu</a></li>
				<li><a href="checkout.php">Checkout</a></li>
				<li><a href="reservation.php">Reservation</a></li>
        <?php
         if (isset($_SESSION['email'])) {
            echo '<li><a href="logout.php">Logout</a></li>
							<li><a class="hideIc" href="settings.php"><i class="far fa-user"></i></a></li>
              <li><a class="nav-link" href="cart.php" ><i class="fas fa-shopping-cart"></i><span id="cart-item" class="badge badge-danger"></span> </a></li>';
		     } else {
        		echo '<li><a href="#" onclick="showLogin();">Login</a></li>
        		  <li><a href="register.php">Signup</a></li>';
        					echo '<style>#cartLbl, #userLbl {display:none;}</style>';
        		}
         ?>
			</ul>
		</nav>
		<!-- Login -->
		<div class="login_main" id="login_m">
			<div class="login" id="login_">
				<i onclick="closeLogin()" id="closelogin" class="far fa-times-circle" ></i><br>
				<a href="https://imgbb.com/"><img src="https://i.ibb.co/zrnGdyP/logo-removebg-preview.png" alt="logo-removebg-preview" border="0"  class="login_logo" width="81" height="81"></a>
				<p class="lg_heading"> Welcome back! </p>
				<p class="lg_subheading"> Sign in to your account. </p>
				<div class="input-login">
					<form action="" method="POST">
						<div class="user-email">
							<input class="lg_useracc" id="user_email" type="text" placeholder="Email" name="email" autofocus="" autocapitalize="none" autocomplete="email" value="<?php echo $email; ?>" required="" >
						</div>
						<div class="user-pass">
							<input class="lg_useracc" id="user_pass" type="password" placeholder="Password" name="password" autocomplete="current-password" value="<?php echo $password; ?>" required="" >
							<i onclick="myFunction()" class="far fa-eye" id="togglePassword" ></i>
						</div>
					<p class="forgotpass" onclick="javascript:showDiv();"> <u> Forgot your password? </u></p>
  					<div class="login_button">
  						<input type="submit" id="btnLogin" value="LOGIN" name="submit">
  					</div>
  					<p id="or"> OR </p>
  					<p class="lg_subheading" id="noacc" > Don't have an account? </p>
  					<p class="forgotpass" id="register"><a href="register.php">Register here.</a></p>
  					<p id="info">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </form>
          </div>
  			</div>

  			<div id="reset" class="login" >
  				<i onclick="closeResetpass()" id="closeresetpass" class="far fa-times-circle" ></i><br>
  				<a href="https://imgbb.com/"><img src="https://i.ibb.co/zrnGdyP/logo-removebg-preview.png" alt="logo-removebg-preview" border="0"  class="login_logo" width="81" height="81"></a>
  				<p class="lg_heading"> Reset Password </p>
  				<p class="lg_subheading"> Please enter your registered email address and we will send you a link to reset your password. </p>
  				<div class="user-email">
  					<input class="lg_useracc" id="user_email" type="text" placeholder="Email" name="email" autofocus="" autocapitalize="none" autocomplete="email" required="" >
  				</div>
  				<div class="login_button">
  					<input type="submit" id="resetpass" value="Send Link" name= "email-reset">
  				</div>
				<p class="forgotpass" id="back" onclick="javascript:showReset();"> <u>Back to Login</u> </p>
			</div>
		</div>

		<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script src="js/popuplogin.js"></script>

		<script type="text/javascript">
		  const pageRef = location.href;
		  const navItem = document.querySelectorAll('a');
		  const navLength = navItem.length;

		  for (let i = 0; i < navLength; i++) {
			if (navItem[i].href === pageRef) {
			  navItem[i].className = "active";
			}
		  }
		</script>

		<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script src="js/popuplogin.js"></script>
    <script type="text/javascript">
       $(document).ready(function(){

           show_mycart();
            function show_mycart(){
             $.ajax({
             url: "ajax/show_mycart.php",
             method:"POST",
             dataType:"JSON",
             success:function(data){
             $(".get_cart").html(data.out);
             $("#cart").text(data.da);
             }
            });
            }

            setInterval(show_mycart,1000);

       });
    </script>
</body>
</html>
