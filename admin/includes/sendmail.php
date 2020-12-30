  
<?php
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
  $mail->Username   = "manugasewinjames@gmail.com";
  $mail->Password   = "HardFact30";

  $mail->IsHTML(true);
  $mail->AddAddress("manugasewinjames@gmail.com", "ejmanugas");
  $mail->SetFrom("manugasewinjames@gmail.com", "erwin james");
  $mail->AddReplyTo("manugasewinjames@gmail.com", "EJMANUGAS");
  $mail->AddCC("manugasewinjames@gmail.com", "cc-recipient-name");
  $mail->Subject = "Test is Test Email sent via Gmail SMTP Server using PHP Mailer";
  $content = "<b>This is a Test Email sent via Gmail SMTP Server using PHP mailer class.</b>";

  $mail->MsgHTML($content); 
  if(!$mail->Send()) {
    echo "Error while sending Email.";
    var_dump($mail);
  } else {
    echo "Email sent successfully";
  }
?>