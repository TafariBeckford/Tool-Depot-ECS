<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['send']))
  {
$name=$_POST['fullname'];
$email=$_POST['email'];
$contactno=$_POST['contactno'];
$message=$_POST['message'];
$sql="INSERT INTO  contactusquery(Name,Email,ContactNo,Message) VALUES(:name,:email,:contactno,:message)";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':contactno',$contactno,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Query Sent. We will contact you shortly";
}
else 
{
$error="Something went wrong. Please try again";
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    	<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Tool Depot-Ja Contact Form</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style type="text/css">

    body {
        color: #333;
        background:white;

    }
    .contact-form {
        padding: 50px;
        margin: 30px 0;
    }
    .contact-form h1 {
        color:black;
        font-weight: bold;
        margin: 0 0 15px;
      
    }
    .contact-form .form-control, .contact-form .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .contact-form .form-control:focus {
        border-color: #D10024;
    }
    .contact-form .btn-primary {
        color: #fff;
        min-width: 150px;
        font-size: 16px;
        background: #D10024; 
        border: none;
    }
    .contact-form .btn-primary:hover {
        background: #D10024; 
    }
    .contact-form .btn i {
        margin-right: 5px;
    }
    .contact-form label {
        opacity: 0.7;
    }
    .contact-form textarea {
        resize: vertical;
    }
    .hint-text {
        font-size: 15px;
        padding-bottom: 20px;
        opacity: 0.6;
        color: black;

    }
    #menu{
  display:inline-block;
}
    .st{
        color: black;
    }
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
    pad{
        padding-left: 30px;
    }
</style>
</head>
<body>
 
    <?php include('includes/header.php');?>
    <?php include('includes/navigation.php');?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 m-auto">
            <div class="contact-form">
                  <h1>Contact Info</h1>
                
                 <?php 
$pagetype=$_GET['type'];
$sql = "SELECT Address,Email,ContactNo from contactusinfo";
$query = $dbh -> prepare($sql);
$query->bindParam(':pagetype',$pagetype,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>
              <ul>
                <li><i class="fa fa-map-marker  pull-left icon-border">:<?php echo htmlentities($result->Address); ?></i></li>
                <li><i class="fa fa-phone  pull-left icon-border">:<?php echo htmlentities($result->ContactNo); ?></i></li>
                <li><i class="fa fa-envelope-o  pull-left icon-border">:<?php   echo htmlentities($result->Email); ?></i></li>
            </ul>
                 <?php }} ?>
           <br> <br> <br>
                <b><p class="hint-text">We'd love to hear from you, please drop us a line if you've any query or question.</p></b>
                <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                <form method="post">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="st" for="inputName">Name</label>
                                <input type="text"  name="fullname" class="form-control" id="inputName" required>
                            </div>
                        </div>                
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="st" for="inputEmail">Email</label>
                                <input type="email" name="email" class="form-control" id="inputEmail" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="st" for="inputPhone">Phone</label>
                                <input type="text" class="form-control"  name="contactno" id="inputPhone" required>
                            </div>
                        </div>
                    </div>            
                    <div class="form-group">
                       
                    </div>
                    <div class="form-group">
                        <label class="st" for="inputMessage">Message</label>
                        <textarea class="form-control" id="inputMessage" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit"  name="send" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Send</button>
                </form>
            </div>
        </div>
    </div>
</div>
    
        <script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>

</body>
</html>                            