<?php
session_start();

	if (isset($_POST["add"])){
		if (isset($_SESSION["mycart"])){
			$_SESSION['total'] = $total;
			$_SESSION['total_'] = $totall;

			$item_array_id = array_column($_SESSION["mycart"],"id");
			if (!in_array($_GET["id"],$item_array_id)){
				$count = count($_SESSION["mycart"]);
				$item_array = array(
					'id' => $_GET["id"],
					'name' => $_POST["name"],
					'description' => $_POST['description'],
					'image' => $_POST["image"],
					'price' => $_POST["price"],
					'quantity' => $_POST["quantity"],
				);
				$_SESSION["mycart"][$count] = $item_array;
				echo '<script>window.location="nav.php"</script>';
			}else{
				echo '<script>alert("Product is already Added to Cart")</script>';
				echo '<script>window.location="nav.php"</script>';
			}
		}else{
			$item_array = array(
				'id' => $_GET["id"],
				'name' => $_POST["name"],
				'image' => $_POST["image"],
				'description'  => $_POST['description'],
				'price' => $_POST["price"],
				'quantity' => $_POST["quantity"],
			);
			$_SESSION["mycart"][0] = $item_array;
		}
    }
	if (isset($_GET["action"])){
		if ($_GET["action"] == "clearall") {
				unset($_SESSION["mycart"]);
		}
	}
    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
            foreach ($_SESSION["mycart"] as $keys => $value){
                if ($value["id"] == $_GET["id"]){
                    unset($_SESSION["mycart"][$keys]);
                }
            }
        }
    }
	if(empty($_SESSION["mycart"])){
		echo "<script>alert('Your cart is empty');document.location='index.php'</script>";
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>My Shopping Cart</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="css/cart.css">
</head>
<body style='font-family: Lato, sans-serif; '>
	<!-- CART DETAILS -->
	<div style='margin-bottom: 400px; position: relative;'>
		<?php
		 include("nav.php");
		 ?>
		<div class="cart_container" style='display: flex; justify-content: space-between; margin-bottom:310px; position: relative;'>
			<div style=' float:left; width: 66%; margin-left:64px;'>
				<table style='margin-top: 100px;'class="table">
					<thead>
						<tr style='border-style: solid solid solid solid; border-width: medium;  border-color: #ffffff #ffffff #fdf4e9 #ffffff; margin-left: 4px;'>
							<th style='font-size: 40px; color: #e88f2b; font-weight: 900;' colspan='5'>ORDER</th>
							<th colspan="2" style="color:#126c49; text-align: right; font-size:18px; margin-right:20px; padding-bottom:22px;"><?php
							if (isset($_SESSION['mycart'])){
								foreach ($_SESSION["mycart"] as $key => $value) {
									$count += $value["quantity"];
								}
							echo "<span id=\"cart_count\" >$count</span>";
							}
							?> &nbsp;ITEMS</th>
						</tr>
					</thead>
					<tr style='color:#126c49; font-size: 19px; height:60px;' >
						<th width="26%" colspan="2" >PRODUCT DETAILS</th>
						<th width="1%" >&nbsp; </th>
						<th width="10%" style='text-align: right;'>PRICE</th>
						<th width="11%" style='text-align: right;'>QUANTITY</th>
						<th width="10%" style='text-align: right; padding-right:-50px;'>&nbsp; &nbsp; TOTAL PRICE</th>
						<th width="2%" style='text-align: right padding-left:40px;'></th>
					</tr>
				<?php
					if(!empty($_SESSION["mycart"])){
						$total = 0;
						foreach ($_SESSION["mycart"] as $key => $value) {
							?>
							<tr style='font-family: Lato, sans-serif; font-size: 18px; background-color:#fef9f3; border-style: solid none solid none; border-width: 16px;  border-color: #ffffff #ffffff #ffffff #ffffff; '>
								<td style=' border:none;'><img style='width: 120px; height: 120px; margin-left: 20px; margin-top: 10px;' src="img/<?php echo $value["image"]; ?>"/></td>
								<td style='  padding-top: 30px; text-align: left; font-size: 20px; padding-left: -60px; text-decoration: none; border:none;'><p style="font-weight:bold; "><?php echo $value["name"]; ?></p><p style="color:#5b5f5b;"><?php echo $value["description"]; ?></p></td>
								<td colspan="2"  style='padding-top: 30px; align-items: center; text-align: right; border:none; padding-right: 15px;'>₱<?php echo number_format ($value["price"],2); ?></td>
								<td style='padding-top: 30px; text-align: right; border:none; padding-right: 15px;'><?php echo $value["quantity"]; ?></td>
								<td style='padding-top: 30px; text-align: right; border:none; padding-right: 17px;'>
									₱ <?php echo number_format($value["quantity"] * $value["price"], 2); ?></td>
								<td style='padding-top: 30px; text-align: right; cursor: pointer; padding-right:25px; padding-left:35px; border:none;'>
								<a style='color:#e88f2b; text-decoration: none;' href="cart.php?action=delete&id=<?php echo $value["id"]; ?>"><span
											class="remove_click">Remove </span></a></td>
							</tr>
							<?php

							$total = $total + ($value["quantity"] * $value["price"]);
							$_SESSION['total'] = $total;
						}
							?>
							<tr>
								<td  colspan="5" style='padding-left: 43px; color: #126c49; font-size:20px; font-weight:bold;' align="left">TOTAL</td>
								<th style='text-align: right; padding-right: 20px; padding-top: 20px; font-size:17px;'>₱ <?php echo number_format($total, 2); ?></th>
								<td style='text-align: right; padding-left: -20px;'><a style=' color:#e88f2b; font-weight: bold; border-radius: 15px; background: #fef9f3; padding-left:20px; margin-right: -6px; padding-right:20px;'class='btn' href="cart.php?action=clearall&id=<?php echo $value["id"]; ?>">Clear All</a></td>
							</tr>
							<?php
						}
					?>
				</table>
			</div>
			<!-- ORDER SUMMARY -->
			<div style='float: right; margin-right:50px; width: 450px;'>
				<table style='margin-top: 100px;'class="table">
					<thead>
						<tr style='border-style: solid solid solid solid; border-width: medium; border-color: #ffffff #ffffff #fef9f3 #ffffff; margin: 4px;'>
							<th style='font-size: 40px; color: #e88f2b; padding-left:40px' colspan='5'> &nbsp;</th>
						</tr>
					</thead>
					<tr style='color:#e88f2b; background-color:#fef9f3; height:60px;' >
						<th colspan="4" width="143px" style='text-align:center; font-size: 17px;' >&nbsp; &nbsp; ORDER SUMMARY</th>
					</tr>
					<?php
					if(!empty($_SESSION["mycart"])){
						$total = 0;
						foreach ($_SESSION["mycart"] as $key => $value) {
							?>
							<tr style='background-color:#fef9f3;'>
								<td style='width:20px; border:none;'><?php echo $value["quantity"]; ?></td>
								<td style='text-align: left; width:10px; border:none;'> x </td>
								<td style='text-align: left; width:200px; border:none;'><?php echo $value["name"]; ?></td>
								<td style='text-align: right; width:30px; border:none;'>₱<?php echo number_format($value["quantity"] * $value["price"], 2); ?></td>
							</tr>
							<?php
							$total = $total + ($value["quantity"] * $value["price"]);
						}
							?>
							<tr style='background-color:#fef9f3; '>
								<td style='text-align: left; height:20px; font-size:13px;color:#126c49;' colspan="2" align="left">SUBTOTAL</td>
								<th colspan="2" align="right" style='text-align: right; font-size:15px;'>₱ <?php echo number_format($total, 2); ?></th>

							</tr>
							<tr style='background-color:#fef9f3; font-size:13px; border-style: solid solid none solid; border-width: medium; border-color: #fef9f3 #fef9f3 #fef9f3 #fef9f3;'>
								<td style='text-align: left; color:#126c49; padding-bottom:20px;' colspan="3" align="left">SHIPPING FEE</td>
								<th  align="right" style='text-align: right; font-size:15px;'>₱40.00</th>

							</tr>
							<?php
							$total = $total + 40;
							$totall= $total;
							$_SESSION['total_'] = $totall;
						}
							?>
							<tr style='background-color:#fef9f3; color:#126c49;'>
								<td style='text-align: left; ' colspan="2" align="left">TOTAL</td>
								<th colspan="2" align="right" style='text-align: right;'>₱ <?php echo number_format($totall, 2); ?></th>
							</tr>
							<tr style='background-color:#fef9f3; color:#126c49;'>
								<th colspan="4" align="center" style='text-align: center; padding-top:70px; padding-bottom:30px;'><a style='color:white; font-size:22px; font-weight: 900; padding: 5px 35px 5px 35px; border-radius: 8px; background-color:#e88f2b; text-decoration: none;' href="checkout.php"><span
											class="remove_click">CHECKOUT </span></a></th>
							</tr>
						<?php
					?>
				</table>
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
