<?php
$email= $_GET['email'];
$names = $_GET['names'];
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require 'PHPMailer/src/Exception.php';
  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php';

  $mail = new PHPMailer(TRUE);
  $mail->IsSMTP();

  $mail->SMTPDebug  = 0;  
  $mail->SMTPAuth   = TRUE;
  $mail->SMTPSecure = "tls";
  $mail->Port       = 587;
  $mail->Host       = "smtp.gmail.com";
  $mail->Username   = "PLEASE USE YOUR PERSONAL EMAIL ACCOUNT"; //manugasewinjames@gmail.com
  $mail->Password   = "YOUR PERSONAL EMAIL PASSWORD"; //Your password

  $mail->IsHTML(true);
  $mail->AddAddress($email, $names);
  $mail->SetFrom("manugasewinjames@gmail.com", "RIH"); //change email
  $mail->AddReplyTo("manugasewinjames@gmail.com", "RIH"); //change email
  $mail->AddCC("manugasewinjames@gmail.com", "cc-recipient-name"); //change email
  $mail->Subject = "Reservation Confirmation";
  $content = "<b>This is Rameriz island Hopping confirming that your reserve boat was confirmed, please check your RIH account for mor info.</b>";

  $mail->MsgHTML($content); 
  if(!$mail->Send()) {
    echo "Error while sending Email.";
    var_dump($mail);
  } else {
   header("location:../manage-bookings.php");
   $msg="confirmed";
  }
?>