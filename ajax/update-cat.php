<?php
  include ('../config.php');

  if(isset($_POST['field']) && isset($_POST['value']) && isset($_POST['id'])){
     $field = $_POST['field'];
     $value = $_POST['value'];
     $editid = $_POST['id'];

      $sql = "UPDATE `category` SET ".$field."='".$value."' WHERE id = $editid";
      $update = $conn->query($sql);

     echo 1;
  }else{
     echo 0;
  }
  exit;
  ?>
