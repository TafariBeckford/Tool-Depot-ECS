<?php
if(isset($_POST['emailsubscibe']))
{
$subscriberemail=$_POST['subscriberemail'];
$sql ="SELECT SubscriberEmail FROM subscribers WHERE SubscriberEmail=:subscriberemail";
$query= $dbh -> prepare($sql);
$query-> bindParam(':subscriberemail', $subscriberemail, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
echo "<script>alert('Already Subscribed.');</script>";
}
else{
$sql="INSERT INTO subscribers(SubscriberEmail) VALUES(:subscriberemail)";
$query = $dbh->prepare($sql);
$query->bindParam(':subscriberemail',$subscriberemail,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Subscribed successfully.');</script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}
}
?>

<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Sign Up for the <strong>NEWSLETTER</strong></p>
							<form method="post">
								<input class="input" name="subscriberemail" type="email" placeholder="Enter Your Email">
								<button  name="emailsubscibe" class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->
                    

<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">About Us</h3>
								<p>The Tool-Depot Ja was founded in 2000, The Tool Depot-Ja Jamaica’s largest tool retailer.</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>1734 Lady Musgrave Road</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>+876-295-5184</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>Tool-Depot Ja@gmail.com</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categories</h3>
								<ul class="footer-links">
									<li><a href="powertools.php">Power Tools</a></li>
									<li><a href="handtools.php">Hand Tools</a></li>
									<li><a href="welding.php">Welding & Soldering Tools</a></li>
									<li><a href="woodworking.php">Woodworking Tools</a></li>
									<li><a href="aircompressor.php">Air Compressors & Accessories</a></li>
                                    <li><a href="toolstorage.php">Tool Storage</a></li>
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Information</h3>
								<ul class="footer-links">
									<li><a href="admin/index.php">Admin Login</a></li>
                                    <li><a href="page.php?type=privacy">Privacy Policy</a></li>
                                      <li><a href="page.php?type=aboutus">About Us</a></li>
								</ul>
							</div>
						</div>

						
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
            
             
			<!-- /top footer -->
                    </footer>