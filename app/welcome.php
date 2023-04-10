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
   

    </head>
	<body>
		<!--HEADER-->
<?php include('includes/header.php');?>
        <!--/HEADER-->
		<!-- NAVIGATION -->
		<?php include('includes/navigation.php');?>
		<!-- /NAVIGATION -->
			<!-- SECTION -->
        <div class="hero">
        <img src="https://contentgrid.homedepot-static.com/hdus/en_US/DTCCOMNEW/fetch/Category_Pages/Tools/Free-tool-and-more-3.jpg" alt="DeWalt, Makita, Milwaukee and RIDGID Drills" class="stretchy">
        </div>
        <h1 class="catheader"> Tool & Equipment Categories</h1>
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/power-tools-12g.jpg" alt="">
							</div>
							<div class="shop-body">
								<h3>Power<br>Tools</h3>
								<a href="powertools.php" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/hand-tools-12g.jpg" alt="">
							</div>
							<div class="shop-body">
								<h3>Hand<br>Tools</h3>
								<a href="handtools.php" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/tool-storage-12g.jpg" alt="">
							</div>
							<div class="shop-body">
								<h3>Tool<br>Storage</h3>
								<a href="toolstorage.php" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
                    
                    <div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/woodworking-tools.jpg" alt="">
							</div>
							<div class="shop-body">
								<h3>Woodworking<br>Tools</h3>
								<a href="woodworking.php" class="cta-btn">Shop now<i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
                    
                    <div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/air-compressor-tool-kit.jpg" alt="">
							</div>
							<div class="shop-body">
								<h3>Air Compressors & Acessories</h3>
								<a href="aircompressor.php" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
                    
                    <div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/welding-and-soldering-tools.jpg" alt="">
							</div>
							<div class="shop-body">
								<h3>Welding & Soldering<br>Tools</h3>
								<a href="welding.php" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
                    
					<!-- /shop -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">New Products</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									
									
								</ul>
								
							</div>
						</div>
					</div>
                    
                    
                    
                       <!-- Products tab & slick -->
					      <div class="col-md-12">
					     	<div class="row">
							    <div class="products-tabs">
							    	<!-- tab -->
								  <div id="tab1" class="tab-pane active">
								<div class="products-slick" data-nav="#slick-nav-1">';
                                    
					<!-- /section title -->
<?php $sql = "SELECT tools.ToolName,tools.ToolBrand,tools.ToolOverview,tools.PricePerDay,tools.ToolCategory,tools.id,tools.Vimage1 from tools limit 4";
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
												<img src="./img/<?php echo htmlentities($result->Vimage1);?>" alt="">
												<div class="product-label">
													<span class="new">NEW</span>
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
                                  
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						
					</div>
                  
                    </div>
                    
					<!-- Products tab & slick -->
				</div>
                 
				<!-- /row -->
			</div>
          
			<!-- /container -->
		</div>
		<!-- /SECTION -->


           
        <section>
                <h1 class="catheader"> Tool and Equipment Brands</h1>
        <div id="showgrid">
  <div class="row">
    <div class="column"><img src="img/partner/new%20DeWalt-power-tools-logo_1_60.png" alt=""></div>
    <div class="column"><img src="img/partner/Makita-power-tools-logo.png" alt=""></div>
    <div class="column"><img src="img/partner/Milwaukee-power-tools-logo.png" alt=""></div>
  </div>
  <div class="row">
    <div class="column"><img src="img/partner/RIDGID-power-tools-logo.png" alt=""></div>
    <div class="column"><img src="img/partner/Bosch-power-tools-logo.png" alt=""></div>
    <div class="column"><img src="img/partner/Ryobi-power-tools-logo_60.png" alt=""></div>
  </div>
 
</div>

        </section>
        	<!-- /SECTION -->

    

		

	
		<!-- NEWSLETTER -->
		
               <!--FOOTER-->     
		<?php include('includes/footer.php');?>
              
	

<!-- Scripts --> 


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
