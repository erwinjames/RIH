<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['submit2']))
{
$paymentMethod=$_POST['payment__option'];
if ($paymentMethod=='paymaya') {
		echo "<script>alert('Please use other payment method')</script>";
	}
	else
	{
$pid=intval($_GET['pkgid']);
$useremail=$_SESSION['login'];
$fromdate=$_POST['fromdate'];
$pkgOffer=$_POST['menu1'];
$pax=$_POST['pax'];
$comment=$_POST['comment'];
$status=0;
$sql="INSERT INTO tblbooking(PackageId,UserEmail,FromDate,pkgOffer_value,pax,status,payment) VALUES(:pid,:useremail,:fromdate,:pkgOffer,:pax,:status,:payment)";
$query = $dbh->prepare($sql);
$query->bindParam(':pid',$pid,PDO::PARAM_STR);
$query->bindParam(':useremail',$useremail,PDO::PARAM_STR);
$query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
$query->bindParam(':pkgOffer',$pkgOffer,PDO::PARAM_STR);
$query->bindParam(':pax',$pax,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':payment',$paymentMethod,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
	if($paymentMethod=='gcash'){
		$msg="Booked Successfully";
	}
}
else 
{
$error="Something went wrong. Please try again";
}
	}

}

if (isset($_POST['searchCity'])) {
    $apiKey = "d79c326a0a8845b075b3cc820a146634";
    $cityName = $_POST['city'];
    $googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?q=" . $cityName . "&lang=en&units=metric&APPID=" . $apiKey;
    
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_VERBOSE, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($response);
    $currentTime = time();
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Ramirez Island Hopping | Package Details</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href="css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="scss/style.css">
<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
<!-- <link rel="stylesheet" href="css/jquery-ui.css" /> -->
	<script>
		 new WOW().init();
	</script>
<link rel="stylesheet"  href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<!-- <script src="js/jquery-1.10.2.js"></script> -->
<script src="js/jquery-ui1.js"></script>
<script>
   
    // var badDates = new Array("23-01-2021","24-01-2021","19-01-2021","20-01-2021");
	// $.getJSON('getDates.php, function(json){badDates=json;});

    $(function() {
		var badDates;
		$.getJSON('getDates.php?ids=<?php echo $_GET['pkgid'];?>', function(json) { 
			badDates = json;
        $( "#datepicker" ).datepicker({
			dateFormat: 'dd-mm-yy',
			minDate: 0,
			firstDay: 1,
            beforeShowDay: function(date) {
                if($.inArray($.datepicker.formatDate('dd-mm-yy', date ), badDates) > -1)
                {
                    return [false,"Unavailable","Reserve Date"];
                }
                else
                {
                    return [true,"Available","Not Reserve"];
                }
            }
		});
	});
    })

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
<?php include('includes/header.php');?>
<div class="banner-3">
	<div class="container">
		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">Ramirez Island Hopping</h1>
	</div>
</div>
<div class="selectroom">
	<div class="container">	
<form style="float: right" class="col-md-12 navbar-form" role="search" method="post">
    <div class="input-group add-on">
      <input name="city" class="form-control" placeholder="Search City for Weather" name="srch-term" id="srch-term" type="text">
      <div class="input-group-btn">
        <input name="searchCity" class="btn btn-default" type="submit" placeholder="Search"><i class="glyphicon glyphicon-search" placeholder="Search City"></i>
      </div>
    </div>
  </form>
  </div>
	<div class="container">	


		  <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

<?php 
$pid=intval($_GET['pkgid']);
$sql = "SELECT * from tbltourpackages where PackageId=:pid";
$query = $dbh->prepare($sql);
$query -> bindParam(':pid', $pid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>

<form name="book" method="post">
		<div class="selectroom_top">
			<div class="col-md-6">
			<div class="col-md-4 selectroom_left wow fadeInLeft animated" data-wow-delay=".5s">
				<img src="owners/pacakgeimages/<?php echo htmlentities($result->PackageImage);?>" class="img-responsive" alt="">
			</div>
			</div>
			<div class="col-md-6">
				<?php

				if (!isset($_POST['searchCity'])) {
		$apiKey = "d79c326a0a8845b075b3cc820a146634";
    $cityName = $result->PackageLocation;
    $googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?q=" . $cityName . "&lang=en&units=metric&APPID=" . $apiKey;
    
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_VERBOSE, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($response);
    $currentTime = time();
	
}
	 

				?>
				<h2><?php echo $data->name; ?> Weather Status</h2>
        <div class="time">
            <div><?php echo date("l", $currentTime); ?></div>
            <div><?php echo date("jS F, Y",$currentTime); ?></div>
            <div><?php echo ucwords($data->weather[0]->description); ?></div>
        </div>
        <div class="weather-forecast">
            <img
                src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png"
                class="weather-icon" /> <?php echo $data->main->temp_max; ?>&deg;C<span
                class="min-temperature"><?php echo $data->main->temp_min; ?>&deg;C</span>
        </div>
        <div class="time">
            <div>Humidity: <?php echo $data->main->humidity; ?> %</div>
            <div>Wind: <?php echo $data->wind->speed; ?> km/h</div>
        </div>
			</div>
			<div class="col-md-12 selectroom_right wow fadeInRight animated" data-wow-delay=".5s">
				<h2><?php echo htmlentities($result->PackageName);?></h2>
				<p class="dow">#RIHBoat-<?php echo htmlentities($result->PackageId);?></p>
				<p><b>Boat Name:</b> <?php echo htmlentities($result->boat_name);?></p>
				<p><b>Boat Capacity:</b> <?php echo htmlentities($result->boat_capacity);?></p>
				<p><b>Boat Operator:</b> <?php echo htmlentities($result->boat_operator);?></p>
				<p><b>Destination:</b> <?php echo htmlentities($result->PackageLocation);?></p>
					<p><b>Time:</b>8:00 am to 4-5:00 pm</p>
					<div class="ban-bottom">
				<div class="bnr-right">
				<label class="inputLabel">Date</label>
			 	<input class="date" id="datepicker" type="text" placeholder="dd-mm-yyyy"  name="fromdate" required="">
			    </div>
				<!-- this is the start -->
				<div class="bnr-right form-group">
					<label class="inputLabel">Package Offer</label>
											<div>
												<select onchange="showDiv('hidden_div', this)" id="test" name="menu1">
														<option value="" selected="selected" class="form-control">***No Package***</option>
														<option  value="<?php echo htmlentities($result->offer_price);?>"><?php echo htmlentities($result->PackageFetures);?></option>
												</select>
											</div>
				 </div>
				 <div class="bnr-right form-group">
					<label class="inputLabel">pax**</label>
											<div>
												<select onchange='selectOnChange(this)' name="pax">
												<?php
													$capacity = htmlentities($result->boat_capacity);
													$perPax = htmlentities($result->pricePerpack);
													for ($x = 1; $x <=$capacity; $x++) {
															$totalPrice=$x*$perPax;
															if ($x>=8) {
																
															echo '<option value="6500" class="form-control">'.$x.'</option>';
															}
															else{
															echo '<option value ='.$totalPrice.' class="form-control">'.$x.'</option>';
															}
													}
														?>
														<!-- <option value="<?php echo $x; ?>" selected="selected" class="form-control"><?php echo $x; ?></option> -->
													
												</select>
											</div>
											  
				 </div>
				<!-- this is the ending -->
			</div>
				<div class="clearfix"></div>
				
				<div class="grand">
					<h3>Grand Total</h3>
					<div style="float:right;" class="col-sm-2"><input class="totals" type="text" id="total" disabled></div>
					<div class="col-sm-12" id="hidden_div" style="display: none;">+ <b><?php echo htmlentities($result->offer_price);?>.00</b></div>
				
				</div>
				<div class="clearfix"></div>
				<br>
				<br>
							 <div  class="col-md-12" style="float:right;">
							 <h3>Payment method</h3><br>
												<label class="radio-inline">
														<input type="radio" name="payment__option" value="paymaya">
														<img style="width: 60%;" src="images/paymaya.png" alt="">
												</label>
												<label class="radio-inline">
														<input type="radio" name="payment__option" value="gcash">
														<img style="width: 35%;" src="images/GCash.png" alt="">
												</label>
													 
							</div>
		
			</div>
			<br>
			<div class="clearfix"></div>
		<h3 style="padding-top: 4%; ">Details</h3>
				<p style="padding-top: 3%;padding-bottom:30px;"><?php echo htmlentities($result->PackageDetails);?> </p>	
				<div class="clearfix"></div>
				
				<?php if($_SESSION['login'])
				{?>
				<button type="submit" name="submit2" class="btn-primary btn">Instant Reservation</button>
					<?php } else {?>
						<a href="#" data-toggle="modal" data-target="#myModal4" class="btn-primary btn" >Instant Reservation</a></li>
						<?php } ?>
				<div class="clearfix"></div>
		
		</div>
<!-- 
		<div class="selectroom_top">
			<h2>Travels</h2>
			<div class="selectroom-info animated wow fadeInUp animated" data-wow-duration="1200ms" data-wow-delay="500ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 500ms; animation-name: fadeInUp; margin-top: -70px">
				<ul>
					<li class="spe">
						<label class="inputLabel">Comment</label>
						<input class="special" type="text" name="comment" required="">
					</li>
					<?php if($_SESSION['login'])
					{?>
						<li class="spe" align="center">
					<button type="submit" name="submit2" class="btn-primary btn">Instant Reservation</button>
						</li>
						<?php } else {?>
							<li class="sigi" align="center" style="margin-top: 1%">
							<a href="#" data-toggle="modal" data-target="#myModal4" class="btn-primary btn" >Instant Reservation</a></li>
							<?php } ?>
					<div class="clearfix"></div>
				</ul>
			</div>	
		</div> -->
		</form>
<?php }} ?>
<?php 
$pid=intval($_GET['pkgid']);
$sql = "SELECT ratings.rating_id as idRating,ratings.booking_id as BookingId,ratings.rating as rating,ratings.ratingsFrom as ratingFrom,ratings.comment as Comment,ratings.date as dates,tblbooking.BookingId as tblbookId,tblbooking.PackageId as tblpkgId from ratings left join tblbooking on tblbooking.BookingId=ratings.booking_id where tblbooking.PackageId = $pid";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>
			<div class="rom-btm">
			
				<div class="col-md-6 room-midle wow fadeInUp animated" data-wow-delay=".5s">
					<h4><?php echo htmlentities($result->rating);?> STAR</h4>
					<h6><?php echo htmlentities($result->ratingFrom);?></h6>
					<center><p style="text-align:center;"><?php echo htmlentities($result->Comment);?></p></center>
					<p style="font-size:10px"><?php echo htmlentities($result->dates);?></p>
				</div>
				
				<div class="clearfix"></div>
			</div>

<?php }} ?>
		
	</div>
</div>
<!-- <script src="js/jquery.min.js"></script> -->
<?php include('includes/footer.php');?>
<?php include('includes/signup.php');?>			
<?php include('includes/signin.php');?>			
<?php include('includes/write-us.php');?>
</body>
<script>
document.getElementById('test').addEventListener('change', function () {
    var style = this.value == <?php echo htmlentities($result->offer_price);?> ? 'block' : 'none';
    document.getElementById('hidden_div').style.display = style;
});

</script>
<script  type="text/javascript">
    function selectOnChange(obj) {
          var val = obj.options[obj.selectedIndex].value;
         var text = obj.options[obj.selectedIndex].text;
         document.getElementById("total").value = val+'.00';
      }
    </script>
</html>
