<?php

$server = "sql108.epizy.com";
$username = "epiz_31204674";
$pass = "XyDTuDftfGwH0";
$database = "epiz_31204674_restaurant";

$conn = mysqli_connect($server, $username, $pass, $database);

if (!$conn) {
  die("<script>alert('Connection Failed')</script>");
}

 ?>
