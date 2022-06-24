<?php
	include ('nav-ds.php');

	require ('../config.php');

	session_start();
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/bookings.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
		<title>Order Details</title>
   </head>
<body>
	<section class="content">
		<div class="table_container">
			<div class="wrapper">
				<div class="title">
					<h2>All Order Details</h2>
				</div>

				<div class="table_wrapper">
					<table class="table" id="viewOrders">
						<thead>
							<tr>
								<th>No.</th>
								<th>Order ID</th>
								<th>Date</th>
								<th>Product Name</th>
								<th>Quantity</th>
								<th>Price</th>
								<th>Total Price</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sql = "SELECT * from `order_detail`";
								$result = mysqli_query($conn, $sql);
								$count = 1;

								if ($result) {
									while ($row = mysqli_fetch_assoc($result)) {
										$id = $row['id'];
										$order_id = $row['order_id'];
										$date = $row['added_on'];
										$product = $row['product_name'];
										$quantity = $row['quantity'];
										$price = $row['price'];
										$total = $row['total_price'];

										echo '<tr>
											<td>'.$count.'</td>
											<td>'.$order_id.'</td>
											<td>'.$date.'</td>
											<td>'.$product.'</td>
											<td>'.$quantity.'</td>
											<td>'.$price.'</td>
											<td>'.$total.'</td>
										</tr>';
									$count ++;
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
		$("#viewOrders").DataTable({
			"sScrollX": "100%",
			"sScrollXInner": "180%",
		});
	} );
</script>
</body>
</html>
