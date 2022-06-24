<?php
	include ('nav-ds.php');

	require ('../config.php');

	session_start();

	if (isset($_POST['additem'])) {
		$itemname = $_POST['itemname'];
		$itemimage = $_POST['itemimage'];
		$itemdesc = $_POST['itemdesc'];
		$itemprice = $_POST['itemprice'];
		$itemcategory = $_POST['itemcategory'];

		$sql = "INSERT INTO `product`(name, image, description, price, category)
		values ('$itemname', '$itemimage', '$itemdesc', '$itemprice', '$itemcategory')";
		$result = mysqli_query($conn, $sql);

		if ($result) {
			echo "<script>alert('Data inserted successfully.')</script>";
		} else {
			die(mysqli_error($conn));
		}
	}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/insert-table.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <title>Menu</title>
   </head>
<body>
	<section class="content">
		<div class="table_container">
			<div class="wrapper">
				<div class="title">
					<h2>Add Menu Item</h2>
					<p>To insert an item, please fill up all required fields.</p>
				</div>
				<div class="table">
					<form action="#" method="POST">
						<div class="table_content">
							<div class="input_box">
								<p>Item Name</p>
								<input type="text" placeholder="Item01" name="itemname" required>
							</div>

							<div class="input_box">
								<p>Item Image</p>
								<input type="file" name="itemimage"  accept="image/*" required>
							</div>

							<div class="input_box">
								<p>Item Description</p>
								<input type="text" placeholder="Description" id="file" name="itemdesc" required>
							</div>

							<div class="input_box">
								<p>Item Price</p>
								<input type="number" placeholder="101.01" step="0.01" name="itemprice" required>
							</div>

							<div class="input_box">
								<p>Item Category</p>

								<div class="dropdown">
									<select class="tr_select" name="itemcategory" required>
										<option selected disabled>Select item category</option>
										<?php
												$sql = "SELECT `category` FROM `category`";
												$result = mysqli_query($conn, $sql);

												while ($row = mysqli_fetch_assoc($result)) {
													$category = $row['category'];
													echo "<option class='tr_option' value='$category'>$category</option>";
												}
										 ?>
									</select>
								</div>
							</div>
						</div>
						<div class="btn_area">
							<input type="submit" name="additem" value="Add Item">
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</body>
</html>
