<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else{
if(isset($_POST['updateprofile']))
  {
$name=$_POST['fullName'];
$mobileno=$_POST['phoneNumber'];
$dob=$_POST['dob'];
$adress=$_POST['address'];
$city=$_POST['city'];
$country=$_POST['country'];
$email=$_SESSION['alogin'];
$sql="update users set Name=:name,ContactNo=:mobileno,dob=:dob,Address=:adress,city=:city,country=:country where Email=:email";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
$query->bindParam(':dob',$dob,PDO::PARAM_STR);
$query->bindParam(':adress',$adress,PDO::PARAM_STR);
$query->bindParam(':city',$city,PDO::PARAM_STR);
$query->bindParam(':country',$country,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->execute();
$msg="Profile Updated Successfully";
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
    




<style type="text/css">
    body{
		
		font-family: 'Roboto', sans-serif;
	}
    .form-control{
		height: 40px;
		box-shadow: none;
		color:black;
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
     <?php 
$useremail=$_SESSION['alogin'];
$sql = "SELECT * from users where Email=:useremail";
$query = $dbh -> prepare($sql);
$query -> bindParam(':useremail',$useremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>
<body>
    <?php include('includes/header.php');?>
<div class="signup-form">
    <form action="" method="post">
		<h2>General Settings</h2>
	<?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>    
        <div class="form-group">
			<p>Registration Date</p>
        <input type="text" class="form-control" name="first_name"  value="<?php echo htmlentities($result->RegDate);?>" placeholder="" >	
			</div>
        <div class="form-group">
			<p>Updation Date</p>
        <input type="text" class="form-control" name="first_name" value="<?php echo htmlentities($result->UpdationDate);?>" placeholder="" >	
			</div>
        <div class="form-group">
			<p>Full Name</p>
        <input type="text" class="form-control" name="fullName"  value="<?php echo htmlentities($result->Name);?>" placeholder="" >
			</div>     	
        <div class="form-group">
            <p>Email</p>  
        	<input type="email" class="form-control" name="email" value="<?php echo htmlentities($result->Email);?>" placeholder="" >
        </div>
        <p>Contact Number</p>
		<div class="form-group">
            <input type="text" class="form-control" name="phoneNumber" value="<?php echo htmlentities($result->ContactNo);?>" placeholder="" >
        </div>
        <p>Date of Birth</p>
		<div class="form-group">
            <input type="text" class="form-control" name="dob" value="<?php echo htmlentities($result->dob);?>" placeholder="" >
        </div> 
        <p>Address</p>
        <div class="form-group">
			  <textarea type="text" class="form-control" name="Address" value="<?php echo htmlentities($result->Address);?>" rows="5" placeholder="" >
            </textarea>
		</div>
         <p>City</p>
		<div class="form-group">
            <input type="text" class="form-control" name="city" value="<?php echo htmlentities($result->city);?>" placeholder="" >
        </div> 
         <p>Country</p>
		<div class="form-group">
            <input type="text" class="form-control" name="country" value="<?php echo htmlentities($result->country);?>" placeholder="" >
        </div> 
		<div class="form-group">
            <button type="submit"  name="updateprofile" class="bt">Update</button>
        </div>
         <?php }} ?>
    </form>
    	
</div>
    <?php include('includes/footer.php');?>
</body>
</html>
<?php } ?>