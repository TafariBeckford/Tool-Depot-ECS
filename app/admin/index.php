<?php

error_reporting(0);
 if(isset($_POST['submit']))    
   {   
         
       require_once 'includes/config.php';
      $username=$_POST['username'];
      $password=$_POST['password']; 
       
      $counter=0;
        
      $stmt = $conn->prepare("SELECT * FROM tbadmin WHERE id=?");
        $stmt->execute([$_POST['username']]);
        $user = $stmt->fetch();

//        if ($user['id']==$username && $user['Password']==md5($_POST['password'])) //md5($_POST['pass'])
       if ($user['id']==$username && $user['Password']== $_POST['password'])
        {
          session_start();
            
           $_SESSION['username']=$user['id'];
         
           header('location:dashboard.php');
            
         } 
         else 
         {
             echo "User Credentials are incorrect.Please try again";
         }
   }

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login</title>
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 <style>
	.login-form {
		width: 340px;
    	margin: 50px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style> 
</head>
    
    <body>
	
	<div class="login-form">
    <form  method="post">
        <h3 class="text-center">Admin Login</h3><br>     
        <div class="form-group">
            <input type="text" class="form-control" name="username"placeholder="Username" required="required">
        </div><br>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div><br>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Log in</button>
        </div>
        <div class="clearfix">
            
            <!--<a href="forgetpassword.php" class="pull-right">Forgot Password?</a>-->
            
        </div>        
    </form>
   
</div>
	
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

</body>

</html>
