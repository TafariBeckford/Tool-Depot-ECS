<?php
require_once "config.php";
error_reporting(0);
if(isset($_POST['signup']))
{
$fname=$_POST['Name'];
$mobile=$_POST['ContactNumber'];   
$email=$_POST['emailid']; 
$password=$_POST['Password']; 
$sql="INSERT INTO users(Name,Email,Password,ContactNo) VALUES(:fname,:email,:password,:mobile)";
$query=$dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Registration successfull. Now you can login');</script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}
?>


<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
<script type="text/javascript">
function valid()
{
if(document.signup.password.value!= document.signup.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.signup.confirmpassword.focus();
return false;
}
return true;
}
</script>



<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style type="text/css">
   body {
		font-family: 'Varela Round', sans-serif;
	}
    .form-control {
        box-shadow: none;
        border-color: #ddd;
    }
    .form-control:focus {
		border-color: #D10024;
        box-shadow: 0 0 8px rgba(251,110,157,0.4);
	}
	.modal-login {
        color: #434343;
		width: 350px;
	}
	.modal-login .modal-content {
		padding: 20px;
		border-radius: 1px;
		border: none;
        position: relative;
	}
	.modal-login .modal-header {
		border-bottom: none;
	}
	.modal-login h4 {
		text-align: center;
		font-size: 22px;
        margin-bottom: -10px;
	}
    .modal-login .avatar {
        color: #fff;
		margin: 0 auto;
        text-align: center;
		width: 100px;
		height: 100px;
		border-radius: 50%;
		z-index: 9;
		background: #D10024;
		padding: 15px;
		box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
	}
    .modal-login .avatar i {
        font-size: 62px;
    }
	.modal-login .form-control, .modal-login .btn {
		min-height: 40px;
		border-radius: 1px; 
        transition: all 0.5s;
	}    
	.modal-login .hint-text {
		text-align: center;
		padding-top: 10px;
	}
	.modal-login .close {
        position: absolute;
		top: 15px;
		right: 15px;
	}
	.modal-login .btn {
		background: #D10024;
		border: none;
		line-height: normal;
	}
	.modal-login .btn:hover, .modal-login .btn:focus {
		background:#D10024;
	}
	.modal-login .hint-text a {
		color: #999;
	}
	.trigger-btn {
		display: inline-block;
		margin: 100px auto;
	}
</style>
</head>



<body>

<!-- Modal HTML -->
<div id="regModal" class="modal fade">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">
                <div class="avatar"><i class="material-icons">&#xE7FD;</i></div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form action=" " name="signup" method="post" onSubmit="return valid();">
                    <div class="form-group">
						<input type="text" class="form-control" name="Name" placeholder="Name" required="required">
					</div>
                    
                    <div class="form-group">
						<input type="text" class="form-control" name="ContactNumber" placeholder="Contact Number" required="required">
					</div>
                    <div class="form-group">
						<input type="email" class="form-control" name="emailid" onBlur="checkAvailability()" placeholder="Email" required="required">  <span id="user-availability-status" style="font-size:12px;"></span> 
					</div>
					<div class="form-group">
						<input type="password" class="form-control"  name="Password" placeholder="Password" required="required">
					</div>
					<div class="form-group">
						<input type="submit"  name="signup" class="btn btn-primary btn-block btn-lg" value="Register">
					</div>
				</form>				
				<div class="hint-text small"><a href="#">Forgot Your Password?</a></div>
                <div class="hint-text small"><a href="#">Don't have an account?Signup Here</a></div>
			</div>
		</div>
	</div>
</div>     
</body>
