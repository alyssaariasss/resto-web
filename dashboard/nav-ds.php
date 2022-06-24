<?php
	session_start();

	if (!isset($_SESSION['email'])) {
		header("Location: login.php");
	}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/nav-ds.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
   </head>
<body>
  <!-- Topbar -->
  <div class="topbar">
    <div class="toggle">
      <i class="fas fa-bars"></i>
    </div>
    <div class="logo">
      <h2>D' Nacars' Place</h2>
    </div>
    <div class="user">
      <img src="../img/female-avatar.png">
    </div>
  </div>

  <!-- Sidebar -->
  <div class="sidebar">
    <ul class="nav_link">
      <li>
        <a href="index.php">
          <i class="fas fa-home"></i>
          <span class="name">Home</span>
        </a>
        <ul class="submenu blank">
          <li><a class="name" href="index.php">Home</a></li>
        </ul>
      </li>
			<li>
				<div class="menu_hover">
					<a href="#">
						<span><i class="fas fa-folder"></i></span>
						<span class="name">Categories</span>
					</a>
					<i class="fas fa-chevron-down arrow"></i>
				</div>
				<ul class="submenu">
						<li><a class="name" href="#">Menu</a></li>
						<li><a href="view-categories.php">Categories</a></li>
						<li><a href="view-best-sellers.php">Best Sellers</a></li>
						<li><a href="view-specials.php">Specials</a></li>
				</ul>
			</li>
      <li>
        <a href="view-customers.php">
          <i class="fas fa-user-friends"></i>
          <span class="name">Customers</span>
        </a>
        <ul class="submenu blank">
          <li><a class="name" href="view-customers.php">Customers</a></li>
        </ul>
      </li>
			<li>
				<div class="menu_hover">
					<a href="#">
						<i class="fas fa-shopping-basket"></i>
	          <span class="name">Orders</span>
					</a>
					<i class="fas fa-chevron-down arrow"></i>
				</div>
				<ul class="submenu">
						<li><a class="name" href="#">Orders</a></li>
						<li><a href="orders.php">Orders</a></li>
						<li><a href="order-details.php">Order Details</a></li>
				</ul>
			</li>
      <li>
        <div class="menu_hover">
          <a href="#">
            <span><i class="fas fa-list"></i></span>
            <span class="name">Menu</span>
          </a>
          <i class="fas fa-chevron-down arrow"></i>
        </div>
        <ul class="submenu">
          	<li><a class="name" href="#">Menu</a></li>
            <li><a href="insert-menu.php">Insert Menu</a></li>
          	<li><a href="view-menu.php">View Menu</a></li>
        </ul>
      </li>
      <li>
        <div class="menu_hover">
          <a href="#">
            <span><i class="fas fa-border-all"></i></span>
            <span class="name">Tables</span>
          </a>
          <i class="fas fa-chevron-down arrow"></i>
        </div>
        <ul class="submenu">
          <li><a class="name" href="#">Tables</a></li>
          <li><a href="insert-table.php">Insert Table</a></li>
          <li><a href="view-table.php">View Table</a></li>
        </ul>
      </li>
      <li>
        <a href="bookings.php">
          <span><i class="far fa-calendar"></i></span>
          <span class="name">Bookings</span>
        </a>
        <ul class="submenu blank">
          <li><a class="name" href="bookings.php">Bookings</a></li>
        </ul>
      </li>
      <li>
        <a href="logout_ad.php">
          <span><i class="fas fa-sign-out-alt"></i></span>
          <span class="name">Logout</span>
        </a>
        <ul class="submenu blank">
          <li><a class="name" href="logout_ad.php">Logout</a></li>
        </ul>
      </li>
    </ul>
  </div>

  <script>
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
      arrow[i].addEventListener("click", (e)=>{
     let arrowParent = e.target.parentElement.parentElement;
     arrowParent.classList.toggle("showMenu");
      });
    }

    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".fa-bars");

    console.log(sidebarBtn);
    sidebarBtn.addEventListener("click", ()=>{
      sidebar.classList.toggle("close");
    });
  </script>
</body>
</html>
