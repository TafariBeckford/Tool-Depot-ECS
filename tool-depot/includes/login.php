<?php
error_reporting(0);

require_once "config.php";

 if(isset($_POST['login']))  
   {   
         
 
      $user_email=$_POST['email'];
      $password=$_POST['password']; 
        
        $stmt = $dbh->prepare("SELECT * FROM users WHERE Email = ?");
        $stmt->execute([$_POST['email']]);
        $user = $stmt->fetch();

        if ($user['Email']==$user_email && $user['Password']==$_POST['password'])
        {
       
           $_SESSION['alogin']=$user['Email'];
		   
	       header('location:index.php');
            
         } 
         else 
         {
             echo "<script>alert('Invalid Details');</script>";
         }
   }

?>

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
		border-color: #FB6E9D;
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
		background: #FB6E9D;
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
		background: #FB6E9D;
		border: none;
		line-height: normal;
	}
	.modal-login .btn:hover, .modal-login .btn:focus {
		background: #fb3c7a;
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
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">
                <div class="avatar"><i class="material-icons">&#xE7FD;</i></div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form  method="post"  >
					<div class="form-group">
						<input type="text" class="form-control" name="email" placeholder="Email" required="required">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="password" placeholder="Password" required="required">
					</div>
					<div class="form-group">
						<input type="submit" name="login" class="btn btn-primary btn-block btn-lg" value="Login">
					</div>
				</form>				
				<div class="hint-text small"><a href="#passModal" data-toggle="modal" data-dismiss="modal">Forgot Your Password?</a></div>
                <div class="hint-text small"><a href="#regModal" data-toggle="modal" data-dismiss="modal">Don't have an account?Signup Here</a></div>
			</div>
		</div>
	</div>
</div>     
</body>
