<?php 
session_start();
include('includes/config.php');
error_reporting(0);
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

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
        <!--HEADER-->
<?php include('includes/header.php');?>
        <!--/HEADER-->
		<!-- NAVIGATION -->
		<?php include('includes/navigation.php');?>
		<!-- /NAVIGATION -->
		<div class="hero">
         <img src="https://contentgrid.homedepot-static.com/hdus/en_US/DTCCOMNEW/fetch/Category_Pages/Tools/Power_Tools/Tools-Power-Tools-9-6-hero-12g-v4.jpg" class="stretchy">
             <div class="hero-text">
                 <h1 class="PowerToolfont">Hand Tools</h1>
</div>
   
		
 
		
		
	<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Categories</h3>
							<div class="checkbox-filter">

								<div class="input-checkbox">
									<input type="checkbox" id="category-1" value="powertools.php" onclick="if (this.checked) { window.location = this.value; }">
									<label for="category-1">
										<span></span>
										Power Tools
										
									</label>

								</div>

								<div class="input-checkbox">
									<input type="checkbox" id="category-2" value="handtools.php" onclick="if (this.checked) { window.location = this.value; }">
									<label for="category-2">
										<span></span>
										Hand Tools
										
									</label>
								</div>

								<div class="input-checkbox">
									<input type="checkbox" id="category-3" value="toolstorage.php" onclick="if (this.checked) { window.location = this.value; }">
									<label for="category-3">
										<span></span>
										Tool Storage
										

									</label>
								</div>

								<div class="input-checkbox">
									<input type="checkbox" id="category-4" value="woodworking.php" onclick="if (this.checked) { window.location = this.value; }">
									<label for="category-4">
										<span></span>
										Woodworking Tools
										
									</label>
								</div>

								<div class="input-checkbox">
									<input type="checkbox" id="category-5" value="aircompressor.php" onclick="if (this.checked) { window.location = this.value;}">
									<label for="category-5">
										<span></span>
									Air Compressors and Acessories
										
									</label>
								</div>

								<div class="input-checkbox">
									<input type="checkbox" id="category-6" value="welding.php" onclick="if (this.checked) { window.location = this.value; }">
									<label for="category-6">
										<span></span>
									Welding & Soldering Tools
										
									</label>
								</div>
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							
							
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							
							<div class="checkbox-filter">
								
								
								
								
								
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							

							

							
						</div>
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->


					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store products -->
						<div class="row">
							<!-- product -->
							<div class="col-md-4 col-xs-6">
                                <?php $sql = "SELECT tools.ToolName,tools.ToolBrand,tools.ToolOverview,tools.PricePerDay,tools.ToolCategory,tools.id,tools.Vimage1 from tools WHERE Toolcategory='Hand Tools' ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(\PDO::FETCH_ASSOC);
$cnt=1;
if($query->rowCount() > 0)
{
    
   
foreach($results as $row)
{  
								echo'<div class="product">
                                
											<div class="product-img">
												<img src="./img/<?php echo htmlentities($result->Vimage1);?>" alt="Image">
												<div class="product-label">
													
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">'.$row['ToolBrand'].'</p>
												<h3 class="product-name"><a href="product.php?vhid='.$row['id'].'">'.$row['ToolName'].'</a></h3>
												<h4 class="product-price">'.$row['PricePerDay'].' <del class="product-old-price"></del></h4>
												<div class="product-rating">
													
												</div>
												
                                               
											</div>
											
								</div>'; 
				          
} 
    
}?>
                            </div>
						</div>
						<!-- /store products -->

						
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>
        </div>
	</body>
</html>
