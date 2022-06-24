<?php

include ('../config.php');

if (isset($_GET['addid'])) {
  $id = $_GET['addid'];
  $best_seller = "Yes";

  $sql = "SELECT * FROM `product` WHERE id=$id";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    $sql = "UPDATE `product` SET `best_seller` = '$best_seller' WHERE `id` = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
      header("Location: view-best-sellers.php");
    } else {
      echo "<script>alert('Something went wrong.')</script>";
    }
  } else {
      echo "<script>alert('Cannot run query.')</script>";
  }
}

 ?>
