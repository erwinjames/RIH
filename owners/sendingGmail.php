<?php
$to_email = $_GET['emailto'];
$subject = "Booking Confirmed";
$body = "This is Ramirez island Hopping confirming your book";
$headers = "From: sender\'s email";
 
if (mail($to_email, $subject, $body, $headers)) {
	$msg="Booking Confirm successfully";
} else {
    echo "Email sending failed...";
}
?>