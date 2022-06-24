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
		<title>Today's Specials</title>
   </head>
<body>
	<section class="content">
		<div class="table_container">
			<div class="wrapper">
				<div class="title">
					<h2>Edit Best Sellers</h2>
				</div>

				<div class="table_wrapper">
					<table class="table" id="viewMenu">
						<thead>
							<tr>
								<th width="5%">No.</th>
								<th>Item Name</th>
								<th>Item Image</th>
								<th>Item Category</th>
								<th width="10%">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sql = "SELECT * from `product`";
								$result = mysqli_query($conn, $sql);

								if ($result) {
									while ($row = mysqli_fetch_assoc($result)) {
										$id = $row['id'];
										$itemname = $row['name'];
										$itemimage = $row['image'];
										$itemcategory = $row['category'];
										$best_seller = $row['best_seller'];

										if ($best_seller === 'Yes') {
											echo '<tr>
												<td>'.$id.'</td>
												<td>'.$itemname.'</td>
												<td><img width="70" height="70" src="../img/'.$itemimage.'"></td>
												<td>'.$itemcategory.'</td>
												<td><button><a href="delete-best.php?deleteid='.$id.'" class="delete_btn">Remove Item</a></button></td>
											</tr>';
										} else {
											echo '<tr>
												<td>'.$id.'</td>
												<td>'.$itemname.'</td>
												<td><img width="70" height="70" src="../img/'.$itemimage.'"></td>
												<td>'.$itemcategory.'</td>
												<td><button><a href="add-best.php?addid='.$id.'" class="add_btn">Add Item</a></button></td>
											</tr>';
										}
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
		$("#viewMenu").DataTable({
			"sScrollX": "100%",
		});
	} );
</script>
</body>
</html>
