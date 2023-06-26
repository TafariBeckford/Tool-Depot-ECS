<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(isset($_POST['submit']))
{
$fromdate=$_POST['fromdate'];
$todate=$_POST['todate']; 
$useremail=$_SESSION['alogin'];
$quantity=$_POST['quantity'];
$status=0;
$vhid=$_GET['vhid'];
$sql="INSERT INTO  rentals(Email,ToolId,FromDate,ToDate,Status,quantity) VALUES(:useremail,:vhid,:fromdate,:todate,:status,:quantity)";
$query = $dbh->prepare($sql);
$query->bindParam(':useremail',$useremail,PDO::PARAM_STR);
$query->bindParam(':vhid',$vhid,PDO::PARAM_STR);
$query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
$query->bindParam(':todate',$todate,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':quantity',$quantity,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Booking successfull.');</script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}

}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Electro - HTML Ecommerce Template</title>

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

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
    <?php include('includes/login.php');?>
<!--/Login-Form --> 
<!--HEADER-->
<?php include('includes/header.php');?>
        
<?php 
$vhid=intval($_GET['vhid']);
$sql="SELECT tools.ToolName,tools.ToolBrand,tools.ToolOverview,tools.PricePerDay,tools.ToolCategory,tools.id,tools.Vimage1,tools.Vimage2,tools.Vimage3,tools.Vimage4 from tools where tools.id=:vhid";
$query = $dbh -> prepare($sql);
$query->bindParam(':vhid',$vhid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
?>  
        
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							<div class="product-preview">
								<img src="./admin/img/tools/<?php echo htmlentities($result->Vimage1);?>" alt="image">
                                
							</div>
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
							<div class="product-preview">
								<img src="./admin/img/tools/<?php echo htmlentities($result->Vimage2);?>" alt="image">
							</div>

							<div class="product-preview">
								<img src="./admin/img/tools/<?php echo htmlentities($result->Vimage3);?>" alt="">
							</div>

							<div class="product-preview">
								<img src="./admin/img/tools/<?php echo htmlentities($result->Vimage4);?>" alt="image">
							</div>
						</div>
					</div>
                    
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
                            <h2 class="product-name"><?php echo htmlentities($result->ToolBrand);?></h2>
							<h2 class="product-name"><?php echo htmlentities($result->ToolName);?></h2>
							 
                            
							<div>
								<h3 class="product-price">$<?php echo htmlentities($result->PricePerDay);?> <del class="product-old-price">$990.00</del></h3>
								<span class="product-available">In Stock</span>
							</div>
							<p><?php echo htmlentities($result->ToolOverview);?></p>

						<?php }} ?>

										

					
                             <br>
                                             
    <form method="post">
<div class="form-group">
<div class="input-number">
    <input type="number" placeholder="Quantity" name="quantity" > 
										<span class="qty-up">+</span>
										<span class="qty-down">-</span>
									</div>
								</div>
          
            <div class="form-group">
              <input type="text" class="form-control" name="fromdate" placeholder="From Date(dd/mm/yyyy)" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="todate" placeholder="To Date(dd/mm/yyyy)" required>
            </div>
        <?php if($_SESSION['alogin'])
              {?>
          <div class="add-to-cart">
              <div class="form-group">
                <button class="add-to-cart-btn" name="submit" input="submit"><i class="fa fa-shopping-cart"></i>Book Tool</button>
              </div>
         </div>
         <?php } else { ?>
<a href="#myModal" data-toggle="modal" data-dismiss="modal">Login/Register</a>
              <?php } ?>
         </form>
                        </div>
					<!-- /Product details -->

					 		</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
    
        </div>
		<!--Login-Form -->
<?php include('includes/footer.php');?>
<!--/Login-Form --> 
        <?php include('includes/registration.php');?>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>

	</body>
</html>
