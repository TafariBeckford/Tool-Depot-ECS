<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else{
if(isset($_POST['update']))
  {
$password=$_POST['password'];
$newpassword=$_POST['newpassword'];
$email=$_SESSION['alogin'];
  $sql ="SELECT Password FROM users WHERE Email=:email and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update users set Password=:newpassword where Email=:email";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
$msg="Your Password succesfully changed";
}
else {
$error="Your current password is wrong";  
}
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>
<link type="text/css" rel="stylesheet" href="css/style.css"/>
   
		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
  <script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>  
    



<style type="text/css">
    body{
		
		font-family: 'Roboto', sans-serif;
	}
    .form-control{
		height: 40px;
		box-shadow: none;
		color: #969fa4;
	}
	.form-control:focus{
		border-color: #D10024;
	}
    .form-control, .btn{        
        border-radius: 3px;
    }
	.signup-form{
		width: 400px;
		margin: 0 auto;
		padding: 30px 0;
	}
	.signup-form h2{
		color: #636363;
        margin: 0 0 15px;
		position: relative;
		text-align: center;
    }
	
		
	
    .signup-form .hint-text{
		color: #999;
		margin-bottom: 30px;
		text-align: center;
	}
    .signup-form form{
		color: #999;
        
		border-radius: 3px;
    	margin-bottom: 15px;
        background: #f2f3f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
	.signup-form .form-group{
		margin-bottom: 20px;
	}
	
	.signup-form .btn{        
        font-size: 16px;
        font-weight: bold;		
		min-width: 140px;
        outline: none !important;
    }
	.signup-form .row div:first-child{
		padding-right: 10px;
	}
	.signup-form .row div:last-child{
		padding-left: 10px;
	}    	
    .signup-form a{
		color: #fff;
		text-decoration: underline;
	}
    .signup-form a:hover{
		text-decoration: none;
	}
	.signup-form form a{
		color: #D10024;
		text-decoration: none;
	}	
	.signup-form form a:hover{
		text-decoration: underline;
        
	}
    .bt{
  background-color: #D10024;
  border: none;
  color: white;
  padding: 15px 145px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
    }
</style>
</head>
<body>
    
    
    <?php include('includes/header.php');?>
<div class="signup-form">
    <form name="chngpwd" action="" method="post" onSubmit="return valid();">
		<h2>Update Password</h2>
		 <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
        <div class="form-group">
			<p>Current Password</p>
        <input type="password" class="form-control" id="password" name="password" placeholder="" required="required">	
			</div>
        <div class="form-group">
			<p>New Password</p>
        <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="" required="required">	
			</div>
        <p>Confirm Password</p>
         <div class="form-group">
        <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="" required="required">	
			</div>
		<div class="form-group">
            <button type="submit" name="update" class="bt">Update</button>
        </div>
    </form>
    	
</div>
    <?php include('includes/footer.php');?>
</body>
</html>
<?php } ?>