<?php

include ('nav.php');
session_start();

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Menu</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
		<script src="https://code.iconify.design/2/2.1.2/iconify.min.js"></script>
		<link rel="stylesheet" href="css/menu.css">
	</head>
	<body>
		<div class="menubar">
		<!-- MENU NAVBAR -->
			<div class="nav-menu">
				<ul>
					<li >
						<a id="breakfast_" onclick="openBreakfast('')" href= "#" style="cursor: pointer;">
						<i id="iconbreakfast" class="fas fa-egg-fried"></i>Breakfast</a>
					</li>
					<li>
						<a id="maincourse_" onclick="openMain_course('')" href= "#" style="cursor: pointer;">
						<i id="iconmaincourse" class="fas fa-turkey"></i>Main Course</a>
					</li>
					<li>
						<a id="merienda_" onclick="openMerienda('')" href="#">
						<span id="iconmerienda" style="font-size: 30px;" class="iconify" data-icon="mdi:noodles"></span>Merienda</a>
					</li>
					<li>
						<a id="vegetable_" onclick="openVegetables('')" href="#">
						<i id="iconvegetable" class="fas fa-salad"></i>Vegetables</a>
					</li>
					<li><a id="sandwich_" onclick="openSandwiches('')" href="#">
						<i id="iconsandwich" class="fas fa-sandwich"></i>Sandwiches</a>
					</li>
					<li>
						<a id="dessert_" onclick="openDesserts('')" href="#">
						<span id="icondessert" style="font-size: 30px;" class="iconify" data-icon="emojione-monotone:ice-cream"></span>Desserts</a>
					</li>
					<li><a id="beverage_" onclick="openBeverages('')" href="#">
						<i id="iconbeverage" class="fas fa-mug-hot"></i>Beverages</a>
					</li>
					<li><a id="others_" onclick="openOthers('')" href="#">
						<i id="iconothers" style="padding-right:10px; padding-bottom: 7px; font-size: 38px;" class="iconify" data-icon="mdi:rice"></i>Others</a>
					</li>
				</ul>
			</div>
		</div>
		<!-- BREAKFAST -->
		<div  id="breakfast" style="font-size: 300px; width: 100%; margin-right: 111px; padding-left: 18px;" >
			<div style='display:flex; flex-wrap:wrap;'>
				<?php
					$query = "SELECT * FROM product WHERE category = 'Breakfast' AND status='In stock'";
					$result = mysqli_query($conn,$query);
					if(mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_array($result)) {
							?>
							<div style='background: #fef9f3; box-shadow: 0 1px 6px 0 rgba(0, 0, 0, 0.07), 0 4px 25px 0 rgba(0, 0, 0, 0.07); border-radius: 15px; width: 300px; padding-right: -140px; margin-top: 40px; margin-left: 50px; margin-right: 50px; margin-bottom: 80px; '>
								<form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>">
									<div class="product">
										<img style='width: 220px; height: 200px; margin-top:-270px; margin-left: 37px;' src="img/<?php echo $row["image"]; ?>"  height="200px">
										<h5 style='margin-top: -175px; font-weight: 900;'class="mx-3 text-center"><?php echo $row["name"]; ?></h5>
										<h6 class="mx-3 text-center" style='margin-bottom: 28px; margin-top:20px; color:#5b5f5b;'><?php echo $row["description"]; ?></h6>
										<div style='display:flex; margin-bottom: 13px;'>
											<h5 style='margin-top:10px; margin-left:20px; font-size: 20px;' class="tmx-3 text-center">₱ <?php echo number_format($row["price"], 2); ?></h5>
											<input type='hidden' name='id' value="<?php echo $row["id"]; ?>" id="id<?php echo $row["id"]; ?>">
											<input type='hidden' name='name' value="<?php echo $row["name"]; ?>" id="name<?php echo $row["id"]; ?>">
											<input type='hidden' name='description' value="<?php echo $row["description"]; ?>" id="description<?php echo $row["id"]; ?>">
											<input type='hidden' name='image' value="<?php echo $row["image"]; ?>" id="image<?php echo $row["id"]; ?>">
											<input type='hidden' name='price' value="<?php echo $row["price"]; ?>" id="price<?php echo $row["id"]; ?>">
											<input type='hidden' name='quantity' value="1" id="quantity<?php echo $row["id"]; ?>">
											<input style='margin-left: 69px; padding: 3px 19px 3px 19px; border-radius: 15px; color:#ffffff'type='submit' name='add' id="<?php echo $row["id"]; ?>" class='btn btn-warning my-2 add_cart' value='Add to Cart' style='margin-left: 100px;'>
										</div>
									</div>
								</form>
							</div>
							<?php
						}
					}
				?>
			</div>
		</div>
		<!-- MAINCOURSE -->
		<div  id="maincourse" style="font-size: 300px; width: 100%; margin-right: 111px; padding-left: 18px; display: none;" >
			<div style='display:flex; flex-wrap:wrap;'>
				<?php
					$query = "SELECT * FROM product WHERE category = 'Main Course' AND status='In stock'";
					$result = mysqli_query($conn,$query);
					if(mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_array($result)) {
							?>
							<div style='background: #fef9f3; box-shadow: 0 1px 6px 0 rgba(0, 0, 0, 0.07), 0 4px 25px 0 rgba(0, 0, 0, 0.07); border-radius: 15px; width: 300px; padding-right: -140px; margin-top: 40px; margin-left: 50px; margin-right: 50px; margin-bottom: 80px; '>
								<form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>">
									<div class="product">
										<img style='width: 220px; height: 200px; margin-top:-270px; margin-left: 37px;' src="img/<?php echo $row["image"]; ?>"  height="200px">
										<h5 style='margin-top: -175px; font-weight: 900;'class="mx-3 text-center"><?php echo $row["name"]; ?></h5>
										<h6 class="mx-3 text-center" style='margin-bottom: 28px; margin-top:20px; color:#5b5f5b;'><?php echo $row["description"]; ?></h6>
										<div style='display:flex; margin-bottom: 13px;'>
											<h5 style='margin-top:10px; margin-left:13px; font-size: 20px;' class="tmx-3 text-center">₱ <?php echo number_format($row["price"], 2); ?></h5>
											<input type='hidden' name='id' value="<?php echo $row["id"]; ?>" id="id<?php echo $row["id"]; ?>">
											<input type='hidden' name='name' value="<?php echo $row["name"]; ?>" id="name<?php echo $row["id"]; ?>">
											<input type='hidden' name='image' value="<?php echo $row["image"]; ?>" id="image<?php echo $row["id"]; ?>">
											<input type='hidden' name='description' value="<?php echo $row["description"]; ?>" id="description<?php echo $row["id"]; ?>">
											<input type='hidden' name='price' value="<?php echo $row["price"]; ?>" id="price<?php echo $row["id"]; ?>">
											<input type='hidden' name='quantity' value="1" id="quantity<?php echo $row["id"]; ?>">
											<input style='margin-left: 65px; padding: 3px 19px 3px 19px; border-radius: 15px; color:#ffffff'type='submit' name='add' id="<?php echo $row["id"]; ?>" class='btn btn-warning my-2 add_cart' value='Add to Cart' style='margin-left: 100px;'>
										</div>
									</div>
								</form>
							</div>
							<?php
						}
					}
				?>
			</div>
		</div>
		<!-- MERIENDA -->
		<div  id="merienda" style="font-size: 300px; width: 100%; margin-right: 111px; padding-left: 18px; display: none;" >
			<div style='display:flex; flex-wrap:wrap;'>
				<?php
					$query = "SELECT * FROM product WHERE category = 'Merienda' AND status='In stock'";
					$result = mysqli_query($conn,$query);
					if(mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_array($result)) {
							?>
							<div style='background: #fef9f3; box-shadow: 0 1px 6px 0 rgba(0, 0, 0, 0.07), 0 4px 25px 0 rgba(0, 0, 0, 0.07); border-radius: 15px; width: 300px; padding-right: -140px; margin-top: 40px; margin-left: 50px; margin-right: 50px; margin-bottom: 80px; '>
								<form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>">
									<div class="product">
										<img style='width: 220px; height: 200px; margin-top:-270px; margin-left: 37px;' src="img/<?php echo $row["image"]; ?>"  height="200px">
										<h5 style='margin-top: -175px; font-weight: 900;'class="mx-3 text-center"><?php echo $row["name"]; ?></h5>
										<h6 class="mx-3 text-center" style='margin-bottom: 28px; margin-top:20px; color:#5b5f5b;'><?php echo $row["description"]; ?></h6>
										<div style='display:flex; margin-bottom: 13px;'>
											<h5 style='margin-top:10px; margin-left:13px; font-size: 20px;' class="tmx-3 text-center">₱ <?php echo number_format($row["price"], 2); ?></h5>
											<input type='hidden' name='id' value="<?php echo $row["id"]; ?>" id="id<?php echo $row["id"]; ?>">
											<input type='hidden' name='name' value="<?php echo $row["name"]; ?>" id="name<?php echo $row["id"]; ?>">
											<input type='hidden' name='image' value="<?php echo $row["image"]; ?>" id="image<?php echo $row["id"]; ?>">
											<input type='hidden' name='description' value="<?php echo $row["description"]; ?>" id="description<?php echo $row["id"]; ?>">
											<input type='hidden' name='price' value="<?php echo $row["price"]; ?>" id="price<?php echo $row["id"]; ?>">
											<input type='hidden' name='quantity' value="1" id="quantity<?php echo $row["id"]; ?>">
											<input style='margin-left: 65px; padding: 3px 19px 3px 19px; border-radius: 15px; color:#ffffff'type='submit' name='add' id="<?php echo $row["id"]; ?>" class='btn btn-warning my-2 add_cart' value='Add to Cart' style='margin-left: 100px;'>
										</div>
									</div>
								</form>
							</div>
							<?php
						}
					}
				?>
			</div>
		</div>
		<!-- VEGETABLE -->
		<div  id="vegetables" style="font-size: 300px; width: 100%; margin-right: 111px; padding-left: 18px; display: none;" >
			<div style='display:flex; flex-wrap:wrap;'>
				<?php
					$query = "SELECT * FROM product WHERE category = 'Vegetables' AND status='In stock'";
					$result = mysqli_query($conn,$query);
					if(mysqli_num_rows($result) > 0) {

						while ($row = mysqli_fetch_array($result)) {

							?>
							<div style='background: #fef9f3; box-shadow: 0 1px 6px 0 rgba(0, 0, 0, 0.07), 0 4px 25px 0 rgba(0, 0, 0, 0.07); border-radius: 15px; width: 300px; padding-right: -140px; margin-top: 40px; margin-left: 50px; margin-right: 50px; margin-bottom: 80px; '>

								<form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>">

									<div class="product">
										<img style='width: 220px; height: 200px; margin-top:-270px; margin-left: 37px;' src="img/<?php echo $row["image"]; ?>"  height="200px">
										<h5 style='margin-top: -175px; font-weight: 900;'class="mx-3 text-center"><?php echo $row["name"]; ?></h5>
										<h6 class="mx-3 text-center" style='margin-bottom: 28px; margin-top:20px; color:#5b5f5b;'><?php echo $row["description"]; ?></h6>
										<div style='display:flex; margin-bottom: 13px;'>
											<h5 style='margin-top:10px; margin-left:13px; font-size: 20px;' class="tmx-3 text-center">₱ <?php echo number_format($row["price"], 2); ?></h5>

											<input type='hidden' name='id' value="<?php echo $row["id"]; ?>" id="id<?php echo $row["id"]; ?>">
											<input type='hidden' name='name' value="<?php echo $row["name"]; ?>" id="name<?php echo $row["id"]; ?>">
											<input type='hidden' name='image' value="<?php echo $row["image"]; ?>" id="image<?php echo $row["id"]; ?>">
											<input type='hidden' name='description' value="<?php echo $row["description"]; ?>" id="description<?php echo $row["id"]; ?>">
											<input type='hidden' name='price' value="<?php echo $row["price"]; ?>" id="price<?php echo $row["id"]; ?>">
											<input type='hidden' name='quantity' value="1" id="quantity<?php echo $row["id"]; ?>">
											<input style='margin-left: 65px; padding: 3px 19px 3px 19px; border-radius: 15px; color:#ffffff'type='submit' name='add' id="<?php echo $row["id"]; ?>" class='btn btn-warning my-2 add_cart' value='Add to Cart' style='margin-left: 100px;'>
										</div>
									</div>
								</form>
							</div>
							<?php
						}
					}
				?>
			</div>
		</div>
		<!-- SANDWICHES -->
		<div  id="sandwiches" style="font-size: 300px; width: 100%; margin-right: 111px; padding-left: 18px; display: none;" >
			<div style='display:flex; flex-wrap:wrap;'>
				<?php
					$query = "SELECT * FROM product WHERE category = 'Sandwiches' AND status='In stock'";
					$result = mysqli_query($conn,$query);
					if(mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_array($result)) {
							?>
							<div style='background: #fef9f3; box-shadow: 0 1px 6px 0 rgba(0, 0, 0, 0.07), 0 4px 25px 0 rgba(0, 0, 0, 0.07); border-radius: 15px; width: 300px; padding-right: -140px; margin-top: 40px; margin-left: 50px; margin-right: 50px; margin-bottom: 80px; '>
								<form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>">
									<div class="product">
										<img style='width: 220px; height: 200px; margin-top:-270px; margin-left: 37px;' src="img/<?php echo $row["image"]; ?>"  height="200px">
										<h5 style='margin-top: -175px; font-weight: 900;'class="mx-3 text-center"><?php echo $row["name"]; ?></h5>
										<h6 class="mx-3 text-center" style='margin-bottom: 28px; margin-top:20px; color:#5b5f5b;'><?php echo $row["description"]; ?></h6>
										<div style='display:flex; margin-bottom: 13px;'>
											<h5 style='margin-top:10px; margin-left:13px; font-size: 20px;' class="tmx-3 text-center">₱ <?php echo number_format($row["price"], 2); ?></h5>

											<input type='hidden' name='id' value="<?php echo $row["id"]; ?>" id="id<?php echo $row["id"]; ?>">
											<input type='hidden' name='name' value="<?php echo $row["name"]; ?>" id="name<?php echo $row["id"]; ?>">
											<input type='hidden' name='image' value="<?php echo $row["image"]; ?>" id="image<?php echo $row["id"]; ?>">
											<input type='hidden' name='description' value="<?php echo $row["description"]; ?>" id="description<?php echo $row["id"]; ?>">
											<input type='hidden' name='price' value="<?php echo $row["price"]; ?>" id="price<?php echo $row["id"]; ?>">
											<input type='hidden' name='quantity' value="1" id="quantity<?php echo $row["id"]; ?>">
											<input style='margin-left: 65px; padding: 3px 19px 3px 19px; border-radius: 15px; color:#ffffff'type='submit' name='add' id="<?php echo $row["id"]; ?>" class='btn btn-warning my-2 add_cart' value='Add to Cart' style='margin-left: 100px;'>
										</div>
									</div>
								</form>
							</div>
							<?php
						}
					}
				?>
			</div>
		</div>
		<!-- DESSERTS -->
		<div  id="desserts" style="font-size: 300px; width: 100%; margin-right: 111px; padding-left: 18px; display: none;" >
			<div style='display:flex; flex-wrap:wrap;'>
				<?php
					$query = "SELECT * FROM product WHERE category = 'Desserts' AND status='In stock'";
					$result = mysqli_query($conn,$query);
					if(mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_array($result)) {
							?>
							<div style='background: #fef9f3; box-shadow: 0 1px 6px 0 rgba(0, 0, 0, 0.07), 0 4px 25px 0 rgba(0, 0, 0, 0.07); border-radius: 15px; width: 300px; padding-right: -140px; margin-top: 40px; margin-left: 50px; margin-right: 50px; margin-bottom: 80px; '>
								<form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>">
									<div class="product">
										<img style='width: 220px; height: 200px; margin-top:-270px; margin-left: 37px;' src="img/<?php echo $row["image"]; ?>"  height="200px">
										<h5 style='margin-top: -175px; font-weight: 900;'class="mx-3 text-center"><?php echo $row["name"]; ?></h5>
										<h6 class="mx-3 text-center" style='margin-bottom: 28px; margin-top:20px; color:#5b5f5b;'><?php echo $row["description"]; ?></h6>
										<div style='display:flex; margin-bottom: 13px;'>
											<h5 style='margin-top:10px; margin-left:13px; font-size: 20px;' class="tmx-3 text-center">₱ <?php echo number_format($row["price"], 2); ?></h5>
											<input type='hidden' name='id' value="<?php echo $row["id"]; ?>" id="id<?php echo $row["id"]; ?>">
											<input type='hidden' name='name' value="<?php echo $row["name"]; ?>" id="name<?php echo $row["id"]; ?>">
											<input type='hidden' name='image' value="<?php echo $row["image"]; ?>" id="image<?php echo $row["id"]; ?>">
											<input type='hidden' name='description' value="<?php echo $row["description"]; ?>" id="description<?php echo $row["id"]; ?>">
											<input type='hidden' name='price' value="<?php echo $row["price"]; ?>" id="price<?php echo $row["id"]; ?>">
											<input type='hidden' name='quantity' value="1" id="quantity<?php echo $row["id"]; ?>">
											<input style='margin-left: 65px; padding: 3px 19px 3px 19px; border-radius: 15px; color:#ffffff'type='submit' name='add' id="<?php echo $row["id"]; ?>" class='btn btn-warning my-2 add_cart' value='Add to Cart' style='margin-left: 100px;'>
										</div>
									</div>
								</form>
							</div>
							<?php
						}
					}
				?>
			</div>
		</div>
		<!-- BEVERAGES -->
		<div  id="beverages" style="font-size: 300px; width: 100%; margin-right: 111px; padding-left: 18px; display: none;" >
			<div style='display:flex; flex-wrap:wrap;'>
				<?php
					$query = "SELECT * FROM product WHERE category = 'Beverages' AND status='In stock'";
					$result = mysqli_query($conn,$query);
					if(mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_array($result)) {
							?>
							<div style='background: #fef9f3; box-shadow: 0 1px 6px 0 rgba(0, 0, 0, 0.07), 0 4px 25px 0 rgba(0, 0, 0, 0.07); border-radius: 15px; width: 300px; padding-right: -140px; margin-top: 40px; margin-left: 50px; margin-right: 50px; margin-bottom: 80px; '>
								<form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>">
									<div class="product">
										<img style='width: 220px; height: 200px; margin-top:-270px; margin-left: 37px;' src="img/<?php echo $row["image"]; ?>"  height="200px">
										<h5 style='margin-top: -175px; font-weight: 900;'class="mx-3 text-center"><?php echo $row["name"]; ?></h5>
										<h6 class="mx-3 text-center" style='margin-bottom: 28px; margin-top:20px; color:#5b5f5b;'><?php echo $row["description"]; ?></h6>
										<div style='display:flex; margin-bottom: 13px;'>
											<h5 style='margin-top:10px; margin-left:20px; font-size: 20px;' class="tmx-3 text-center">₱ <?php echo number_format($row["price"], 2); ?></h5>
											<input type='hidden' name='id' value="<?php echo $row["id"]; ?>" id="id<?php echo $row["id"]; ?>">
											<input type='hidden' name='name' value="<?php echo $row["name"]; ?>" id="name<?php echo $row["id"]; ?>">
											<input type='hidden' name='description' value="<?php echo $row["description"]; ?>" id="description<?php echo $row["id"]; ?>">
											<input type='hidden' name='image' value="<?php echo $row["image"]; ?>" id="image<?php echo $row["id"]; ?>">
											<input type='hidden' name='price' value="<?php echo $row["price"]; ?>" id="price<?php echo $row["id"]; ?>">
											<input type='hidden' name='quantity' value="1" id="quantity<?php echo $row["id"]; ?>">
											<input style='margin-left: 69px; padding: 3px 19px 3px 19px; border-radius: 15px; color:#ffffff'type='submit' name='add' id="<?php echo $row["id"]; ?>" class='btn btn-warning my-2 add_cart' value='Add to Cart' style='margin-left: 100px;'>
										</div>
									</div>
								</form>
							</div>
							<?php
						}
					}
				?>
			</div>
		</div>
		<!-- OTHERS -->
		<div  id="others" style="font-size: 300px; width: 100%; margin-right: 111px; padding-left: 18px; display: none;" >
			<div style='display:flex; flex-wrap:wrap;'>
				<?php
					$query = "SELECT * FROM product WHERE category = 'Others' AND status='In stock'";
					$result = mysqli_query($conn,$query);
					if(mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_array($result)) {
							?>
							<div style='background: #fef9f3; box-shadow: 0 1px 6px 0 rgba(0, 0, 0, 0.07), 0 4px 25px 0 rgba(0, 0, 0, 0.07); border-radius: 15px; width: 300px; padding-right: -140px; margin-top: 40px; margin-left: 50px; margin-right: 50px; margin-bottom: 80px; '>
								<form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>">
									<div class="product">
										<img style='width: 220px; height: 200px; margin-top:-270px; margin-left: 37px;' src="img/<?php echo $row["image"]; ?>"  height="200px">
										<h5 style='margin-top: -175px; font-weight: 900;'class="mx-3 text-center"><?php echo $row["name"]; ?></h5>
										<h6 class="mx-3 text-center" style='margin-bottom: 28px; margin-top:20px; color:#5b5f5b;'><?php echo $row["description"]; ?></h6>
										<div style='display:flex; margin-bottom: 13px;'>
											<h5 style='margin-top:10px; margin-left:20px; font-size: 20px;' class="tmx-3 text-center">₱ <?php echo number_format($row["price"], 2); ?></h5>
											<input type='hidden' name='id' value="<?php echo $row["id"]; ?>" id="id<?php echo $row["id"]; ?>">
											<input type='hidden' name='name' value="<?php echo $row["name"]; ?>" id="name<?php echo $row["id"]; ?>">
											<input type='hidden' name='description' value="<?php echo $row["description"]; ?>" id="description<?php echo $row["id"]; ?>">
											<input type='hidden' name='image' value="<?php echo $row["image"]; ?>" id="image<?php echo $row["id"]; ?>">
											<input type='hidden' name='price' value="<?php echo $row["price"]; ?>" id="price<?php echo $row["id"]; ?>">
											<input type='hidden' name='quantity' value="1" id="quantity<?php echo $row["id"]; ?>">
											<input style='margin-left: 69px; padding: 3px 19px 3px 19px; border-radius: 15px; color:#ffffff'type='submit' name='add' id="<?php echo $row["id"]; ?>" class='btn btn-warning my-2 add_cart' value='Add to Cart' style='margin-left: 100px;'>
										</div>
									</div>
								</form>
							</div>
							<?php
						}
					}
				?>
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

		<script type="text/javascript">
		   $(document).on("click",".add_cart", function(event){
			event.preventDefault();
			   var id = $(this).attr("id");
			   var name = $("#name"+id+"").val();
			   var image = $("#image"+id+"").val();
			   var description = $("#description"+id+"").val();
			   var price = $("#price"+id+"").val();
			   var quantity = $("#quantity"+id+"").val();
			   var action = "add";

			   $.ajax({
				  url: "ajax/cart_action.php",
				  method:"POST",
				  dataType:"JSON",
				  data: {id:id,name:name,image:image,description:description,price:price,quantity:quantity,action:action},
				  success:function(data){

				  }
			   });
		   });

		   function openBreakfast() {

				document.getElementById('breakfast').style.display="block";
				document.getElementById('iconbreakfast').style.display="inline-block";
				document.getElementById('iconbreakfast').style.color="#ffffff";
				document.getElementById('breakfast_').style.color="#ffffff";
				document.getElementById('breakfast_').style.background="#126c49";

				document.getElementById('iconmaincourse').style.display="none";
				document.getElementById('maincourse_').style.color="#126c49";
				document.getElementById('maincourse_').style.background="#fef9f3";

				document.getElementById('iconmerienda').style.display="none";
				document.getElementById('merienda_').style.color="#126c49";
				document.getElementById('merienda_').style.background="#fef9f3";

				document.getElementById('iconsandwich').style.display="none";
				document.getElementById('sandwich_').style.color="#126c49";
				document.getElementById('sandwich_').style.background="#fef9f3";

				document.getElementById('icondessert').style.display="none";
				document.getElementById('dessert_').style.color="#126c49";
				document.getElementById('dessert_').style.background="#fef9f3";

				document.getElementById('iconbeverage').style.display="none";
				document.getElementById('beverage_').style.color="#126c49";
				document.getElementById('beverage_').style.background="#fef9f3";

				document.getElementById('iconothers').style.display="none";
				document.getElementById('others_').style.color="#126c49";
				document.getElementById('others_').style.background="#fef9f3";

				document.getElementById('maincourse').style.display="none";
				document.getElementById('merienda').style.display="none";
				document.getElementById('vegetables').style.display="none";
				ocument.getElementById('sandwiches').style.display="none";
				document.getElementById('desserts').style.display="none";
				document.getElementById('beverages').style.display="none";
				document.getElementById('others').style.display="none";

			}
			function openMain_course() {
				document.getElementById('maincourse').style.display="block";
				document.getElementById('iconmaincourse').style.display="inline-block";
				document.getElementById('iconmaincourse').style.color="#ffffff";
				document.getElementById('maincourse_').style.color="#ffffff";
				document.getElementById('maincourse_').style.background="#126c49";

				document.getElementById('iconbreakfast').style.display="none";
				document.getElementById('breakfast_').style.color="#126c49";
				document.getElementById('breakfast_').style.background="#fef9f3";

				document.getElementById('iconmerienda').style.display="none";
				document.getElementById('merienda_').style.color="#126c49";
				document.getElementById('merienda_').style.background="#fef9f3";

				document.getElementById('iconvegetable').style.display="none";
				document.getElementById('vegetable_').style.color="#126c49";
				document.getElementById('vegetable_').style.background="#fef9f3";

				document.getElementById('iconsandwich').style.display="none";
				document.getElementById('sandwich_').style.color="#126c49";
				document.getElementById('sandwich_').style.background="#fef9f3";

				document.getElementById('icondessert').style.display="none";
				document.getElementById('dessert_').style.color="#126c49";
				document.getElementById('dessert_').style.background="#fef9f3";

				document.getElementById('iconbeverage').style.display="none";
				document.getElementById('beverage_').style.color="#126c49";
				document.getElementById('beverage_').style.background="#fef9f3";

				document.getElementById('iconothers').style.display="none";
				document.getElementById('others_').style.color="#126c49";
				document.getElementById('others_').style.background="#fef9f3";

				document.getElementById('breakfast').style.display="none";
				document.getElementById('merienda').style.display="none";
				document.getElementById('vegetables').style.display="none";
				document.getElementById('desserts').style.display="none";
				document.getElementById('beverages').style.display="none";
				ocument.getElementById('sandwiches').style.display="none";
				document.getElementById('maincourse_').style.color="#ffffff";
				document.getElementById('others').style.display="none";

			}

			function openMerienda() {
				document.getElementById('merienda').style.display="block";
				document.getElementById('iconmerienda').style.display="inline-block";
				document.getElementById('iconmerienda').style.color="#ffffff";
				document.getElementById('merienda_').style.color="#ffffff";
				document.getElementById('merienda_').style.background="#126c49";

				document.getElementById('iconbreakfast').style.display="none";
				document.getElementById('breakfast_').style.color="#126c49";
				document.getElementById('breakfast_').style.background="#fef9f3";

				document.getElementById('iconmaincourse').style.display="none";
				document.getElementById('maincourse_').style.color="#126c49";
				document.getElementById('maincourse_').style.background="#fef9f3";

				document.getElementById('iconvegetable').style.display="none";
				document.getElementById('vegetable_').style.color="#126c49";
				document.getElementById('vegetable_').style.background="#fef9f3";

				document.getElementById('iconsandwich').style.display="none";
				document.getElementById('sandwich_').style.color="#126c49";
				document.getElementById('sandwich_').style.background="#fef9f3";

				document.getElementById('icondessert').style.display="none";
				document.getElementById('dessert_').style.color="#126c49";
				document.getElementById('dessert_').style.background="#fef9f3";

				document.getElementById('iconbeverage').style.display="none";
				document.getElementById('beverage_').style.color="#126c49";
				document.getElementById('beverage_').style.background="#fef9f3";

				document.getElementById('iconothers').style.display="none";
				document.getElementById('others_').style.color="#126c49";
				document.getElementById('others_').style.background="#fef9f3";


				document.getElementById('maincourse').style.display="none";
				document.getElementById('breakfast').style.display="none";
				document.getElementById('vegetables').style.display="none";
				ocument.getElementById('sandwiches').style.display="none";
				document.getElementById('desserts').style.display="none";
				document.getElementById('beverages').style.display="none";
				document.getElementById('others').style.display="none";

			}
			function openVegetables() {
				document.getElementById('vegetables').style.display="block";
				document.getElementById('iconvegetable').style.display="inline-block";
				document.getElementById('iconvegetable').style.color="#ffffff";
				document.getElementById('vegetable_').style.color="#ffffff";
				document.getElementById('vegetable_').style.background="#126c49";

				document.getElementById('iconbreakfast').style.display="none";
				document.getElementById('breakfast_').style.color="#126c49";
				document.getElementById('breakfast_').style.background="#fef9f3";

				document.getElementById('iconmaincourse').style.display="none";
				document.getElementById('maincourse_').style.color="#126c49";
				document.getElementById('maincourse_').style.background="#fef9f3";

				document.getElementById('iconmerienda').style.display="none";
				document.getElementById('merienda_').style.color="#126c49";
				document.getElementById('merienda_').style.background="#fef9f3";

				document.getElementById('iconsandwich').style.display="none";
				document.getElementById('sandwich_').style.color="#126c49";
				document.getElementById('sandwich_').style.background="#fef9f3";

				document.getElementById('icondessert').style.display="none";
				document.getElementById('dessert_').style.color="#126c49";
				document.getElementById('dessert_').style.background="#fef9f3";

				document.getElementById('iconbeverage').style.display="none";
				document.getElementById('beverage_').style.color="#126c49";
				document.getElementById('beverage_').style.background="#fef9f3";

				document.getElementById('iconothers').style.display="none";
				document.getElementById('others_').style.color="#126c49";
				document.getElementById('others_').style.background="#fef9f3";

				document.getElementById('maincourse').style.display="none";
				document.getElementById('breakfast').style.display="none";
				document.getElementById('merienda').style.display="none";
				document.getElementById('sandwiches').style.display="none";
				document.getElementById('desserts').style.display="none";
				document.getElementById('beverages').style.display="none";
				document.getElementById('others').style.display="none";

			}
			function openSandwiches() {
				document.getElementById('sandwiches').style.display="block";
				document.getElementById('iconsandwich').style.display="inline-block";
				document.getElementById('iconsandwich').style.color="#ffffff";
				document.getElementById('sandwich_').style.color="#ffffff";
				document.getElementById('sandwich_').style.background="#126c49";

				document.getElementById('iconbreakfast').style.display="none";
				document.getElementById('breakfast_').style.color="#126c49";
				document.getElementById('breakfast_').style.background="#fef9f3";

				document.getElementById('iconmaincourse').style.display="none";
				document.getElementById('maincourse_').style.color="#126c49";
				document.getElementById('maincourse_').style.background="#fef9f3";

				document.getElementById('iconmerienda').style.display="none";
				document.getElementById('merienda_').style.color="#126c49";
				document.getElementById('merienda_').style.background="#fef9f3";

				document.getElementById('iconvegetable').style.display="none";
				document.getElementById('vegetable_').style.color="#126c49";
				document.getElementById('vegetable_').style.background="#fef9f3";

				document.getElementById('icondessert').style.display="none";
				document.getElementById('dessert_').style.color="#126c49";
				document.getElementById('dessert_').style.background="#fef9f3";

				document.getElementById('iconbeverage').style.display="none";
				document.getElementById('beverage_').style.color="#126c49";
				document.getElementById('beverage_').style.background="#fef9f3";

				document.getElementById('iconothers').style.display="none";
				document.getElementById('others_').style.color="#126c49";
				document.getElementById('others_').style.background="#fef9f3";


				document.getElementById('maincourse').style.display="none";
				document.getElementById('breakfast').style.display="none";
				document.getElementById('merienda').style.display="none";
				document.getElementById('vegetables').style.display="none";
				document.getElementById('desserts').style.display="none";
				document.getElementById('beverages').style.display="none";
				document.getElementById('others').style.display="none";

			}
			function openDesserts() {
				document.getElementById('desserts').style.display="block";
				document.getElementById('icondessert').style.display="inline-block";
				document.getElementById('icondessert').style.color="#ffffff";
				document.getElementById('dessert_').style.color="#ffffff";
				document.getElementById('dessert_').style.background="#126c49";

				document.getElementById('iconbreakfast').style.display="none";
				document.getElementById('breakfast_').style.color="#126c49";
				document.getElementById('breakfast_').style.background="#fef9f3";

				document.getElementById('iconmaincourse').style.display="none";
				document.getElementById('maincourse_').style.color="#126c49";
				document.getElementById('maincourse_').style.background="#fef9f3";

				document.getElementById('iconmerienda').style.display="none";
				document.getElementById('merienda_').style.color="#126c49";
				document.getElementById('merienda_').style.background="#fef9f3";

				document.getElementById('iconvegetable').style.display="none";
				document.getElementById('vegetable_').style.color="#126c49";
				document.getElementById('vegetable_').style.background="#fef9f3";

				document.getElementById('iconsandwich').style.display="none";
				document.getElementById('sandwich_').style.color="#126c49";
				document.getElementById('sandwich_').style.background="#fef9f3";

				document.getElementById('iconbeverage').style.display="none";
				document.getElementById('beverage_').style.color="#126c49";
				document.getElementById('beverage_').style.background="#fef9f3";

				document.getElementById('iconothers').style.display="none";
				document.getElementById('others_').style.color="#126c49";
				document.getElementById('others_').style.background="#fef9f3";

				document.getElementById('maincourse').style.display="none";
				document.getElementById('breakfast').style.display="none";
				document.getElementById('merienda').style.display="none";
				document.getElementById('vegetables').style.display="none";
				document.getElementById('sandwiches').style.display="none";
				document.getElementById('beverages').style.display="none";
				document.getElementById('others').style.display="none";
			}

			function openBeverages() {
				document.getElementById('beverages').style.display="block";
				document.getElementById('iconbeverage').style.display="inline-block";
				document.getElementById('iconbeverage').style.color="#ffffff";
				document.getElementById('beverage_').style.color="#ffffff";
				document.getElementById('beverage_').style.background="#126c49";

				document.getElementById('iconbreakfast').style.display="none";
				document.getElementById('breakfast_').style.color="#126c49";
				document.getElementById('breakfast_').style.background="#fef9f3";

				document.getElementById('iconmaincourse').style.display="none";
				document.getElementById('maincourse_').style.color="#126c49";
				document.getElementById('maincourse_').style.background="#fef9f3";

				document.getElementById('iconmerienda').style.display="none";
				document.getElementById('merienda_').style.color="#126c49";
				document.getElementById('merienda_').style.background="#fef9f3";

				document.getElementById('iconvegetable').style.display="none";
				document.getElementById('vegetable_').style.color="#126c49";
				document.getElementById('vegetable_').style.background="#fef9f3";

				document.getElementById('iconsandwich').style.display="none";
				document.getElementById('sandwich_').style.color="#126c49";
				document.getElementById('sandwich_').style.background="#fef9f3";

				document.getElementById('icondessert').style.display="none";
				document.getElementById('dessert_').style.color="#126c49";
				document.getElementById('dessert_').style.background="#fef9f3";

				document.getElementById('iconothers').style.display="none";
				document.getElementById('others_').style.color="#126c49";
				document.getElementById('others_').style.background="#fef9f3";

				document.getElementById('maincourse').style.display="none";
				document.getElementById('breakfast').style.display="none";
				document.getElementById('merienda').style.display="none";
				document.getElementById('vegetables').style.display="none";
				document.getElementById('sandwiches').style.display="none";
				document.getElementById('desserts').style.display="none";
				document.getElementById('others').style.display="none";
			}
			function openOthers() {
				document.getElementById('others').style.display="block";
				document.getElementById('iconothers').style.display="inline-block";
				document.getElementById('iconothers').style.color="#ffffff";
				document.getElementById('others_').style.color="#ffffff";
				document.getElementById('others_').style.background="#126c49";

				document.getElementById('iconbreakfast').style.display="none";
				document.getElementById('breakfast_').style.color="#126c49";
				document.getElementById('breakfast_').style.background="#fef9f3";

				document.getElementById('iconmaincourse').style.display="none";
				document.getElementById('maincourse_').style.color="#126c49";
				document.getElementById('maincourse_').style.background="#fef9f3";

				document.getElementById('iconmerienda').style.display="none";
				document.getElementById('merienda_').style.color="#126c49";
				document.getElementById('merienda_').style.background="#fef9f3";

				document.getElementById('iconvegetable').style.display="none";
				document.getElementById('vegetable_').style.color="#126c49";
				document.getElementById('vegetable_').style.background="#fef9f3";

				document.getElementById('iconsandwich').style.display="none";
				document.getElementById('sandwich_').style.color="#126c49";
				document.getElementById('sandwich_').style.background="#fef9f3";

				document.getElementById('iconbeverage').style.display="none";
				document.getElementById('beverage_').style.color="#126c49";
				document.getElementById('beverage_').style.background="#fef9f3";

				document.getElementById('maincourse').style.display="none";
				document.getElementById('breakfast').style.display="none";
				document.getElementById('merienda').style.display="none";
				document.getElementById('vegetables').style.display="none";
				document.getElementById('desserts').style.display="none";
				document.getElementById('sandwiches').style.display="none";
				document.getElementById('beverages').style.display="none";
			}
		</script>
	</body>
<html>
