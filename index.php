<?php
	include ('nav.php');
	session_start();
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/home.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
		<!-- Owl Carousel for Best Sellers and Specials -->
		<link rel="stylesheet" href="css/owl.carousel.min.css">
		<title>D' Nacars' Place</title>
	</head>
	<body>
		<div class="home_content">
			<!-- Banner -->
				<div class="banner">
						<img src="img/rounded-triangle.png" class="triangle">
						<div class="banner_content">
							<h2>We value family time!</h2>
							<p>Serving the well-loved recipes of the family, D' Nacars' Place is a start-up restaurant located near the National Highway, Bubog, San Jose, Occ. Mindoro.
								This is a place where you can relax, enjoy, and have fun with family and friends.</p>
							<a href="menu.php" class="orderbtn">Order Now</a>
						</div>
						<img src="img/banner-plate1.png" alt="Fried Chicken" class="banner_plate1">
				</div>

				<!-- Services -->
				<div class="services">
					<div class="services_content">
						<h1>Our Services</h1>
						<div class="columns">
							<div class="column">
								<img src="img/icon-delivery.png" alt="Delivery Icon">
								<p>D' Nacars' Place is located near the National Highway, Bubog, San Jose, Occ. Mindoro.
								We deliver in nearby areas and we are already looking into our options for expanding our serviceable area.</p>
							</div>
							<div class="column">
								<img src="img/icon-resto.png" alt="Dine In Icon">
								<p>Previously, we only accepted takeout orders, and temporarily closed our dine-ins due to the increasing number of COVID-19 cases. But now, we are back to accommodate a limited number!</p>
							</div>
							<div class="column">
								<img src="img/icon-phone.png" alt="Order Online Icon">
								<p>Satisfy your cravings by getting the food you love from our restaurant. See our <a href="#best_sellers" style="color: #126c49;">best sellers</a> or purchase your order online now and have it ready for takeout!</p>
							</div>
						</div>
					</div>
				</div>

				<!-- Best Sellers -->
				<div class="best_sellers" id="best_sellers">
						<div class="sellers_content">
							<h1>Our Best Sellers</h1>
							<div class="slider">
								<div class="owl-carousel">
									<?php
										require ("config.php");

										$sql = "SELECT * FROM `product` WHERE `best_seller`='Yes'";
										$result = mysqli_query($conn, $sql);

										if ($row = mysqli_num_rows($result) > 0) {
											while ($row = mysqli_fetch_assoc($result)) {
												?>
												<div class="best_pic">
													<div>
														<img src="img/<?php echo $row['image']; ?>"  alt="Best Seller">
													</div>
													<p><?php echo $row['name']; ?></p><hr>
												</div>
												<?php
											}
										} else {
											echo "Not Found";
										}
									 ?>
								</div>
						</div>
					</div>
				</div>

				<!-- Specials -->
				<div class="specials">
					<div class="specials_content">
						<h1>Today's Specials</h1>

						<div class="row mt-4">
							<?php
								require ("config.php");

								$sql = "SELECT * FROM `product` WHERE `special`='Yes' AND `status`='In stock'";
								$result = mysqli_query($conn, $sql);

								if ($row = mysqli_num_rows($result) > 0) {
									while ($row = mysqli_fetch_assoc($result)) {
										?>
										<div class="col-md-3">
											<div class="card">
												<div class="card-body">
													<img width="200px" height="180px" src="img/<?php echo $row['image']; ?>" class="card-img-top" alt="Today's Specials">
													<h2 class="card-title"><?php echo $row['name']; ?></h2>
													<p class="card-cat"><?php echo $row['category']; ?></p>
													<p class="card-text"><span>&#8369;</span><?php echo $row['price']; ?><span>.00</span></p>
												</div>
											</div>
										</div>
										<?php
									}
								} else {
									echo "Not Found";
								}
							 ?>
						</div>

						<div class="btn_area">
							<a href="menu.php" class="productbtn">View Product List</a>
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

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/script.js"></script>
	</body>
</html>
