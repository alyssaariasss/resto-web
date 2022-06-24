<?php
include ('config.php');
include ('nav.php');

error_reporting(0);

session_start();

foreach ($_SESSION["mycart"] as $key => $value) {
	$order_id = uniqid('OR');
	$total = $total + ($value["quantity"] * $value["price"]);
	$totall =($value["quantity"] * $value["price"]);
	$prname = $value["name"];
	$total_ = $total + 40;
	$qty = $value["quantity"];
	$price = $value["price"];
	$_SESSION['order_id'] = $order_id;
	$_SESSION['total'] = $total;
	$_SESSION['total_'] = $total_;
	$_SESSION['qty'] = $qty;
	$_SESSION['prname'] = $prname;
	$_SESSION['totall'] = $totall;
}
if (isset($_POST['checkout'])) {
	if (!empty($_POST['street']) && (!empty($_POST['city'])) && (!empty($_POST['region'])))  {
		$order_id = $_SESSION['order_id'];
		$firstname = $_SESSION['first_name'];
		$lastname = $_SESSION['last_name'];
		$email = $_SESSION['email'];
		$street = $_POST['street'];
		$city =  $_POST['city'];
		$region = $_POST['region'];
		$instruction = $_POST['instruction'];
		$payment_method = $_POST['payment_method'];
		$gcash_name = $_POST['gcash_name'];
		$receipt = $_POST['receipt'];
		$acc_num = $_POST['acc_num'];
		$reference_num = $_POST['reference_num'];
		$total_amount = $total + 40;
		$date=date('Y-m-d h:i:s');
		$_SESSION['payment'] = $payment_method;
		$_SESSION['datee'] = $date;
		$_SESSION['street'] = $street;
		$_SESSION['city'] = $city;
		$_SESSION['region'] = $region;
		$status = "Pending";

		$query = "INSERT INTO orders (order_id, fname, lname, email, street, city, region, instruction, payment_method, total_amount, date, status)
		VALUES ('$order_id','$firstname','$lastname', '$email', '$street','$city','$region','$instruction','$payment_method','$total_amount','$date','$status')";
		$result = mysqli_query($conn, $query);

		$firstname = $_SESSION['first_name'];
		$lastname = $_SESSION['last_name'];
		$date=date('Y-m-d h:i:s');
		foreach ($_SESSION["mycart"] as $key => $value) {
			$total_ = ($value["quantity"] * $value["price"]);
			$quantity = $value["quantity"];
			$namee= $value["name"];
			$price = $value["price"];
			$query = "INSERT INTO order_detail (fname, lname, order_id, product_name, quantity, price, total_price, added_on) VALUES ('$firstname','$lastname','$order_id','$namee','$quantity','$price','$total_','$date')";
			$result = mysqli_query($conn, $query);
		}
	} else {
		 echo "<script>alert('Please complete your address details');document.location='checkout.php'</script>";
	}
}

if (isset($_POST['checkoutt'])) {
	if (!empty($_POST['street']) && (!empty($_POST['city'])) && (!empty($_POST['region'])))  {
		if (!empty($_POST['gcash_name']) && (!empty($_POST['receipt'])) && (!empty($_POST['acc_num'])) && (!empty($_POST['reference_num']))) {
			$order_id = $_SESSION['order_id'];
			$firstname = $_SESSION['first_name'];
			$lastname = $_SESSION['last_name'];
			$street = $_POST['street'];
			$city =  $_POST['city'];
			$region = $_POST['region'];
			$instruction = $_POST['instruction'];
			$payment_method = $_POST['payment_method'];
			$gcash_name = $_POST['gcash_name'];
			$receipt = $_POST['receipt'];
			$acc_num = $_POST['acc_num'];
			$reference_num = $_POST['reference_num'];
			$total_amount = $total + 40;
			$date=date('Y-m-d h:i:s');
			$_SESSION['payment'] = $payment_method;
			$_SESSION['datee'] = $date;
			$_SESSION['street'] = $street;
			$_SESSION['city'] = $city;
			$_SESSION['region'] = $region;
			$_SESSION['acc_num'] = $acc_num;
			$_SESSION['reference_num'] = $reference_num;
			$_SESSION['gcash_name'] = $gcash_name;
			$status = "Pending";

			if (!preg_match("/^$|^[0-9]{11}$/",$acc_num)) {
				echo "<script>alert('The phone number is invalid. please input your correct GCASH number');document.location='checkout.php'</script>";
			}else{
				$query = "INSERT INTO orders (order_id, fname, lname, email, street, city, region, payment_method, total_amount, gcash_name, receipt, acc_num, reference_num, date, status)
				VALUES ('$order_id','$firstname','$lastname', '$email', '$street','$city','$region','$payment_method','$total_amount', '$gcash_name', '$receipt', '$acc_num', '$reference_num','$date','$status')";
				$result = mysqli_query($conn, $query);

				$firstname = $_SESSION['first_name'];
				$lastname = $_SESSION['last_name'];
				$date=date('Y-m-d h:i:s');
				foreach ($_SESSION["mycart"] as $key => $value) {
					$total_ = ($value["quantity"] * $value["price"]);
					$quantity = $value["quantity"];
					$namee= $value["name"];
					$price = $value["price"];
					$query = "INSERT INTO order_detail (fname, lname, order_id, product_name, quantity, price, total_price, added_on) VALUES ('$firstname','$lastname','$order_id','$namee','$quantity','$price','$total_','$date')";
					$result = mysqli_query($conn, $query);
				}
			}
		} else {
			echo "<script>alert('Please complete your GCASH account details');document.location='checkout.php'</script>";
		}
	} else {
		 echo "<script>alert('Please complete your address details');document.location='checkout.php'</script>";
	}
}
if(empty($_SESSION["mycart"])){
		echo "<script>alert('Your cart is empty');document.location='index.php'</script>";
	}
if (isset($_GET["action"])){
	if ($_GET["action"] == "clearall") {
			unset($_SESSION["mycart"]);
	}
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/checkout.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>
	</head>
	<body>
		<?php if (isset($_POST['checkout'])) {  ?>
			<div class="login_main" id="login_m" style='background-color:#fef9f3;max-width: 450px;  width: 100%; margin: 100px auto 300px auto;border-radius: 28px;box-shadow: 0 0 350px rgba(0, 0, 0, 0.7);position: absolute;left: 0;right: 0;z-index: 999;'>
				<div class="cod_success" id="cod_success">
					<div style="text-align:center;">
					<div><i class="fas fa-check-circle" style="font-size:45px; color:#e88f2b; margin-top:30px;" id="login_logo" border="0"></i></div>
					<p class="cod_heading" style="color: #126c49;font-size: 24px; margin-top: 15px; font-weight: bold;" >PAYMENT COMPLETE! </p>
					<p class="cod_subheading" style="margin-top:-14px;"> Thank you for ordering. </p>
					</div>
					<table style="margin-top: 15px; width: 91%; margin-left:20px;" class="table1">
						<thead>
							<tr  style='border-style: solid solid solid solid; border-width: 3px; border-color: #fef9f3 #fef9f3 #e88f2b #fef9f3;'>
								<th style="font-size: 14px; color: #126c49; font-weight: 900; text-align: left; padding-bottom:5px;">ORDER DETAILS</th>
							</tr>
						</thead>
					</table>
					<div style="margin-left: 21px; margin-right: 21px; margin-top:17px;">
						<div class="input-login" style="font-size:15px;">
							<table style="width:100%;">
								<tr>
									<td style="color:#126c49; font-weight:900;" > DATE: </td>
									<td align="right" style="text-align:right;"><?php echo date('F d, Y');?></td>
								</tr>
								<tr>
									<td style="color:#126c49;font-weight:900;"> NAME: </td>
									<td align="right" style="text-align:right;"><?php echo $_SESSION['first_name']; ?> <?php echo $_SESSION['last_name']; ?></td>
								</tr>
								<tr>
									<td style="color:#126c49;font-weight:900;"> PAYMENT METHOD: </td>
									<td align="right" style="text-align:right;"><?php echo $_SESSION['payment'];?></td>
								</tr>
								<tr>
									<td style="color:#126c49;font-weight:900;"> ADDRESS: </td>
									<td align="right" style="text-align:right;text-transform: capitalize;"><?php echo $_SESSION['street'];?> <?php echo $_SESSION['city'];?> <?php echo $_SESSION['region'];?></td>
								</tr>
								<tr>
									<td style="color:#126c49;font-weight:900;"> NUMBER: </td>
									<td align="right" style="text-align:right;"><?php echo $_SESSION['mobile_num'];?></td>
								</tr>
							</table>
						</div>
						<table style="margin-top:22px;">
						<?php
							if(!empty($_SESSION["mycart"])){
								$total = 0;
								foreach ($_SESSION["mycart"] as $key => $value) {
									?>
									<tr style="font-size: 14px; color:#5b5f5b;">
										<td style='width:1px; border:none;'><?php echo $value["quantity"];?></td>
										<td style='text-align: left; width:1px; border:none;'> x </td>
										<td style='text-align: left; width:250px; border:none;'><?php echo $value["name"]; ?></td>
										<td style='text-align: right; width:30px; border:none;'>₱<?php echo number_format($value["quantity"] * $value["price"], 2); ?></td>
									</tr>
									<?php
									$total = $total + ($value["quantity"] * $value["price"]);
								}
									?>
									<tr style='background-color:#fef9f3;'>
										<td style='text-align: left; height:20px; font-size:13px;color:#126c49; padding-top:25px;' colspan="2" align="left">SUBTOTAL</td>
										<th colspan="2" align="right" style='text-align: right; font-size:15px; padding-top:25px;'>₱ <?php echo number_format($total, 2); ?></th>

									</tr>
									<tr style='background-color:#fef9f3; margin-bottom:20px; font-size:13px; border-style: solid solid none solid; border-width: medium; border-color: #fef9f3 #fef9f3 #fef9f3 #fef9f3;'>
										<td style='text-align: left; color:#126c49; padding-bottom:30px;' colspan="3" align="left">SHIPPING FEE</td>
										<th  align="right" style='text-align: right; padding-bottom:30px; font-size:15px;'>₱40.00</th>

									</tr>
									<?php
									$total = $total + 40;
									$totall= $total;
									$_SESSION['total_'] = $totall;
								}
									?>
									<tr style='background-color:#fef9f3; color:#126c49; padding-top:45px;'>
										<td style='text-align: left; font-weight:900; ' colspan="2" align="left">TOTAL</td>
										<th colspan="2" align="right" style='text-align: right;'>₱ <?php echo number_format($totall, 2); ?></th>
									</tr>
									<tr>
										<th colspan="4">
										<div style="float: right; margin: 20px 0 20px 0; padding-top:38px;">
											<a href="cart.php?action=clearall&id=<?php echo $value["id"]; ?>" style="color: #e88f2b;"><i class="fas fa-arrow-left" style="margin-top:16px; color: #e88f2b;"></i>&nbsp; &nbsp;HOME</a><br>
										</div>
										</th>
									</tr>
									<?php
							?>
						</table>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isset($_POST['checkoutt'])) {  ?>
			<div class="login_main" id="login_m" style='background-color:#fef9f3;max-width: 450px;  width: 100%; margin: 100px auto 300px auto;border-radius: 28px;box-shadow: 0 0 350px rgba(0, 0, 0, 0.7);position: absolute;left: 0;right: 0;z-index: 999;'>
				<div class="cod_success" id="cod_success">
					<div style="text-align:center;">
					<div><i class="fas fa-check-circle" style="font-size:45px; color:#e88f2b; margin-top:30px;" id="login_logo" border="0"></i></div>
					<p class="cod_heading" style="color: #126c49;font-size: 24px; margin-top: 15px; font-weight: bold;" >PAYMENT COMPLETE! </p>
					<p class="cod_subheading" style="margin-top:-14px;"> Thank you for ordering. </p>
					</div>
					<table style="margin-top: 15px; width: 91%; margin-left:20px;" class="table1">
						<thead>
							<tr  style='border-style: solid solid solid solid; border-width: 3px; border-color: #fef9f3 #fef9f3 #e88f2b #fef9f3;'>
								<th style="font-size: 14px; color: #126c49; font-weight: 900; text-align: left; padding-bottom:5px;">ORDER DETAILS</th>
							</tr>
						</thead>
					</table>
					<div style="margin-left: 21px; margin-right: 21px; margin-top:17px;">
						<div class="input-login" style="font-size:15px;">
							<table style="width:100%;">
								<tr>
									<td style="color:#126c49; font-weight:900;" > DATE: </td>
									<td align="right" style="text-align:right;"><?php echo date('F d, Y');?></td>
								</tr>
								<tr>
									<td style="color:#126c49;font-weight:900;"> NAME: </td>
									<td align="right" style="text-align:right;"><?php echo $_SESSION['first_name']; ?> <?php echo $_SESSION['last_name']; ?></td>
								</tr>
								<tr>
									<td style="color:#126c49;font-weight:900;"> PAYMENT METHOD: </td>
									<td align="right" style="text-align:right;"><?php echo $_SESSION['payment'];?></td>
								</tr>
								<tr>
									<td style="color:#126c49;font-weight:900;"> ADDRESS: </td>
									<td align="right" style="text-align:right;text-transform: capitalize;"><?php echo $_SESSION['street'];?> <?php echo $_SESSION['city'];?> <?php echo $_SESSION['region'];?></td>
								</tr>
								<tr>
									<td style="color:#126c49;font-weight:900;"> NUMBER: </td>
									<td align="right" style="text-align:right;"><?php echo $_SESSION['mobile_num'];?></td>
								</tr>
								<div id="gcashh" style="display:none;">
									<tr>
										<td style="color:#126c49;font-weight:900;"> ACCOUNT NAME: </td>
										<td align="right" style="text-align:right;"><?php echo $_SESSION['gcash_name'];?></td>
									</tr>
									<tr>
										<td style="color:#126c49;font-weight:900;"> ACCOUNT NUMBER: </td>
										<td align="right" style="text-align:right;"><?php echo $_SESSION['acc_num'];?></td>
									</tr>
									<tr>
										<td style="color:#126c49;font-weight:900;"> REFERENCE NUMBER: </td>
										<td align="right" style="text-align:right;"><?php echo $_SESSION['reference_num'];?></td>
									</tr>
								</div>
							</table>
						</div>
						<table style="margin-top:22px;">
						<?php
							if(!empty($_SESSION["mycart"])){
								$total = 0;
								foreach ($_SESSION["mycart"] as $key => $value) {
									?>
									<tr style="font-size: 14px; color:#5b5f5b;">
										<td style='width:1px; border:none;'><?php echo $value["quantity"];?></td>
										<td style='text-align: left; width:1px; border:none;'> x </td>
										<td style='text-align: left; width:250px; border:none;'><?php echo $value["name"]; ?></td>
										<td style='text-align: right; width:30px; border:none;'>₱<?php echo number_format($value["quantity"] * $value["price"], 2); ?></td>
									</tr>
									<?php
									$total = $total + ($value["quantity"] * $value["price"]);
								}
									?>
									<tr style='background-color:#fef9f3;'>
										<td style='text-align: left; height:20px; font-size:13px;color:#126c49; padding-top:25px;' colspan="2" align="left">SUBTOTAL</td>
										<th colspan="2" align="right" style='text-align: right; font-size:15px; padding-top:25px;'>₱ <?php echo number_format($total, 2); ?></th>

									</tr>
									<tr style='background-color:#fef9f3; margin-bottom:20px; font-size:13px; border-style: solid solid none solid; border-width: medium; border-color: #fef9f3 #fef9f3 #fef9f3 #fef9f3;'>
										<td style='text-align: left; color:#126c49; padding-bottom:30px;' colspan="3" align="left">SHIPPING FEE</td>
										<th  align="right" style='text-align: right; padding-bottom:30px; font-size:15px;'>₱40.00</th>

									</tr>
									<?php
									$total = $total + 40;
									$totall= $total;
									$_SESSION['total_'] = $totall;
								}
									?>
									<tr style='background-color:#fef9f3; color:#126c49; padding-top:45px;'>
										<td style='text-align: left; font-weight:900; ' colspan="2" align="left">TOTAL</td>
										<th colspan="2" align="right" style='text-align: right;'>₱ <?php echo number_format($totall, 2); ?></th>
									</tr>
									<tr>
										<th colspan="4">
										<div style="float: right; margin: 20px 0 20px 0; padding-top:38px;">
											<a href="cart.php?action=clearall&id=<?php echo $value["id"]; ?>" style="color: #e88f2b;"><i class="fas fa-arrow-left" style="margin-top:16px; color: #e88f2b;"></i>&nbsp; &nbsp;HOME</a><br>
										</div>
										</th>
									</tr>
									<?php
							?>
						</table>
					</div>
				</div>
			</div>
		<?php } ?>
		<div id="closebut" style="display:none; max-width: 100px;  width: 100%; margin: 220px auto 0px auto; position: absolute;left: 0;right: 0;z-index: 999;">
			<i style=" color:#126c49; margin-left:260px; font-size: 22px;" onclick="closeQr('')" id="closeqr" class="far fa-times-circle"></i>
		</div>
		<div id="qrcode" style="display:none; max-width: 500px;  width: 100%; margin: 350px auto 0px auto; position: absolute;left: 0;right: 0;z-index: 999;">
			<img style="width:500px; height:500px; " src="img/qr.png" alt="Fried Chicken">
		</div>
		<div class="container-fluid" id="checkoutcont">
			<div class="row justify-content-center">
				<div class="col-11 col-sm-10 col-md-10 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
					<div class="card px-0 pt-4 pb-0 mt-3 mb-3">
						<h1 id="heading">CHECKOUT</h1>
						<p>Please enter your details below to complete your purchase.  </p>
							<form method="post" id="msform" action="checkout.php">
								<ul id="progressbar">
									<li class="active" id="account"><strong>DELIVERY INFORMATION</strong></li>
									<li id="personal"><strong>PAYMENT</strong></li>
								</ul>
								<div class="progress">
								<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
								</div> <br> <!-- fieldsets -->
								<fieldset class="field2">
									<div class="form-card"  >
										<div class="row" id="info_">
											<div class="col-7" id="bakit">
												<h2 class="user_name" style=" text-transform: capitalize;"><?php echo $_SESSION['first_name']; ?> <?php echo $_SESSION['last_name']; ?></h2>
												<h2 class="user_info"><?php echo $_SESSION['mobile_num']; ?> </h2>
											</div>
											<div class="col-5">
												<h2 class="steps"><a href="settings.php">CHANGE</a></h2>
											</div>
										</div>
										<div>
										<input onclick="openUser('')" type="button" style="border-radius: 8px;" id="next_button" value="Next" /></div>
										<div id="input_address" class="heelo">
											<div class="fieldlabels">
											  <label>COMPLETE ADDRESS</label>
											  <input class="pls" type="text" name="street" placeholder="house number, street name, barangay" >
											</div>
											<div class="fieldlabels">
											  <label>CITY</label>
											  <input class="pls" type="text" name="city"  >
											</div>
											<div class="fieldlabels">
											  <label>REGION</label>
											  <input class="pls" type="text" name="region" >
											</div>
										</div>
									</div>
									<input type="button" name="next" style="border-radius: 8px;" class="next action-button" id="nextbutton_" value="Next" />
								</fieldset>
								<fieldset class="field1">
									<div class="form-card" id="vv">
										<div class="row" style="width:100%; display:flex;">
											<table id="table">
												<tr style="width:100%;">
													<td style='; width:50%; border:none;'>
													<input  onclick="showcod('')" type="radio" name="payment_method" id="choose-1" value="COD" checked="checked"/>
													<label for="choose-1" style="display: flex; margin-right:8px; left: 0px;">
														<i class="fas fa-motorcycle fa-border fa" id="icon">&nbsp; &nbsp; <p id="paymentinfo">CASH ON DELIVERY</p></i>
													</label></td>
													<td  style=' width:50%; text-align:right; border:none;'>
													<input onclick="showgcash('')" type="radio" name="payment_method" id="choose-2" value="GCASH"/>
													<label for="choose-2" style="display: flex; margin-left:8px; margin-right:-13px;">
													  <i class="far fa-credit-card fa-border fa "id="icon1">&nbsp; &nbsp; <p id="paymentinfo1">GCASH</p></i>
													</label></td>
												</tr>
											</table>
										</div>
										<div id="cod_info">
											<table id="table">
												<tr>
													<td colspan="2" style='font-size: 17px; font-size: 17px; color: #126c49; width:20px; border:none;'>SUBTOTAL</td>
													<td style='text-align: left; width:10px; border:none;'> </td>
													<td style='text-align: left; width:200px; border:none;'></td>
													<td style='text-align: right; font-size: 17px; width:30px; border:none;'>₱<?php echo number_format($_SESSION['total'],2); ?></td>
												</tr>
												<tr >
													<td colspan="2" style=' color: #126c49; width:20px; border:none;'>SHIPPING FEE</td>
													<td style='text-align: left; width:10px; border:none;'> </td>
													<td style='text-align: left; width:200px; border:none;'></td>
													<td style='text-align: right; font-size: 17px; width:30px; border:none;'>₱40.00</td>
												</tr>
												<tr >
													<td colspan="2" style='font-size: 17px; width:20px; font-weight:900; padding-top: 11px; color: #126c49; border:none;'>TOTAL PAYMENT</td>
													<td style='text-align: left; width:10px; border:none;'> </td>
													<td style='text-align: left; width:200px; border:none;'></td>
													<td style='text-align: right; font-size: 17px; margin-top: 6px; font-weight:900; width:30px; border:none;'>₱<?php echo number_format($_SESSION['total_'],2); ?></td>
												</tr>
											</table>
											<div id="cod_"
												<h6 id="instruc">SPECIAL INSTRUCTION</h6>
												<div class="fieldlabels">
												  <input type="text" name="instruction" >
												</div>
												<div class="ll">
													<div class="nexxt" id="regg" >
														<button type="submit" id="reg1" class="btn" name="checkout">CONFIRM</button>
													</div>
													<div >
														<input type="button" style="border-radius: 8px;" name="previous" class="previous action-button-previous" value="Previous" />
													</div>
												</div>
											</div>
										</div>
										<div id="card_info">
											<div style="text-align:right; margin-top: -10px;">
											<a class="form-group" onclick="openQR('')" href= "#" style="cursor: pointer;">
											CLICK THIS TO SCAN THE QR </a>
											</div>
											<div style="text-align:center; font-size:17px; margin-top: 40px;">
											To complete your payment confirmation, kindly fill out all holding details and send a copy of your payment receipt </a>
											</div>
											<div class="form-group" style="margin-top:27px;">
												<label>GCASH NAME</label>
												<input type="text" name="gcash_name"  size="20" autocomplete="off" id="cardNumber" class="form-control"  />
											</div>
											<form action="#" method="POST">
											<div class="form-group">
												<label>SCREENSHOT OF PAYMENT RECEIPT</label>
												<input type="file" style=" padding-bottom: 33px; font-size: 14px;" name="receipt" class="form-control" accept="image/*" >
											</div>
											</form>
											<div class="row" style="width:100%; display:flex; margin-bottom: -40px;">
												<table id="table">
													<tr style="width:100%;">
														<td style='; width:50%; border:none; padding-left: 16px;'>
														<label for="expiry" style="display: flex;">
															ACCOUNT NUMBER
														</label>
															<div class="col-xs-5">
																<input type="text" name="acc_num" size="11" id="cardExpMonth" class="form-control"  />
															</div>
														<td style=' width:50%; border:none; margin-right: 100px; margin-left: 70px; padding-left: 15px'>
															<label for="expiry" style="display: flex;">
																REFERENCE NUMBER
															</label>
															<div style="margin-right:-11px;" >
																<input type="text" name="reference_num" size="2" id="cardExpMonth" class="form-control"  />
															</div>
														</td>
													</tr>
												</table>
											</div>
											<br>
											<div class="ll">
												<div class="nexxt" id="regg" >
													<button type="submit" id="reg1" class="btn" name="checkoutt">CONFIRM</button>
												</div>
												<div >
												   <input type="button" style="border-radius: 8px;" name="previous" class="previous action-button-previous" value="Previous" />
												</div>
											</div>
										</div>
									</div>
								</fieldset>
							</form>
						 </div>
					</div>
				</div>
			</div>
		</div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://js.stripe.com/v3/"></script>
		<script src="./js/charge.js"></script>
		<script>

			function confirmCod() {
				document.getElementById('login_m').style.display="block";
			}
			function openUser() {
				document.getElementById('input_address').style.display="block";
				document.getElementById('input_address').style.display="block";
				document.getElementById('nextbutton_').style.display="block";
				document.getElementById('next_button').style.display="none";
			}
			function showcod(){
				document.getElementById('cod_').style.display ='block';
				document.getElementById('card_info').style.display="none";
				document.getElementById('icon').style.borderWidth="5px";
				document.getElementById('paymentinfo').style.color="#ffffff";
				document.getElementById('paymentinfo1').style.color="#126c49";
			}
			function showgcash(){
				document.getElementById('card_info').style.display ='block';
				document.getElementById('cod_').style.display="none";
				document.getElementById('icon').style.color="#126c49";
				document.getElementById('icon1').style.borderWidth="5px";
				document.getElementById('icon').style.background="#ffffff";
				document.getElementById('paymentinfo').style.color="#126c49";
				document.getElementById('paymentinfo1').style.color="#ffffff";
			}
			function openQR() {
				document.getElementById('qrcode').style.display="block";
				document.getElementById('closebut').style.display="block";
				var v = document.getElementById('checkoutcont');
				v.style.webkitFilter = "blur(3px)";
			}
			function closeQr() {
				document.getElementById('qrcode').style.display="none";
				document.getElementById('closebut').style.display="none";
				var v = document.getElementById('checkoutcont');
				v.style.webkitFilter = "blur(0px)";
			}

			$(document).ready(function(){

			var current_fs, next_fs, previous_fs; //fieldsets
			var opacity;
			var current = 1;
			var steps = $("fieldset").length;

			setProgressBar(current);

			$(".next").click(function(){

			current_fs = $(this).parent();
			next_fs = $(this).parent().next();

			//Add Class Active
			$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
			$("#vv").show();
			//show the next fieldset
			next_fs.show();
			//hide the current fieldset with style
			current_fs.animate({opacity: 0}, {
			step: function(now) {
			// for making fielset appear animation
			opacity = 1 - now;

			current_fs.css({
			'display': 'none',
			'position': 'relative'
			});
			next_fs.css({'opacity': opacity});
			},
			duration: 500
			});
			setProgressBar(++current);
			});

			$(".previous").click(function(){

			current_fs = $("#vv").parent();
			previous_fs = $("#vv").parent().prev();


			//Remove class active
			$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

			//show the previous fieldset
			$("#vv").hide();

			//hide the current fieldset with style
			current_fs.animate({opacity: 0}, {
			step: function(now) {
			// for making fielset appear animation
			opacity = 1 - now;

			previous_fs.css({
			'display': 'block',
			'position': 'relative'
			});
			previous_fs.css({'opacity': opacity});
			},
			duration: 500
			});
			setProgressBar(--current);
			});

			function setProgressBar(curStep){
			var percent = parseFloat(100 / steps) * curStep;
			percent = percent.toFixed();
			$(".progress-bar")
			.css("width",percent+"%")
			}

			});
		</script>

	</body>
</html>
