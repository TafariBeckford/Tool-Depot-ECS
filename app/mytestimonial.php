<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else{
?>
<html lang="en">
<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Tool Depot-Ja</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>
   

    </head>

<body>     
<!--Header-->
<?php include('includes/header.php');?>

<section class="user_profile inner_pages">
<div class="row">
      <div class="col-md-10 col-sm-3">
        <?php include('includes/sidebar.php');?>
      <div class="col-md-10 col-sm-8">



        <div class="profile_wrap">
          <div class="my_vehicles_list">
            <ul class="vehicle_listing">
<?php 
$useremail=$_SESSION['alogin'];
$sql = "SELECT * from testimonials where UserName=:username";
$query = $dbh -> prepare($sql);
$query -> bindParam(':username',$useremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($cnt=$query->rowCount() > 0)
{
foreach($results as $result)
{ ?>

              <li>
           
                <div>
                 <p><?php echo htmlentities($result->testimonial);?> </p>
                   <p><b>Posting Date:</b><?php echo htmlentities($result->PostingDate);?> </p>
                </div>
                <?php if($result->status==1){ ?>
                 <div class="vehicle_status"> <a class="btn btn-success">Active</a>

                  <div class="clearfix"></div>
                  </div>
                  <?php } else {?>
               <div class="vehicle_status"> <a href="#" class="btn btn-danger">Waiting for approval</a>
                  <div class="clearfix"></div>
                  </div>
                  <?php } ?>
              </li>
              <?php } } ?>
              
            </ul>
           
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
    <?php include('includes/registration.php');?>
        <!--/Registration-Form -->
        
        <!--Forget-Password -->
<?php include('includes/forgetpassword.php');?>
</html>
<?php } ?>