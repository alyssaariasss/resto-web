<?php
	include ('nav-ds.php');

	require ('../config.php');

	session_start();

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/view-table.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
		<title>Customers</title>
   </head>
<body>
	<section class="content">
		<div class="table_container">
			<div class="wrapper">
				<div class="title">
					<h2>View Customers</h2>
				</div>

				<div class="table_wrapper">
					<table class="table" id="viewCust">
						<thead>
							<tr>
								<th>No.</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Address</th>
								<th>Email</th>
								<th>Mobile Number</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sql = "SELECT * from `users`";
								$result = mysqli_query($conn, $sql);

								if ($result) {
									while ($row = mysqli_fetch_assoc($result)) {
										$id = $row['id'];
										$fname = $row['first_name'];
										$lname = $row['last_name'];
										$address = $row['address'];
										$email = $row['email'];
										$mobile = $row['mobile_num'];

										echo '<tr>
											<td>'.$id.'</td>
											<td>'.$fname.'</td>
											<td>'.$lname.'</td>
											<td>'.$address.'</td>
											<td>'.$email.'</td>
											<td>'.$mobile.'</td>
										</tr>';
									}
								}

							 ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

<script>
	$(document).ready(function() {
		$("#viewCust").DataTable();
	} );
</script>
</body>
</html>
