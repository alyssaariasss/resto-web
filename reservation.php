<?php

include ('nav.php');

require ('config.php');

session_start();

// Fetch user data from users db
if (isset($_SESSION['email'])) {
	$sql = "SELECT * FROM `users` WHERE email = '".$_SESSION['email']."'";
	$result = mysqli_query($conn, $sql);

	if ($result -> num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$fname = $row['first_name'];
		$lname = $row['last_name'];
		$email = $row['email'];
		$mobile = $row['mobile_num'];
	}
}

if (isset($_POST['booking'])) {
	// Check if user is logged in before pushing data to bookings db
	if (isset($_SESSION['email'])) {
		$booking_id = uniqid('BO');
		$booking_date=date('Y-m-d h:i:s');
		$resdate = $_POST['resdate'];
		$time = $_POST['time'];
		$people = $_POST['people'];
		$tabletype = "Not assigned";
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];
		$notes = $_POST['notes'];
		$status = "Pending";

		$sql = "SELECT * from `tables`";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			$sql = "INSERT INTO `bookings` (booking_id, booking_date, reservation_date, reservation_time, people_num, tabletype, first_name, last_name, email, mobile_num, notes, status)
							VALUES('$booking_id', '$booking_date', '$resdate', '$time', '$people', '$tabletype', '$fname', '$lname', '$email', '$mobile', '$notes', '$status')";
			$result = mysqli_query($conn, $sql);

			if ($result) {
				echo "<script>alert('Your booking is successful, you will receive a confirmation email shortly.')</script>";
				$resdate = "";
				$time = "";
				$fname = "";
				$lname = "";
				$email = "";
				$mobile = "";
				$notes = "";
			} else {
				die(mysqli_error($conn));
			}
		} else {
			echo "<script>alert('There are no tables available.')</script>";
		}
	} else {
		echo "<script>alert('You must be logged in to book a table.')</script>";
	}
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/reservation.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	 	<!-- For Datepicker and Timepicker -->
		<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
		<title>Reservation</title>
	</head>
	<body>
		<div class="res_wrapper">
			<div class="t_reservation">
				<div id="tr" class="tr_title">Table Reservation</div>
				<p id="tr_subtittle">We have reopened our dine-in space! Please fill-up all required fields to reserve a table.</p>
				<div class="tr_content">
					<form action="" method="POST">
						<div class="user-details">
							<div class="tr_input-box">
								<span class="details">Date *</span>
								<input type="text" id="datepicker" name="resdate" value="<?php echo $resdate; ?>" required>
							</div>
							<div class="tr_input-box">
								<span class="details">Time *</span>
								<input type="text" class="timepicker" name="time" value="<?php echo $time; ?>" required>
							</div>
						</div>
						<div class="tr_people">
							<span class="details">People *</span>
							<div class="tr_dropdown">
								<select class="tr_select" name="people" required>
									<option selected disabled>Select number of people</option>
									<option class="tr_option" value="1">1</option>
									<option class="tr_option" value="2">2</option>
									<option class="tr_option" value="3">3</option>
									<option class="tr_option" value="4">4</option>
									<option class="tr_option" value="5">5</option>
									<option class="tr_option" value="6">6</option>
									<option class="tr_option" value="7">7</option>
									<option class="tr_option" value="8">8</option>
									<option class="tr_option" value="9">9</option>
									<option class="tr_option" value="10">10</option>
									<option class="tr_option" value="More than 10">More than 10</option>
								</select>
							</div>
						</div>
						<div class="user-details">
							<div class="tr_input-box">
								<span class="details">First Name *</span>
								<!-- Auto-populate input field with user data from registration page -->
								<input type="text" name="fname" value="<?php echo (isset($fname))?$fname:'';?>" required>
							</div>
							<div class="tr_input-box">
								<span class="details">Last Name *</span>
								<input type="text" name="lname" value="<?php echo (isset($lname))?$lname:'';?>" required>
							</div>
							<div class="tr_input-box">
								<span class="details">Email *</span>
								<input type="email" name="email" value="<?php echo (isset($email))?$email:'';?>" required>
							</div>
							<div class="tr_input-box">
								<span class="details">Mobile Number *</span>
								<input type="text" name="mobile" value="<?php echo (isset($mobile))?$mobile:'';?>" required>
							</div>
						</div>
						<div class="tr_input-box">
							<span class="details">Notes</span>
							<input type="text" name="notes" value="<?php echo $notes; ?>">
						</div>
						<div class="btn_area">
							<input type="submit" name="booking" value="Book a table">
						</div>
					</form>
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

		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

		<script>
		  $( function() {
			    $( "#datepicker" ).datepicker({
						minDate: 0
					});
			});

			$(document).ready(function(){
			    $('input.timepicker').timepicker();
			});

			$('.timepicker').timepicker({
			    timeFormat: 'h:mm p',
			    interval: 60,
			    minTime: '10',
			    maxTime: '10:00pm',
			    startTime: '10:00',
			    dropdown: true,
			    scrollbar: true
			});
  </script>
	</body>
</html>
