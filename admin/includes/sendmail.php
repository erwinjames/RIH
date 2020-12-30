<?php
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require 'E:\xampp\composer\vendor\autoload.php';
// require 'PHPMailer\src\Exception.php';
// require 'PHPMailer\src\PHPMailer.php';
// require 'PHPMailer\src\SMTP.php';
// //PHPMailer Object
// $mail = new PHPMailer(true); //Argument true in constructor enables exceptions

// //From email address and name
// $mail->From = "manugasewinjames@gmail.com";
// $mail->FromName = "Erwin James Manugas";

// //To address and name
// $mail->addAddress("manugasewinjames@gmail.com", "Your Name");
// $mail->addAddress("manugasewinjames@gmail.com"); //Recipient name is optional

// //Address to which recipient will reply
// $mail->addReplyTo("manugasewinjames@gmail.com", "Reply");

// //CC and BCC
// $mail->addCC("cc@example.com");
// $mail->addBCC("bcc@example.com");

// //Send HTML or Plain Text email
// $mail->isHTML(true);

// $mail->Subject = "Subject Text";
// $mail->Body = "<i>Mail body in HTML</i>";
// $mail->AltBody = "This is the plain text version of the email content";

// try {
//     $mail->send();
//     echo "Message has been sent successfully";
// } catch (Exception $e) {
//     echo "Mailer Error: " . $mail->ErrorInfo;
// } 

require 'PHPMailer\src\PHPMailer.php';
require 'E:\xampp\composer\vendor\autoload.php';
require 'PHPMailer\src\Exception.php';
//include('class.phpmailer.php');
//require("class.smtp.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
	
		$name="ej";
		$email="manugasewinjames@gmail.com";
		$phone="ambot";
		$message="okay nice world";

$mail = new PHPMailer;
$mail-> isSMTP(); # SMTP is enabled now.
$mail-> Host = 'smtp.gmail.com'; //smtp.gmail.com
$mail->SMTPDebug   = 2;
$mail-> SMTPAuth = true;
//$mail->SMTPDebug = 3;

//$admin_email="proyotech@gmail.com";

$mail->setFrom($email, $name);
$mail->addAddress("svkdatt@gmail.com", 'Proyo Technologies');     // Add a recipient


$mail->addReplyTo($email, $name);

$mail->isHTML(true);                                  // Set email format to HTML


$mail->Subject = 'this is subject part';
$mail->Body    = "<strong>".$name."</strong>"."<br>".$phone."<br>".$email."<br>".$message;
$mail->AltBody = 'nice job';

if(!$mail->send()) {
    echo 'Message could not be sent. ';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
 echo "yes";
exit();
}


?>