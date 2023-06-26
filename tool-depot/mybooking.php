<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else{
?><!DOCTYPE HTML>
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
<!--Page Header-->
<!-- /Header --> 

<section>
    <div class="row">
      <div class="col-md-6 col-sm-8">
       <?php include('includes/sidebar.php');?>
   
 <div class="col-md-6 col-sm-8">
        <div class="profile_wrap">
               <div class="my_vehicles_list">
           
<?php 
$useremail=$_SESSION['alogin'];
$sql="SELECT rentals.ToolId,tools.ToolName,tools.Vimage1,rentals.ToDate,rentals.FromDate,rentals.status ,rentals.quantity
FROM rentals
INNER JOIN tools ON rentals.ToolId=tools.id WHERE rentals.Email=:username;";
$query = $dbh -> prepare($sql);
$query-> bindParam(':username', $useremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>


                <div class="vehicle_img"> <a href="product.php?vhid=?php echo htmlentities($result->vid);?>""><img src="admin/img/tools/<?php echo htmlentities($result->Vimage1);?>" alt="image"></a> 
</div>
            
                <div class="vehicle_title">
                  <h6><a href="product.php?vhid=<?php echo htmlentities($result->vid);?>""> <?php echo htmlentities($result->ToolName);?>  <?php echo htmlentities($result->ToolBrand);?></a></h6>
                  <p><b>From Date:</b> <?php echo htmlentities($result->FromDate);?><br /> <b>To Date:</b> <?php echo htmlentities($result->ToDate);?></p>
                </div>
                <?php if($result->Status==1)
                { ?>
                <div class="vehicle_status"> <a href="#" class=" btn btn-sucess">Confirmed</a>
                           <div class="clearfix"></div>
        </div>

              <?php } else if($result->Status==2) { ?>
 <div class="vehicle_status"> <a href="#" class="btn btn-danger">Cancelled</a>
            <div class="clearfix"></div>
        </div>
             


                <?php } else { ?>
 <div class="vehicle_status"> <a href="#" class=" btn btn-warning">Not Confirm yet</a>
            <div class="clearfix"></div>
        </div>
                <?php } ?>
      
         </li>
              <?php }} ?>
             
         
           
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/my-vehicles--> 
<?php include('includes/footer.php');?>
<?php include('includes/registration.php');?>
        <!--/Registration-Form -->
        
        <!--Forget-Password -->
<?php include('includes/forgetpassword.php');?>

<!-- Scripts --> 

</body>
</html>
<?php } ?>