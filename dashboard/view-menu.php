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
			   url: '../ajax/update-menu.php',
			   type: 'post',
			   data: { field:field_name, value:value, id:edit_id },
			   success:function(response){
			      if(response == 1){
							console.log(value);
			         console.log('Successfully saved.');
			      }else{
			         console.log("Not saved.");
			      }
			   }
			  });

			 });

			});
			</script>
			<title>View Menu Items</title>
   </head>

<body>
	<section class="content">
		<div class="table_container">
			<div class="wrapper">
				<div class="title">
					<h2>View Menu Items</h2>
				</div>

				<div class="table_wrapper">
					<table class="table" id="viewMenu">
						<thead>
							<tr>
								<th>No.</th>
								<th>Item Name</th>
								<th>Item Image</th>
								<th>Item Description</th>
								<th>Item Price</th>
								<th>Status</th>
								<th>Item Category</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$count = 1;
				         $query = $conn->query("SELECT * FROM `product` order by `id`");
				         while ($row = $query ->fetch_object()) {
				          $id = $row->id;
				          $name = $row->name;
									$image = $row->image;
									$description = $row->description;
									$price = $row->price;
									$status = $row->status;
									$category = $row->category;
				        ?>

			         <tr>
			          <td><?php echo $count; ?></td>
			          <td>
			            <div class='edit' > <?php echo $name; ?></div>
			            <input type='text' class='txtedit' value='<?php echo $name; ?>' id='name_<?php echo $id; ?>' >
			          </td>

								<td>
			            <div class='edit' > <img  width="70" height="70" src="../img/<?php echo $image; ?>"></div>
			          </td>

								<td>
			            <div class='edit' > <?php echo $description; ?></div>
			            <input type='text' class='txtedit' value='<?php echo $description; ?>' id='desc_<?php echo $id; ?>' >
			          </td>

								<td>
			            <div class='edit' > <?php echo $price; ?></div>
			            <input type='text' class='txtedit' value='<?php echo $price; ?>' id='price_<?php echo $id; ?>' >
			          </td>

								<td>
									<div class='edit' > <?php echo $status; ?></div>
									<select class="txtedit" value="<?php echo $status; ?>" id='status_<?php echo $id; ?>'>
										<option selected disabled>Select status</option>
										<option class="tr_option" value="In stock">In stock</option>
										<option class="tr_option" value="Out of stock">Out of stock</option>
									</select>
								</td>

								<td>
			            <div class='edit' > <?php echo $category; ?></div>
			            <input type='text' class='txtedit' value='<?php echo $category; ?>' id='category_<?php echo $id; ?>' >
			          </td>

								<td>
									<button>
										<a href="delete-menu.php?deleteid='<?php echo $id; ?>'" class="delete_btn">Delete</a>
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
			$("#viewMenu").DataTable({
				"sScrollX": "100%",
				"sScrollXInner": "130%",
			});
		});
	</script>

</body>
</html>
