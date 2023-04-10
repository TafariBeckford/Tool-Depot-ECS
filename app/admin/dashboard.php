<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['username'])==0)
	{	
header('location:index.php');
}
else{
	?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <link href="assets/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
   

    
    <style>
        
  /* ----- Statistic ----- */
.statistic {
    padding-top: 57px;
}

.statistic__item {
    border: 1px solid #e5e5e5;
    background: #fff;
    padding: 20px 30px;
    position: relative;
    min-height: 180px;
    overflow: hidden;
    margin-bottom: 40px;
}

@media (min-width: 992px) and (max-width: 1199px) {
    .statistic__item {
        padding: 20px 10px;
    }
}

.statistic__item h2 {
    font-size: 36px;
    font-weight: 300;
    color: #4272d7;
}

@media (min-width: 992px) and (max-width: 1199px) {
    .statistic__item h2 {
        font-size: 22px;
    }
}

.statistic__item .desc {
    font-size: 18px;
    text-transform: uppercase;
    font-weight: 300;
    color: rgba(128, 128, 128, 0.6);
}

@media (min-width: 992px) and (max-width: 1199px) {
    .statistic__item .desc {
        font-size: 13px;
    }
}

.statistic__item .icon {
    display: inline-block;
    position: absolute;
    bottom: -50px;
    right: -7px;
}

.statistic__item .icon i {
    font-size: 180px;
    color: #808080;
    opacity: .2;
    line-height: 1;
    vertical-align: baseline;
}

.statistic__item--green {
    background: #00b26f;
}

.statistic__item--orange {
    background: #ff8300;
}

.statistic__item--blue {
    background: #00b5e9;
}

.statistic__item--red {
    background: #fa4251;
}

/* ----- Statistic 2 ----- */
.statistic2 {
    padding-top: 50px;
}

.statistic2 .statistic__item {
    border: none;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    -webkit-box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);
    -moz-box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);
    box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);
}

.statistic2 .statistic__item h2 {
    color: #fff;
}

.statistic2 .statistic__item .desc {
    color: rgba(255, 255, 255, 0.6);
}

        
    </style>
</head>

<body>
    <div id="wrapper">
        
        <?php include('includes/header.php');?>
        
        <?php include('includes/nav-side.php');?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
            <?php 
$userid=$_SESSION['username'];
$sql = "SELECT Name from tbadmin where id=:userid";
$query = $conn -> prepare($sql);
$query -> bindParam(':userid',$userid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>
            <div class="col-md-12">
                        <h3 class="page-header">
                            Welcome <?php echo htmlentities($result->Name);?> !
                        </h3>
                    </div>
                    <?php }} ?>
       <!-- STATISTIC-->
            <section class="statistic statistic2">
                <div class="container">
                <div class="row">
                        <a href="reg-users.php"><div class="col-lg-5">
                            <div class="statistic__item statistic__item--green">
                               	<?php 
$sql ="SELECT id from users ";
$query = $conn -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$regusers=$query->rowCount();

?>
                                <h2 class="number"><?php echo htmlentities($regusers);?></h2>
                                <span class="desc">Users</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-account-o"></i>
                                </div>
                            </div>
                            </div></a>
                        <a href="manage-rentals.php"><div class="col-lg-5">
                            <div class="statistic__item statistic__item--orange">
                               <?php 
$sql1 ="SELECT id from rentals ";
$query1 = $conn -> prepare($sql1);;
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totalrentals=$query1->rowCount();
?>
                                <h2 class="number"><?php echo htmlentities($totalrentals);?></h2>
                                <span class="desc">Rentals</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-shopping-cart"></i>
                                </div>
                            </div>
                            </div></a>
                        
                        
                    </div>
                </div>
            </section>
             <!-- STATISTIC-->
            <section class="statistic statistic2">
                <div class="container">
                <div class="row"> 
                        <a href="testimonials.php"><div class=" col-lg-5">
                            <div class="statistic__item statistic__item--blue">
                               	<?php 
$sql2 ="SELECT id from testimonials ";
$query2 = $conn -> prepare($sql1);;
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$totaltest=$query2->rowCount();
?>
                                <h2 class="number"><?php echo htmlentities($totaltest);?></h2>
                                <span class="desc">Testimonials</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-assignment"></i>
                                </div>
                            </div>
                </div> </a>
                        <a href="subscribers.php"><div class="col-lg-5">
                            <div class="statistic__item statistic__item--red">
                               <?php 
$sql3 ="SELECT id from subscribers ";
$query3 = $conn -> prepare($sql1);;
$query3->execute();
$results3=$query3->fetchAll(PDO::FETCH_OBJ);
$totalsub=$query3->rowCount();
?>
                                <h2 class="number"><?php echo htmlentities($totalsub);?></h2>
                                <span class="desc">Subscribers</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-email"></i>
                                    
                                </div>
                                
                            </div>
                           
                            </div></a>
                    </div>
                </div>
            </section>
            <!-- END STATISTIC-->
            <!-- END STATISTIC-->
				
               
            
				
                
                   
                <!-- /. ROW  -->
			<!--	<footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez</a></p></footer>-->
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
	 
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
	
	
	<script src="assets/js/easypiechart.js"></script>
	<script src="assets/js/easypiechart-data.js"></script>
	
	
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    </div>

</body>

</html>
<?php } ?>