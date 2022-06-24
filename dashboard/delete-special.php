<?php

include ('../config.php');

if (isset($_GET['deleteid'])) {
  $id = $_GET['deleteid'];
  $special = "";

  $sql = "SELECT * FROM `product` WHERE id=$id";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    $sql = "UPDATE `product` SET `special` = '$special' WHERE `id` = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
      header("Location: view-specials.php");
    } else {
      echo "<script>alert('Something went wrong.')</script>";
    }
  } else {
      echo "<script>alert('Cannot run query.')</script>";
  }
}

 ?>
