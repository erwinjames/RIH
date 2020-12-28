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
$bIds=$_GET['bId'];
$sql = "SELECT tblpayments.bookingId as bookid,tblpayments.receivedBy 
as rby,tblpayments.DownPay_amount as downpayment,tblpayments.Full_Amount 
as total,tblpayments.statusRecived as status,tblpayments.date as dates,tblqrmessage.users_email 
as useremail,tblqrmessage.qr as qrcode from tblpayments join tblqrmessage on tblqrmessage.bookings_id=tblpayments.bookingId Where bookingId = :bIds ";

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
if ($result->status==true) {
    echo "<h1>FULL PAID</h1>";
}else
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
        <a href="scanQrCode.php?emails=<?php echo $_GET['emails'];?>&&payid=<?php echo  $userId;?>&&downP=<?php echo $_GET['percent'];?>&&totals=<?php echo $_GET['totals'];?>" class="btn btn-success">Submit<a>


<?php } } }?>
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