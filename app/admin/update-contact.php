<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['username'])==0)
	{	
header('location:index.php');
}
else{
// Code for change password	
if(isset($_POST['submit']))
{
$address=$_POST['address'];
$email=$_POST['email'];	
$contactno=$_POST['contactno'];
$sql="update contactusinfo set Address=:address,Email=:email,ContactNo=:contactno";
$query = $conn->prepare($sql);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':contactno',$contactno,PDO::PARAM_STR);
$query->execute();
$msg="Information Updated Successfully";
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update Contact Info</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
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
                            Update Contact Info
                        </h2>
                    </div>
                </div> 
                 <!-- /. ROW  -->
              <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Contact Info
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form method="post" name="changecon"  onSubmit="return valid();">
                                    							
  	        	  <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                                    
 <?php $sql = "SELECT * from  contactusinfo ";
$query = $conn -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>	

                                        <div class="form-group">
                                           <label>Address:</label>
                                            <textarea class="form-control" name="address" id="address" required><?php echo htmlentities($result->Address);?></textarea> &nbsp;
                                        </div>
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <input type="email" class="form-control" name="email" id="email" value="<?php echo htmlentities($result->Email);?>" required>&nbsp;
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Contact Number:</label>
                                            <input type="text" class="form-control" value="<?php echo htmlentities($result->ContactNo);?>" name="contactno" id="contactno" required>&nbsp;
                                           
                                        </div>
                                        
                                        <?php }} ?>
                                        
                                        <button type="submit" name="submit" class="btn btn-default">Update</button>
                                    </form>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez</a></p></footer>
			</div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
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