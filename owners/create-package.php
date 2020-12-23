<?php
session_start();
error_reporting(0);
include('includes/config.php');


if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_POST['submit']))
{
	
$owners_identity=htmlentities($_SESSION['alogin']);
$pname=$_POST['packagename'];
$address=$_POST['address'];	
$contact=$_POST['contact'];
$boatName=$_POST['boatName'];
$boatOperator=$_POST['boatOperator'];
$boatCapacity=$_POST['boatCapacity'];
$pricePerPack = $_POST['pricePerPack'];
$plocation=$_POST['packagelocation'];
$pprice=$_POST['packageprice'];	
$pfeatures=$_POST['packagefeatures'];
$offerPrice=$_POST['offerPrice'];
$pdetails=$_POST['packagedetails'];	
$pimage=$_FILES["packageimage"]["name"];
move_uploaded_file($_FILES["packageimage"]["tmp_name"],"pacakgeimages/".$_FILES["packageimage"]["name"]);
$sql="INSERT INTO TblTourPackages(owner_identity,PackageName,address,contact_num,boat_name,boat_operator,boat_capacity,pricePerpack,PackageLocation,PackagePrice,PackageFetures,offer_price,PackageDetails,PackageImage) VALUES(:owners_identity,:pname,:addres,:contact,:boatName,:boatOperator,:boatCapacity,:pricePerpack ,:plocation,:pprice,:pfeatures,:OfferPrice,:pdetails,:pimage)";
$query = $dbh->prepare($sql);
$query->bindParam(':owners_identity',$owners_identity,PDO::PARAM_STR);
$query->bindParam(':pname',$pname,PDO::PARAM_STR);
$query->bindParam(':addres',$address,PDO::PARAM_STR);
$query->bindParam(':contact',$contact,PDO::PARAM_STR);
$query->bindParam(':boatName',$boatName,PDO::PARAM_STR);
$query->bindParam(':boatOperator',$boatOperator,PDO::PARAM_STR);
$query->bindParam(':boatCapacity',$boatCapacity,PDO::PARAM_STR);
$query->bindParam(':pricePerpack',$pricePerPack,PDO::PARAM_STR);
$query->bindParam(':plocation',$plocation,PDO::PARAM_STR);
$query->bindParam(':pprice',$pprice,PDO::PARAM_STR);
$query->bindParam(':pfeatures',$pfeatures,PDO::PARAM_STR);
$query->bindParam(':OfferPrice',$offerPrice,PDO::PARAM_STR);
$query->bindParam(':pdetails',$pdetails,PDO::PARAM_STR);
$query->bindParam(':pimage',$pimage,PDO::PARAM_STR);
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
<!DOCTYPE HTML>
<html>
<head>
<title>Ramirez Island Hopping</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery-2.1.4.min.js"></script>
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
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
   <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">
              <!--header start here-->
<?php include('includes/header.php');?>
							
				     <div class="clearfix"> </div>	
				</div>
<!--heder end here-->
	<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Update Package </li>
            </ol>
 	<div class="grid-form">
  <div class="grid-form1">
  	       <h3>Create Package</h3>
  	        	  <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" name="package" method="post" enctype="multipart/form-data">
								<div class="form-group">
									
									<div class="col-sm-12">
									<label for="focusedinput" class="control-label">Name</label>
										<input type="text" class="form-control1" name="packagename" id="packagename" placeholder="Create Package" required>
									</div>
									<div class="col-sm-6">
										<label for="focusedinput" class="control-label">Address</label>
										<input type="text" class="form-control1" name="address" id="address" placeholder="Address" required>
									</div>
									<div class="col-sm-6">
									<label for="focusedinput" class="control-label">Contact No *</label>
										<input type="text" class="form-control1" name="contact" id="ContactNumber" placeholder="Philippine Digit (11) number" required>
									</div>
									<div class="col-sm-6">
									<label for="focusedinput" class="control-label">Boat Name</label>
										<input type="text" class="form-control1" name="boatName" id="BoatName" placeholder="Boat Name" required>
									</div>
									
									<div class="col-sm-6">
									<label for="focusedinput" class="control-label">Boat Operator</label>
										<input type="text" class="form-control1" name="boatOperator" id="BoatOperator" placeholder="Boat Operator" required>
									</div>
									<div class="col-sm-6">
									<label for="focusedinput" class="control-label">Boat Capacity</label>
										<!-- <input type="text" class="form-control1" name="" id="boatCapacity" placeholder="Boat Capacity" required> -->
										<select class="form-control1" onchange='selectOnChange(this)' name="boatCapacity" id="boatCapacity">
										  				<option selected="selected" value ='' class="form-control">Selct Capacity</option>
														<option value ='1' class="form-control">1</option>
														<option value ='2' class="form-control">2</option>
														<option value ='3' class="form-control">3</option>
														<option value ='4' class="form-control">4</option>
														<option value ='5' class="form-control">5</option>
														<option value ='6' class="form-control">6</option>
														<option value ='7' class="form-control">7</option>
														<option value ='8' class="form-control">8</option>
														<option value ='9' class="form-control">9</option>
														<option value ='10' class="form-control">10</option>
														<option value ='11' class="form-control">11</option>
														<option value ='12' class="form-control">12</option>
														<option value ='13' class="form-control">13</option>
														<option value ='14' class="form-control">14</option>
														<option value ='15' class="form-control">15</option>
												</select>
									</div>
									<div class="col-sm-6">
									<label for="focusedinput" class="control-label">Price per 1 pax</label>
										<input type="text" class="form-control1" name="pricePerPack" id="pricePerPack" placeholder="Price Per 1 pack" required>
									</div>
									<div class="col-sm-12">
										<label for="focusedinput" class="control-label">Destination</label>
										<input type="text" class="form-control1" name="packagelocation" id="packagelocation" placeholder="Destination" required>
									</div>
									<div class="col-sm-12">
									<label for="focusedinput" class="control-label">Boat Description</label>
										<textarea class="form-control" rows="5" cols="50" name="packagedetails" id="packagedetails" placeholder="Package Details" required></textarea> 
									</div>
									
									<div class="col-sm-12">
									<label for="focusedinput" class="control-label">Package Price in PHP</label>
										<input type="text" class="form-control1" name="packageprice" id="packageprice" placeholder=" Package Price is USD" required>
									</div>
									<div class="col-sm-6">
									<label for="focusedinput" class=" control-label">Package Offer</label>
										<input type="text" class="form-control1" name="packagefeatures" id="packagefeatures" placeholder="Package Features Eg-free Pickup-drop facility" required>
									</div>
									<div class="col-sm-6">
									<label for="focusedinput" class=" control-label">Offer Price</label>
										<input type="text" class="form-control1" name="offerPrice" id="offerPrice" placeholder="Offer Price in PHP" required>
									</div>
								</div>	
														
<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Image</label>
									<div class="col-sm-8">
										<input type="file" name="packageimage" id="packageimage" required>
									</div>
								</div>	

								<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<button type="submit" name="submit" class="btn-primary btn">Create</button>

				<button type="reset" class="btn-inverse btn">Reset</button>
			</div>
		</div>
						
					
						
						
						
					</div>
					
					</form>

     
      

      
      <div class="panel-footer">
		
	 </div>
    </form>
  </div>
 	</div>
 	<!--//grid-->

<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">

</div>
<!--inner block end here-->
<!--copy rights start here-->
<?php include('includes/footer.php');?>
<!--COPY rights end here-->
</div>
</div>
  <!--//content-inner-->
		<!--/sidebar-menu-->
					<?php include('includes/sidebarmenu.php');?>
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->	   

</body>
</html>
<?php }?>