<?php
	include ('nav-ds.php');

	session_start();

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/dashboard.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <title>Admin Dashboard</title>
   </head>
<body>
  <section class="home">
    <div class="main_content">
      <h2>Overview</h2>
        <!-- SAMPLE ONLY -->
        <div class="dashboard_card">
          <div class="card">
            <div class="card_body">
              <span><i class="fas fa-wallet"></i></span>
              <div>
                <h5>Total Sales</h5>
								<?php
										include ('../config.php');
										$sql = "SELECT SUM(total_amount) AS total FROM `orders` WHERE `status`='Completed'";
										$result = mysqli_query($conn, $sql);

										while ($row = mysqli_fetch_assoc($result)) {
											$sum = $row['total'];
											echo "<h4><span>&#8369;</span>$sum</h4>";
										}
								 ?>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card_body">
              <span><i class="fas fa-shopping-basket"></i></span>
              <div>
                <h5>Total Order Count</h5>
								<?php
										include ('../config.php');
										$sql = "SELECT * FROM `orders`";
										$result = mysqli_query($conn, $sql);

										if ($result) {
											$rowcount=mysqli_num_rows($result);
											echo "<h4>$rowcount</h4>";
										}
								 ?>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card_body">
              <span><i class="fas fa-users"></i></span>
              <div>
                <h5>Total Customer Count</h5>
								<?php
										include ('../config.php');
										$sql = "SELECT * FROM `users`";
										$result = mysqli_query($conn, $sql);

										if ($result) {
											$rowcount=mysqli_num_rows($result);
											echo "<h4>$rowcount</h4>";
										}
								 ?>
              </div>
            </div>
          </div>

					<div class="card">
						<div class="card_body">
							<span><i class="fas fa-spinner"></i></span>
							<div>
								<h5>Pending Orders</h5>
								<?php
										include ('../config.php');
										$sql = "SELECT * FROM `orders` WHERE `status`='Pending'";
										$result = mysqli_query($conn, $sql);

										if ($result) {
										    $rowcount=mysqli_num_rows($result);
												echo "<h4>$rowcount</h4>";
										}
								 ?>
							</div>
						</div>
					</div>

					<div class="card">
						<div class="card_body">
							<span><i class="fas fa-clipboard-list"></i></span>
							<div>
								<h5>Confirmed Orders</h5>
								<?php
										include ('../config.php');
										$sql = "SELECT * FROM `orders` WHERE `status`='Confirmed'";
										$result = mysqli_query($conn, $sql);

										if ($result) {
												$rowcount=mysqli_num_rows($result);
												echo "<h4>$rowcount</h4>";
										}
								 ?>
							</div>
						</div>
					</div>

					<div class="card">
						<div class="card_body">
							<span><i class="fas fa-clipboard-check"></i></span>
							<div>
								<h5>Completed Orders</h5>
								<?php
										include ('../config.php');
										$sql = "SELECT * FROM `orders` WHERE `status`='Completed'";
										$result = mysqli_query($conn, $sql);

										if ($result) {
												$rowcount=mysqli_num_rows($result);
												echo "<h4>$rowcount</h4>";
										}
								 ?>
							</div>
						</div>
					</div>

					<div class="card">
						<div class="card_body">
							<span><i class="fas fa-concierge-bell"></i></span>
							<div>
								<h5>Total Bookings</h5>
								<?php
										include ('../config.php');
										$sql = "SELECT MAX(id) AS lastid FROM `bookings`";
										$result = mysqli_query($conn, $sql);

										while ($row = mysqli_fetch_assoc($result)) {
											$last_id = $row['lastid'];
											echo "<h4>$last_id</h4>";
										}
								 ?>
							</div>
						</div>
					</div>

					<div class="card">
						<div class="card_body">
							<span><i class="fas fa-spinner"></i></span>
							<div>
								<h5>Pending Bookings</h5>
								<?php
										include ('../config.php');
										$sql = "SELECT * FROM `bookings` WHERE `status`='Pending'";
										$result = mysqli_query($conn, $sql);

										if ($result) {
												$rowcount=mysqli_num_rows($result);
												echo "<h4>$rowcount</h4>";
										}
								 ?>
							</div>
						</div>
					</div>

					<div class="card">
						<div class="card_body">
							<span><i class="fas fa-clipboard-list"></i></span>
							<div>
								<h5>Confirmed Bookings</h5>
								<?php
										include ('../config.php');
										$sql = "SELECT * FROM `bookings` WHERE `status`='Confirmed'";
										$result = mysqli_query($conn, $sql);

										if ($result) {
												$rowcount=mysqli_num_rows($result);
												echo "<h4>$rowcount</h4>";
										}
								 ?>
							</div>
						</div>
					</div>
        </div>

      <h2>Product Sales Report</h2>
      <!-- SAMPLE ONLY -->
      <div class="report">

        <div class="charts">
          <div class="chart" id="lineGraph">
            <h4>Earnings (past 12 months)</h4><br>
            <canvas id="lineChart"></canvas>
          </div>
          <div class="chart" id="doughnutGraph">
            <h4>Top Menus</h4><br>
            <canvas id="doughnut"></canvas>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
  <script src="../js/linechart.js"></script>
  <script src="../js/doughnutchart.js"></script>
</body>
</html>
