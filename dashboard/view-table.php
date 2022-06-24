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
			   url: '../ajax/update-tables.php',
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
		<title>Tables</title>
   </head>
<body>
	<section class="content">
		<div class="table_container">
			<div class="wrapper">
				<div class="title">
					<h2>View Table</h2>
				</div>

				<div class="table_wrapper">
					<table class="table" id="viewTable">
						<thead>
							<tr>
								<th>No.</th>
								<th>Table Name</th>
								<th>Table Type</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
								<?php
									$count = 1;
									$query = $conn->query("SELECT * from `tables`");

									while ($row = $query ->fetch_object()) {
											$id = $row->id;
											$tablename = $row->tablename;
											$tabletype = $row->tabletype;
								?>

								 <tr>
									<td><?php echo $count; ?></td>
									<td>
										<div class='edit'> <?php echo $tablename; ?></div>
										<input type="text" class="txtedit" value="<?php echo $tablename; ?>" id="tablename_<?php echo $id; ?>">
									</td>
									<td>
										<div class='edit' > <?php echo $tabletype; ?></div>
										<select class="txtedit" value="<?php echo $tabletype; ?>" id='tabletype_<?php echo $id; ?>'>
											<option selected disabled>Select table type</option>
											<option class="tr_option" value="Square">Square</option>
											<option class="tr_option" value="Rectangle">Rectangle</option>
											<option class="tr_option" value="Conference">Conference</option>
										</select>
									</td>
									<td>
										<button>
											<a href="delete.php?deleteid='<?php echo $id; ?>'" class="delete_btn">Delete Table</a>
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
		$("#viewTable").DataTable();
	} );
</script>
</body>
</html>
