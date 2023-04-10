<?php
if(isset($_POST['update']))
  {
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$newpassword=$_POST['newpassword'];
  $sql ="SELECT Email FROM users WHERE Email=:email and ContactNo=:mobile";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update users set Password=:newpassword where Email=:email and ContactNo=:mobile";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
$chngpwd1-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
echo "<script>alert('Your Password succesfully changed');</script>";
}
else {
echo "<script>alert('Email id or Mobile no is invalid');</script>"; 
}
}

?>
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
		border-color:#D10024;
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
<div id="passModal" class="modal fade">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">
                <div class="avatar"><i class="material-icons">&#xE7FD;</i></div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form name="chngpwd" method="post" onSubmit="return valid();">
                    
                    <div class="form-group">
						<input type="text" class="form-control" placeholder="Email" name="email" required="required">
					</div>
                    <div class="form-group">
						<input type="text" class="form-control" placeholder="Phone Number" name="mobile" required="required">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="New Password"  name="newpassword" required="required">
					</div>
                    <div class="form-group">
						<input type="password" class="form-control" placeholder="Confirm Password" name="confirmpassword" required="required">
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary btn-block btn-lg" name="update" value="Login">
					</div>
				</form>				
				<div class="hint-text small"><a href="myModal" data-toggle="modal" data-dismiss="modal">Back to Login?</a></div>
              
			</div>
		</div>
	</div>
</div>     
</body>
