<?php

include ('../config.php');

if (isset($_GET['deleteid'])) {
  $id = $_GET['deleteid'];

  $sql = "DELETE FROM `product` WHERE id=$id";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: view-menu.php");
  }
}

 ?>
