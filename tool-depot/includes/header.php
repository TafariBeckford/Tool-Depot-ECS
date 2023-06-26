
<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +876-295-5184</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> Tool-Depot Ja@gmail.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> 1734 Lady Musgrave Road</a></li>
					</ul>
					<ul class="header-links pull-right">
                     
                        <?php if(strlen($_SESSION['alogin'])==0)
	{	
?>                      
                        <li><a href="#myModal" data-toggle="modal" data-dismiss="modal"><i class="fa fa-user-o" ></i>Login/Register</a></li>
	<?php }
else{ 

echo "Welcome To Tool Depot-Ja Portal";
 } ?>

					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="index.php" class="logo">
									<img src="./img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form action="search.php" method="post">
									<select class="input-select">
										<option value="0">All Categories</option>
										<option value="1">Power Tools</option>
										<option value="2">Hand Tools</option>
                                        <option value="3">Tool Storage</option>
                                        <option value="3">Woodworking</option>
                                        <option value="3">Welding</option>
                                         <option value="3">Compressors</option>
									</select>
									<input class="input" name="query" placeholder="Search here" >
									<button type="submit" name="submit" class="search-btn">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
                                	<!-- Wishlist -->
							
									<a>
         
                                       <div class="dropdown">
  <button class="dropbtn"><i class="fa fa-bars"></i> Menu</button>
  <div class="dropdown-content">
                                              <?php if($_SESSION['alogin']){?>
            <a href="user.php">Profile Settings</a>
            <a href="testimonial.php">Post a Testimonial</a>
            <a href="up.php">Update Password</a>
            <a href="mybooking.php">View Booking</a>
            <a href="mytestimonial.php">My Testimonial</a>
            <a href="logout.php">Sign Out</a>  
                                           </div>
                                           
                                 <?php } else { ?>
            <a href="#myModal"  data-toggle="modal" data-dismiss="modal">Profile Settings</a>
            <a href="#myModal"  data-toggle="modal" data-dismiss="modal">Post a Testimonial</a>
             <a href="#myModal"  data-toggle="modal" data-dismiss="modal">Update Password</a>
            <a href="#myModal"  data-toggle="modal" data-dismiss="modal">View Booking</a>
            <a href="#myModal"  data-toggle="modal" data-dismiss="modal">My Testimonial</a>                              
            <a href="#myModal"  data-toggle="modal" data-dismiss="modal">Sign Out</a>
            <?php } ?>
                            </div>
                                </a>
								<!-- /Wishlist -->
								

        
								
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->

<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
            </div>
		</header>
		<!-- /HEADER -->