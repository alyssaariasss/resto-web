<?php
	include ('nav-ds.php');

	require ('../config.php');

	session_start();

	if (isset($_POST['add'])) {
		$tablename = $_POST['tablename'];
		$tabletype = $_POST['tabletype'];

		$sql = "INSERT INTO `tables`(tablename, tabletype) values ('$tablename', '$tabletype')";
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
    <title>Tables</title>
   </head>
<body>
	<section class="content">
		<div class="table_container">
			<div class="wrapper">
				<div class="title">
					<h2>Add Table</h2>
					<p>To insert a table, please fill up all required fields.</p>
				</div>
				<div class="table">
					<form action="#" method="POST">
						<div class="table_content">
							<div class="input_box">
								<p>Table Name</p>
								<input type="text" placeholder="Table01" name="tablename" required>
							</div>

							<div class="input_box">
								<p>Table Type</p>
								<i class="far fa-question-circle" onclick="showGuide();"></i>

								<div class="dropdown">
									<select class="tr_select" name="tabletype" required>
										<option selected disabled>Select table type</option>
										<option class="tr_option" value="Square">Square</option>
										<option class="tr_option" value="Rectangle">Rectangle</option>
										<option class="tr_option" value="Conference">Conference</option>
									</select>
								</div>
							</div>
						</div>
						<div class="btn_area">
							<input type="submit" name="add" value="Add Table">
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="popup_wrapper" id="viewGuide">
			<div class="popup_content">
				<div class="title">
					<h2>Table Seating Capacities</h2>
				</div>
				<div class="line"></div>
				<i class="fas fa-times" onclick="closePopup();"></i>

				<div class="subtitle">
					<p>Square = 2 to 4 people</p>
					<p>Rectangle = 5 to 10 people</p>
					<p>Conference = More than 10 people</p>
				</div>
			</div>
		</div>
	</section>

	<script>
		function showGuide() {
			document.getElementById('viewGuide').style.display='block';
		}

		function closePopup() {
			document.getElementById('viewGuide').style.display='none';
		}
	</script>

</body>
</html>
