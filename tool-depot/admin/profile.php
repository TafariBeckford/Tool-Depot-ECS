<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['username'])==0)
  { 
header('location:index.php');
}
else{
if(isset($_POST['updateprofile']))
  {
$username=$_SESSION['username'];
$name=$_POST['name'];
$email=$_POST['email'];
$contactno=$_POST['contactno'];
$gender=$_POST['gender'];

$sql="update tbadmin set Name=:name,Email=:email,ContactNo=:contactno,Gender=:gender where id=:id";
$query = $conn->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':contactno',$contactno,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':id',$username,PDO::PARAM_STR);
$query->execute();
$msg="Profile Updated Successfully";
}

?>
  <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	 <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Profile</title>
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

<div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            User Profile
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
              <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                              User Profile Details
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">


<?php 
$userid=$_SESSION['username'];
$sql = "SELECT * from tbadmin where id=:userid";
$query = $conn -> prepare($sql);
$query -> bindParam(':userid',$userid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>
<section>
  <div >
    <div>
      <!--<div class="upload_user_logo"> <img src="assets/images/dealer-logo.jpg" alt="image">-->
      </div>

     
    </div>
  
    <div>
      <div>
      <div >
        <div>
          
          <?php  
         if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
          <form  method="post">
           <div class="form-group">
              
             <?php if($result->UpdationDate!=""){?>
            <div class="form-group">
              <label class="control-label">Last Update at  -</label>
             <?php echo htmlentities($result->UpdationDate);?>
            </div>
            <?php } ?>
             <div class="form-group">
              <label class="control-label">User ID</label>
              <input class="form-control white_bg" value="<?php echo htmlentities($result->id);?>" name="username" id="username" type="text" required readonly>
            </div>
            <div class="form-group">
              <label class="control-label">Full Name</label>
              <input class="form-control white_bg" name="name" value="<?php echo htmlentities($result->Name);?>" id="name" type="text"  required>
            </div>
            <div class="form-group">
              <label class="control-label">Email Address</label>
              <input class="form-control white_bg" value="<?php echo htmlentities($result->Email);?>" name="email" id="email" type="email" required >
            </div>
            <div class="form-group">
              <label class="control-label">Phone Number</label>
              <input class="form-control white_bg" name="contactno" value="<?php echo htmlentities($result->ContactNo);?>" id="contactno" type="text">
            </div>
            <div class="form-group">
              <label class="control-label">Gender&nbsp;(Male/Female)</label>
              <input class="form-control white_bg" value="<?php echo htmlentities($result->Gender);?>" name="gender"  id="gender" type="text" >
            </div>
            
            <?php }} ?>
           
            <div class="form-group">
              <button type="submit" name="updateprofile" class="btn">Save Changes <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
            </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
                                    </section>
    </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
    </div>
     </div>
    </div>
<!--/Profile-setting--> 

<!--Footer -->
<footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez</a></p></footer>
			
<!-- /Footer--> 

<!-- Loading Scripts -->
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