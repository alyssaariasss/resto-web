<?php

require ('../config.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_GET['confirmid'])) {
  $id = $_GET['confirmid'];

  $sql = "SELECT * FROM `orders` WHERE `id`= '$id'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result)) {
    	while ($row = mysqli_fetch_assoc($result)) {
      $order_id = $row['order_id'];
      $fname = $row['fname'];
      $lname = $row['lname'];
      $email = $row['email'];
      $street = $row['street'];
      $city = $row['city'];
      $region = $row['region'];
      $notes = $row['instruction'];
      $payment = $row['payment_method'];
      $total = $row['total_amount'];
      $subtotal = $total - 40;
      $date = $row['date'];
      
      $content = "";

      $sql_new = "SELECT * FROM `order_detail` WHERE `order_id` = '$order_id'";
      $result_new = mysqli_query($conn, $sql_new);

      if (mysqli_num_rows($result_new)) {
        while ($row = mysqli_fetch_assoc($result_new)) {
          $content .= "<div>
                <p>".$row['product_name']."</p>
                <p>Quantity: ".$row['quantity']."</p>
                <p>Price: <span>&#8369;</span>".$row['total_price']."</p><hr>
              </div>";
          $quantity = $row['quantity'];
          $price = $row['price'];
          $amount = $row['total_price'];
          echo $row['product_name'];
        }
      }

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
      $mail->Subject = "Your order has been confirmed";

      $mail->Body = "<h1>Order Confirmation from D' Nacars' Place</h1><hr><br>" . "Hi ".$fname.","."<br><br>Thank you for placing your order with us! Your ".$payment." payment request for order ".$order_id." has
      been confirmed. Your ordered food will be at your table anytime soon.<br><br><hr>" . "<h4>Order Details</h4>" .
      "Order ID: ".$order_id."<br>Order Date: ".$date."<br><br>".$content."<br>Subtotal: <span>&#8369;</span>".$subtotal."
      <br>Shipping fee: <span>&#8369;</span>40<br>Total Payment: <span>&#8369;</span>".$total."<br><br><br><hr><h4>Delivery Details</h4><br>Name: ".$fname." ".$lname."<br>Shipping Address: ".$street." ".$city.
      " ".$region."<br>Instruction: ".$notes."  <br><br><br><hr><h4>Payment Details</h4><br>Payment Method: ".$payment."<br>Amount Paid: ".$total."
      <br><br><hr>You will receive a shipping confirmation once your order has been shipped.<br>Thank you!";

      if ($mail->send()) {
        $status = "Confirmed";
        $query = "UPDATE `orders` SET `status`='$status' WHERE `id`= '$id'";

        if (mysqli_query($conn, $query)) {
          header("Location: orders.php");
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
