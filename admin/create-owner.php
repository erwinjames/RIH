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
$fname=$_POST['fname'];
$lname=$_POST['lname'];	
$mname=$_POST['mname'];
$telNum=$_POST['telNum'];	
$presadd=$_POST['presAdd'];
$emailAdd=$_POST['emailAdd'];	
$password=md5($_POST['password']);
$pimage=$_FILES["profile_pic"]["name"];
move_uploaded_file($_FILES["profile_pic"]["tmp_name"],"pacakgeimages/".$_FILES["profile_pic"]["name"]);
$sql="INSERT INTO tblowners(first_name,last_name,mid_name,tel_number,pre_address,email_address,passwords,profiles) VALUES(:fname,:lname,:mname,:telNum,:presAdd,:emailAdd,:password,:pimage)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':lname',$lname,PDO::PARAM_STR);
$query->bindParam(':mname',$mname,PDO::PARAM_STR);
$query->bindParam(':telNum',$telNum,PDO::PARAM_STR);
$query->bindParam(':presAdd',$presadd,PDO::PARAM_STR);
$query->bindParam(':emailAdd',$emailAdd,PDO::PARAM_STR);
$query->bindParam(':pimage',$pimage,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
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
<title>RAMIREZ ISLAND HOPPING</title>
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
                <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Create Owner</li>
            </ol>
		<!--grid-->
 	<div class="grid-form">
 
<!---->
  <div class="grid-form1">
  	       <h3>Create Owners</h3>
  	        	  <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
                                                                    <form class="form-horizontal" name="package" method="post" enctype="multipart/form-data">
                                                                                                        <div class="form-group">
                                                                                                        <div class="col-sm-6">
                                                                                                            <label for="focusedinput" class="control-label">Email Address</label>
                                                                                                            <input type="email" class="form-control1" name="emailAdd" id="packagefeatures" placeholder="Email Address" required>
                                                                                                            </div>
                                                                                                            <div class="col-sm-6">
                                                                                                            <label for="focusedinput" class="control-label">Password</label>
                                                                                                            <input type="password" class="form-control1" name="password" id="packagefeatures" placeholder="Password" required>
                                                                                                            </div>
                                                                                                            <div class="col-sm-4">
                                                                                                            <label for="focusedinput" class="control-label">First Name</label>
                                                                                                                <input type="text" class="form-control1" name="fname" id="packagename" placeholder="First Name" required>
                                                                                                            </div>
                                                                                                            <div class="col-sm-3">
                                                                                                            <label for="focusedinput" class="control-label">Last Name</label>
                                                                                                                <input type="text" class="form-control1" name="lname" id="packagetype" placeholder="Last Name" required>
                                                                                                            </div>
                                                                                                            <div class="col-sm-5">
                                                                                                            <label for="focusedinput" class="control-label">Middle Name</label>
                                                                                                                <input type="text" class="form-control1" name="mname" id="packagelocation" placeholder="Middle Name" required>
                                                                                                            </div>
                                                                                                            <div class="col-sm-4">
                                                                                                            <label for="focusedinput" class="control-label">Tel # *:</label>
                                                                                                                <input type="text" class="form-control1" name="telNum" id="packageprice" placeholder="Tel # *:" required>
                                                                                                            </div>
                                                                                                            <div class="col-sm-8">
                                                                                                            <label for="focusedinput" class="control-label">Present Address</label>
                                                                                                                <input type="text" class="form-control1" name="presAdd" id="packagefeatures" placeholder="Present Address" required>
                                                                                                            </div>
                                                                                                            <div class="col-sm-7">
                                                                                                            <label for="focusedinput" class="control-label">Profile Picture</label>
                                                                                                                <input type="file" name="profile_pic" id="packageimage" required>
                                                                                                            </div>
                                                                                                        </div>	
                                                                                                        <div class="row">
                                                                                                            <div class="col-sm-12 col-sm-offset-2">
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
<?php } ?>