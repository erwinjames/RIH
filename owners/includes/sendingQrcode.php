<?php
session_start();
error_reporting(0);
include('config.php');
if(isset($_POST['submit']))
{
$owners_identity=htmlentities($_SESSION['alogin']);
$user_email=$_POST['email'];	
$qrcode=$_FILES["qrCode"]["name"];
move_uploaded_file($_FILES["qrCode"]["tmp_name"],"pacakgeimages/".$_FILES["packageimage"]["name"]);
$sql="INSERT INTO tblqrmessage(owner_email,users_email,qr,dates) VALUES(:owners_identity,:email,:qrcode,now())";
$query = $dbh->prepare($sql);
$query->bindParam(':owners_identity',$owners_identity,PDO::PARAM_STR);
$query->bindParam(':email',$user_email,PDO::PARAM_STR);
$query->bindParam(':qrcode',$qrcode,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Package Created Successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

}
	?>