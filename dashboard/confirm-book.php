<?php

require ('../config.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_GET['confirmid'])) {
  $id = $_GET['confirmid'];

  $sql = "SELECT * FROM `bookings` WHERE `id`= '$id'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result)) {
    	while ($row = mysqli_fetch_assoc($result)) {
      $booking_id = $row['booking_id'];
      $date = $row['reservation_date'];
      $time = $row['reservation_time'];
      $people = $row['people_num'];
      $fname = $row['first_name'];
      $lname = $row['last_name'];
      $email = $row['email'];

      require '../PHPMailer/PHPMailer.php';
      require '../PHPMailer/SMTP.php';
      require '../PHPMailer/Exception.php';

      $mail = new PHPMailer(true);
      //Server settings
      $mail->isSMTP();                                            //Send using SMTP
      $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );


        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'samsabskyford26@gmail.com';                     //SMTP username
        $mail->Password   = 'maemae2278';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('samsabskyford26@gmail.com', 'D NACARS PLACE');
        $mail->addAddress($email);     //Add a recipient

      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = "Reservation at D' Nacars' Place";
      $mail->Body = "<h1>Reservation Confirmed</h1><hr><br>" . "Hi ".$fname.","."<br><br>Thank you for booking your table with us! Your reservation for ".$people." people on ".$date." at ".$time.
        " is confirmed. Please find the details below. <br><br>"."Booking ID: ".$booking_id."<br>Name: ".$fname." ".$lname."<br>Reservation date: ".$date.
        "<br>Reservation time: ".$time."<br>Table for: ".$people."<br><br><hr>We look forward to serving you!";

      if ($mail->send()) {
        $status = "Confirmed";
        $sql = "UPDATE `bookings` SET `status`='$status' WHERE `id`= '$id'";

        if (mysqli_query($conn, $sql)) {
          header("Location: bookings.php");
        } else {
          echo "<script>alert('Cannot run query.')</script>";
        }
      } else {
        echo "<script>alert('Server down. Please try again later.')</script>";
      }
    }
  } else {
    echo "<script>alert('Cannot run query.')</script>";
  }
}

 ?>
