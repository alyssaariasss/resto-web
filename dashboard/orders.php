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
		<title>Orders</title>
   </head>
<body>
	<section class="content">
		<div class="table_container">
			<div class="wrapper">
				<div class="title">
					<h2>All Orders</h2>
				</div>

				<div class="table_wrapper">
					<table class="table" id="viewOrders">
						<thead>
							<tr>
								<th>No.</th>
								<th>Order ID</th>
								<th>Name</th>
								<th>Street</th>
								<th>City</th>
								<th>Region</th>
								<th>Instruction</th>
								<th>Payment Method</th>
								<th>Total Amount</th>
								<th>G-Cash Name</th>
								<th>Receipt</th>
								<th>Account Number</th>
								<th>Reference Number</th>
								<th>Date</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sql = "SELECT * from `orders`";
								$result = mysqli_query($conn, $sql);
								$count = 1;

								if ($result) {
									while ($row = mysqli_fetch_assoc($result)) {
										$id = $row['id'];
										$order_id = $row['order_id'];
										$fname = $row['fname'];
										$lname = $row['lname'];
										$street = $row['street'];
										$city = $row['city'];
										$region = $row['region'];
										$notes = $row['instruction'];
										$payment = $row['payment_method'];
										$total = $row['total_amount'];
										$gcash_name = $row['gcash_name'];
										$receipt = $row['receipt'];
										$acc_num= $row['acc_num'];
										$reference_num = $row['reference_num'];
										$date = $row['date'];
										$status = $row['status'];

										if ($status == 'Completed') {
											echo '<tr>
												<td>'.$count.'</td>
												<td>'.$order_id.'</td>
												<td>'.$fname." ".$lname.'</td>
												<td>'.$street.'</td>
												<td>'.$city.'</td>
												<td>'.$region.'</td>
												<td>'.$notes.'</td>
												<td>'.$payment.'</td>
												<td>'.$total.'</td>
												<td>'.$gcash_name.'</td>
												<td><img width="70" height="70" src="../img/'.$receipt.'"></td>
												<td>'.$acc_num.'</td>
												<td>'.$reference_num.'</td>
												<td>'.$date.'</td>
												<td><div class="status_txt">'.$status.'</div></td>
											</tr>';
										} else if ($status == 'Shipped') {
											echo '<tr>
												<td>'.$count.'</td>
												<td>'.$order_id.'</td>
												<td>'.$fname." ".$lname.'</td>
												<td>'.$street.'</td>
												<td>'.$city.'</td>
												<td>'.$region.'</td>
												<td>'.$notes.'</td>
												<td>'.$payment.'</td>
												<td>'.$total.'</td>
												<td>'.$gcash_name.'</td>
												<td><img width="70" height="70" src="../img/'.$receipt.'"></td>
												<td>'.$acc_num.'</td>
												<td>'.$reference_num.'</td>
												<td>'.$date.'</td>
												<td><button><a href="complete.php?confirmid='.$id.'" class="complete_btn">Complete</a></button></td>
											</tr>';
										} else if ($status == 'Confirmed') {
											echo '<tr>
												<td>'.$count.'</td>
												<td>'.$order_id.'</td>
												<td>'.$fname." ".$lname.'</td>
												<td>'.$street.'</td>
												<td>'.$city.'</td>
												<td>'.$region.'</td>
												<td>'.$notes.'</td>
												<td>'.$payment.'</td>
												<td>'.$total.'</td>
												<td>'.$gcash_name.'</td>
												<td><img width="70" height="70" src="../img/'.$receipt.'"></td>
												<td>'.$acc_num.'</td>
												<td>'.$reference_num.'</td>
												<td>'.$date.'</td>
												<td><button><a href="ship.php?confirmid='.$id.'" class="ship_btn">Ship</a></button></td>
											</tr>';
										} else {
											echo '<tr>
												<td>'.$count.'</td>
												<td>'.$order_id.'</td>
												<td>'.$fname." ".$lname.'</td>
												<td>'.$street.'</td>
												<td>'.$city.'</td>
												<td>'.$region.'</td>
												<td>'.$notes.'</td>
												<td>'.$payment.'</td>
												<td>'.$total.'</td>
												<td>'.$gcash_name.'</td>
												<td><img width="70" height="70" src="../img/'.$receipt.'"></td>
												<td>'.$acc_num.'</td>
												<td>'.$reference_num.'</td>
												<td>'.$date.'</td>
												<td><button><a href="confirm-order.php?confirmid='.$id.'" class="confirm_btn">Confirm</a></button></td>
											</tr>';
										}
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
