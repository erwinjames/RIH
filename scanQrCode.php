<?php
session_start();
include('includes/config.php');
if(isset($_REQUEST['payid'])){
    $ids = intval($_GET['payid']);
    $email = $_GET['emails'];
    $checkStatus = "check";
    $sql = "UPDATE tblbooking SET payment_status=:checkstatus WHERE UserEmail=:email and BookingId=:bid";
    $query = $dbh->prepare($sql);
    $query -> bindParam(':checkstatus',$checkStatus, PDO::PARAM_STR);
    $query-> bindParam(':email',$email, PDO::PARAM_STR);
    $query-> bindParam(':bid',$ids, PDO::PARAM_STR);
    $query -> execute();
    if ($query==true) {
        
$down=$_GET['downP'];
$totals=$_GET['totals'];
$recieved=0;
$sql="INSERT INTO tblpayments(BookingId,receivedBy,DownPay_amount,statusRecived,Full_Amount,date) VALUES(:ids,:email,:down,:recieved,:totals,now())";
$query = $dbh->prepare($sql);
$query->bindParam(':totals',$totals,PDO::PARAM_STR);
$query->bindParam(':down',$down,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':recieved',$recieved,PDO::PARAM_STR);
$query->bindParam(':ids',$ids,PDO::PARAM_STR);
$query->execute();
if($query)
{
header("location:tour-history.php");
}
else 
{
$error="Something went wrong. Please try again";
}

    }
            
 
}
if(isset($_REQUEST['updateVal'])){

   $ids = intval($_GET['payid1']);
    $email = $_GET['emails1'];
    $secondPay = $_GET['downP1'];
    $sql = "UPDATE tblpayments SET statusRecived=:secondPay WHERE receivedBy=:email and bookingId=:bid";
    $query = $dbh->prepare($sql);
    $query-> bindParam(':email',$email, PDO::PARAM_STR);
     $query-> bindParam(':secondPay',$secondPay, PDO::PARAM_STR);
    $query-> bindParam(':bid',$ids, PDO::PARAM_STR);
    $query -> execute();
    header("location:tour-history.php");
}

if (isset($_POST['submitRating'])) {
    $email2 = $_GET['emails'];
    $bid2 = $_GET['bId'];
    $comment = $_POST['comment'];
    $rating = $_POST['estrellas'];
    $sql="INSERT INTO ratings(booking_id,rating,ratingsFrom,comment,date) VALUES(:bid2,:rating,:email2,:comment,now())";
$query = $dbh->prepare($sql);
$query->bindParam(':email2',$email2,PDO::PARAM_STR);
$query->bindParam(':comment',$comment,PDO::PARAM_STR);
$query->bindParam(':bid2',$bid2,PDO::PARAM_STR);
$query->bindParam(':rating',$rating,PDO::PARAM_STR);
$query->execute();
if($query)
{
header("location:tour-history.php");
}
else 
{
$error="Something went wrong. Please try again";
}
}
// if(isset($_GET['bId'])){
//     $userEmail= htmlentities($_SESSION['login']);
//     $userId=intval($_GET['bId']);
//     $sql ="SELECT * from tblqrmessage where bookings_id='$userId'";
//     $query = $dbh -> prepare($sql);
//     $query->execute();
//     $results=$query->fetchAll(PDO::FETCH_OBJ);
//     $cnt=1;
//     if($query->rowCount() > 0)
//     {
//     foreach($results as $result1)
//     {
// }
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Ramirez Island Hopping</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Tourism Management System In PHP" />
<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="scss/style.css">
<link href="css/font-awesome.css" rel="stylesheet">
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
form .ratings{
  width: 250px;
  margin: 10px auto;
  padding: 10px;
  border: 1px solid #d9d9d9;
}

form p,
form input[type="submit"] {
  text-align: center;
  font-size: 20px;
}

#wrapper form input[type="submit"] {
  border: 1px solid #d9d9d9;
  background-color: #efefef;
}

input[type="radio"] {
  display: none;

}

label {
  color: grey;
   width: 30px;
   font-size:30px;
}

.clasificacion {
  direction: rtl;
  unicode-bidi: bidi-override;
}

label:hover,
label:hover ~ label {
  color: orange;
}

input[type="radio"]:checked ~ label {
  color: orange;
}
		</style>
</head>
<body>
<div class="top-header">
<?php include('includes/header.php');?>
<div class="banner-1 ">
	<div class="container">
		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">Ramirez Island Hopping</h1>
	</div>
</div>
<div class="privacy">
	<div class="container">
    <div class="selectroom_top">
		<h3 class="wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name:fadeInDown;">Scan Gcash Qr Code</h3>
		<form name="chngpwd" method="post" onSubmit="return valid();">     
                <?php 
$bIds=intval($_GET['bId']);
$sql = "SELECT tblpayments.bookingId as bookid,tblpayments.receivedBy 
as rby,tblpayments.DownPay_amount as downpayment,tblpayments.Full_Amount 
as total,tblpayments.statusRecived as status,tblpayments.date as dates,tblqrmessage.users_email 
as useremail,tblqrmessage.bookings_id as messageId,tblqrmessage.qr as qrcode from tblpayments right join tblqrmessage on tblqrmessage.bookings_id=tblpayments.bookingId Where tblqrmessage.bookings_id = :bIds LIMIT 1";

$query = $dbh->prepare($sql);
$query -> bindParam(':bIds', $bIds, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>               
                    <center><img width="30%" src="owners/pacakgeimages/<?php echo htmlentities($result->qrcode);?>"></center>
                    <br>
                    <p>
        Ramirez Island Hopping currently the organization uses a manual system for
reserving , renting , register and to keep records of all the rental activities and
Guests information. This is due to the manual way of recording the data . It is
known that , in manual way , data are being stored by recording it on paper . Therefore, it easily gets damaged or misplaced which lead to data loss.
        </p>
        <hr>
<?php
if ($result->status==true) {?>
    <h1>FULL PAID</h1>
    <div id="wrapper">
    <p class="clasificacion">
       <input id="radio1" type="radio" name="estrellas" value="5">
       <label for="radio1">&#9733;</label>
       <input id="radio2" type="radio" name="estrellas" value="4">
       <label for="radio2">&#9733;</label>
       <input id="radio3" type="radio" name="estrellas" value="3">
       <label for="radio3">&#9733;</label>
       <input id="radio4" type="radio" name="estrellas" value="2">
       <label for="radio4">&#9733;</label>
       <input id="radio5" type="radio" name="estrellas" value="1">
       <label for="radio5">&#9733;</label>
    </p>
    <textarea style="height: 200px" class="form-control" type="text" name="comment" placeholder="Comment"></textarea>
    <p>
      <input type="submit" value="submit" name="submitRating" />
    </p>
</div>
<?php }else
if ($result->downpayment==!null) {?>
         <h3>Balance : PHP &nbsp<?php 
            $balance = $result->total -  $result->downpayment;
            echo $balance;
         ?></h3>
         <h4>You've Pay : PHP &nbsp <?php echo $result->downpayment; ?></h4>
        <h4>TOTAL OF : PHP &nbsp<?php echo $_GET['totals'];?></h4>
        <a href="scanQrCode.php?updateVal=1&&emails1=<?php echo $_GET['emails'];?>&&payid1=<?php echo  $bIds;?>&&downP1=<?php echo $balance;?>&&totals1=<?php echo $_GET['totals'];?>" class="btn btn-success">Submit<a>
<?php } else {?>
        <h3>PAY : PHP &nbsp<?php echo $_GET['percent'];?></h3>
        <h3>TOTAL OF : PHP &nbsp<?php echo $_GET['totals'];?></h3>
        <a href="scanQrCode.php?emails=<?php echo $_GET['emails'];?>&&payid=<?php echo  $bIds;?>&&downP=<?php echo $_GET['percent'];?>&&totals=<?php echo $_GET['totals'];?>" class="btn btn-success">Submit<a>


<?php } } }
else{ echo "
<script>
alert('wait for the qr code');
location.href='tour-history.php';
</script>";
 }
  ?>
		</form>
        
     
		
	</div>
    </div>
</div>
<?php include('includes/footer.php');?>
<?php include('includes/signup.php');?>		
<?php include('includes/signin.php');?>				
<?php include('includes/write-us.php');?>
</body>
</html>