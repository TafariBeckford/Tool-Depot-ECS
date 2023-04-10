<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['username'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_REQUEST['eid']))
	{
$eid=intval($_GET['eid']);
$status="2";
$sql = "UPDATE rentals SET Status=:status WHERE  id=:eid";
$query = $conn->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':eid',$eid, PDO::PARAM_STR);
$query -> execute();

$msg="Booking Successfully Cancelled";
}


if(isset($_REQUEST['aeid']))
	{
$aeid=intval($_GET['aeid']);
$status=1;

$sql = "UPDATE rentals SET Status=:status WHERE  id=:aeid";
$query = $conn->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
$query -> execute();

$msg="Booking Successfully Confirmed";
}


 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manage Rentals</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- Morris Chart Styles-->
   
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
    <div id="wrapper">
         <?php include('includes/header.php');?>
        
        <?php include('includes/nav-side.php');?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            Manage Rentals
                        </h2>
                    </div>
                </div> 
                 <!-- /. ROW  -->
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Rentals Info
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                               <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Email</th>
                                            <th>Tool Name</th>
                                            <th>From Date</th>
                                            <th>To Date</th>
                                            <th>Status</th>
                                            <th>Quantity</th>
                                            <th>Posting Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php $sql = "SELECT rentals.ToolId, tools.ToolName,tools.ToolBrand,rentals.FromDate,rentals.ToDate,rentals.Status,rentals.quantity,rentals.PostingDate,rentals.Email,rentals.id from rentals INNER JOIN tools on rentals.ToolId=tools.id ";
$query = $conn -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{    ?> 
          <tr>
           <td><?php echo htmlentities($cnt);?></td>
           <td><?php echo htmlentities($result->Email);?></td>
                                            <td><?php echo htmlentities($result->ToolBrand);?> ,<?php echo htmlentities($result->ToolName);?></td>
           <td><?php echo htmlentities($result->FromDate);?></td>
           <td><?php echo htmlentities($result->ToDate);?></td>
           <td><?php 
if($result->Status==0)
{
echo htmlentities('Not Confirmed yet');
} else if ($result->Status==1) {
echo htmlentities('Confirmed');
}
 else{
  echo htmlentities('Cancelled');
 }
          ?></td>
   <td><?php echo htmlentities($result->quantity);?></td>


           <td><?php echo htmlentities($result->PostingDate);?></td>
          <td><a href="manage-rentals.php?aeid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to Confirm this booking')"> Confirm</a> /


<a href="manage-rentals.php?eid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to Cancel this Booking')"> Cancel</a>
</td>

          </tr>
          <?php $cnt=$cnt+1; }} ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
            
                <!-- /. ROW  -->
        </div>
               <footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez</a></p></footer>
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
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>


<?php } ?>
