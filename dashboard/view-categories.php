<?php
	include ('nav-ds.php');

	require ('../config.php');

	if (isset($_POST['addcat'])) {
		$menucat = $_POST['menucat'];

		$sql = "INSERT INTO `category`(category) values ('$menucat')";
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
    <link rel="stylesheet" href="../css/view-table.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

		<script type='text/javascript'>
			$(document).ready(function(){
			 // Show Input element
			 $('.edit').click(function(){
				$('.txtedit').hide();
				$(this).next('.txtedit').show().focus();
				$(this).hide();
			 });

			 // Save data
			 $(".txtedit").focusout(function(){

				// Get edit id, field name and value
				var id = this.id;
				var split_id = id.split("_");
				var field_name = split_id[0];
				var edit_id = split_id[1];
				var value = $(this).val();

				// Hide Input element
				$(this).hide();

				// Hide and Change Text of the container with input elmeent
				$(this).prev('.edit').show();
				$(this).prev('.edit').text(value);

				$.ajax({
				 url: '../ajax/update-cat.php',
				 type: 'post',
				 data: { field:field_name, value:value, id:edit_id },
				 success:function(response){
						if(response == 1){
							 console.log('Successfully saved.');
						}else{
							 console.log("Not saved.");
						}
				 }
				});

			 });

			});
			</script>
		<title>Categories</title>
   </head>
<body>
	<section class="content">
		<div class="table_container">
			<div class="wrapper">
				<div class="title">
					<h2>View Categories</h2>
					<div class="btn_area">
						<button class="popup_btn" name="button" onclick="showPopup()">Add New</button>
					</div>
				</div>

				<div class="popup_wrapper" id="viewPopup">
					<div class="popup_content">
						<div class="title">
							<h2>Insert New Category</h2>
						</div>
						<div class="line"></div>
						<i class="fas fa-times" onclick="showPopup()"></i>

						<form action="#" method="POST">
							<div class="table_content">
								<div class="input_box">
									<input type="text" placeholder="Category1" name="menucat" required>
								</div>
							</div>

							<div class="btn_area">
								<input type="submit" name="addcat" value="Add Category">
							</div>
						</form>
					</div>
				</div>

				<div class="table_wrapper">
					<table class="table" id="viewCategory">
						<thead>
							<tr>
								<th>No.</th>
								<th>Category</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$count = 1;
				         $query = $conn->query("SELECT * from `category`");
				         while ($row = $query ->fetch_object()) {
				          $id = $row->id;
									$category = $row->category;
				        ?>

			         <tr>
			          <td><?php echo $count; ?></td>
								<td>
			            <div class='edit' > <?php echo $category; ?></div>
			            <input type='text' class='txtedit' value='<?php echo $category; ?>' id='category_<?php echo $id; ?>' >
			          </td>
								<td>
									<button>
										<a href="delete-cat.php?deleteid='<?php echo $id; ?>'" class="delete_btn">Delete Category</a>
									</button>
								</td>
			         </tr>
			         <?php
			         $count ++;
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
		$("#viewCategory").DataTable();
	} );
</script>

<script type="text/javascript">
	function showPopup() {
		document.getElementById('viewPopup').classList.toggle("active");
	}
</script>
</body>
</html>
