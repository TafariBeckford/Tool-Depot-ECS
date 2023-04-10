<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['username'])==0)
	{	
header('location:index.php');
}
else{

if(isset($_POST['submit']))
{
$brand=$_POST['BrandName'];
$id=$_GET['id'];
$sql="update brands set BrandName=:BrandName where id=:id";
$query = $conn->prepare($sql);
$query->bindParam(':BrandName',$brand,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $conn->lastInsertId();




}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Brands</title>
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
                            Edit Brand
                        </h2>
                    </div>
                </div> 
                 <!-- /. ROW  -->
              <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Brand Name:
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form  method="post" onSubmit="return valid();">
                                        <div class="form-group">
                                       
                                        <?php	
$id=$_GET['id'];
$ret="select * from brands where id=:id";
$query= $conn -> prepare($ret);
$query->bindParam(':id',$id, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
foreach($results as $result)
{
?>
                                          
                                           <input type="text" class="form-control" value="<?php echo htmlentities($result->BrandName);?>" name="BrandName" id="brand" required>
                                        </div>
                                        <?php }} ?>
                                        
                                        <button type="submit" name="submit" class="btn btn-default">Submit</button>
                                    
                                    </form>
                                </div>
                            
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
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
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
<?php } ?>