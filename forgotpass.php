<?php

require ('config.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email, $reset_token) {
  require 'PHPMailer/PHPMailer.php';
  require 'PHPMailer/SMTP.php';
  require 'PHPMailer/Exception.php';

  $mail = new PHPMailer(true);

  try {
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
    $mail->Subject = "Password Reset Link from D' Nacars' Place";
    $mail->Body    = "We're sending you this email because you requested a password reset.
    Click on this link to create a new password: <br>
    <a href='http://localhost/test/updatepassword.php?email=$email&reset_token=$reset_token'>Reset Password</a>";

    $mail->send();
    return true;

    } catch (Exception $e) {
        return false;
    }
}

if (isset($_POST['email-reset'])) {
  $email = $_POST['email'];

  $sql = "SELECT * FROM `users` WHERE email='$email'";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    if (mysqli_num_rows($result) == 1) {
      $reset_token = bin2hex(random_bytes(16));
      date_default_timezone_set('Asia/Manila');
      $date = date("Y-m-d");
      $sql = "UPDATE `users` SET `reset_token`='$reset_token', `token_expiry` = '$date' WHERE email='$email'";

      if (mysqli_query($conn, $sql) && sendMail($email, $reset_token)) {
        echo "<script>alert('We have e-mailed your password reset link!')</script>";
      } else {
        echo "<script>alert('Server down. Please try again later.')</script>";
      }

    } else {
      echo "<script>alert('Email not found.')</script>";
    }
  } else {
    echo "<script>
    alert('Cannot run query.');
    window.location.href = 'index.php';
    </script>";
  }
}

 ?>
