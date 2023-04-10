<?php 
session_start();
include('includes/config.php');
//error_reporting(0);
?>


<!DOCTYPE html>
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
<!--Login-Form -->
<?php include('includes/login.php');?>
<!--/Login-Form --> 
<!--HEADER-->
<?php include('includes/header.php');?>
        <!--/HEADER-->
		<!-- NAVIGATION -->
		<?php include('includes/navigation.php');?>
		<!-- /NAVIGATION -->
			 <?php 
$pagetype=$_GET['type'];
$sql = "SELECT type,detail,PageName from pages where type=:pagetype";
$query = $dbh -> prepare($sql);
$query->bindParam(':pagetype',$pagetype,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>

<section class="about_us section-padding">
  <div class="container">
    <div class="section-header text-center">


      <h2><?php   echo htmlentities($result->PageName); ?></h2>
         </div>
      <p><?php  echo $result->detail; ?> </p>
   
   <?php } }?>
  </div>
</section>
        
        
        
      
  <?php include('includes/footer.php');?>
    </body>
</html>