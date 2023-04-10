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
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">
</head>
<style>
   body {
    background:white;
     min-height: inherit;
    font-family
}


.center {
  padding: 70px 0;
  border: 3px solid #;
  text-align: center;
}

div{
     border-radius: 25px;
     padding: 20px; 
     background-color:
     max-width: 700px;
     max-height: 650px;
     margin: auto;
}

h4 {
    font-size:;
}

h5 {
    font-size: 15px;
    font-weight: bold;
}

form label {font-weight:bold;}

#testimonialtextbox {
  
    height: 300px;
    width: 400px;
}

input[type=text]{
   height: 30px;
    width: 30%;
}

input[type=email]{
  height: 30px;
    width: 30%;
}

input[type=tel]{
    height: 30px;
    width: 30%;
}

input[type=date]{
    height: 30px;
    width: 30%;
}


}
button{
  width: 19%;
  background-color: #D10024;
  color: white;
  padding: 14px 20px;
  margin: 5px 0;
  border: none;
  border-radius: 5px;
  cursor:pointer;
}

input[type=submit]:hover {
  background-color: #808080 ;
}
    
    </style>

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
        <div class="center">
            <h4>General Settings</h4>
            <p id="date"></p>
    <?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>    
    <form method="post">
           <div class="form-group">
        <label class="control-label">Reg Date-</label>
             <?php echo htmlentities($result->RegDate);?>
            </div>
          <div class="form-group">
         <?php if($result->UpdationDate!=""){?>
              <label class="control-label">Last Update at  -</label>
             <?php echo htmlentities($result->UpdationDate);?>
            </div>
            <?php } ?>
        
        <label for="name">Full Name</label>
        <br>
        <input id="name" type="text" name="fullName" placeholder="" value="<?php echo htmlentities($result->Name);?>" required> 
        <br> <br>
        
        <label for="email">Email Address</label> 
        <br>
        <input id="email" type="email" name="emailaddress" placeholder=""  value="<?php echo htmlentities($result->Email);?>" required>
        <br> <br>
        
        <label for="telnumber">Phone Number</label> 
        <br>
        <input id="telnumber" type="tel" name="phoneNumber" placeholder="" value="<?php echo htmlentities($result->ContactNo);?>" required>
        <br> <br>
        
        <label for="dob">Date of Birth</label> 
        <br>
        <input id="dob" type="text" name="dob" placeholder="" value="<?php echo htmlentities($result->dob);?>" >
        <br>
        
        <h5>ADDRESS</h5>
      <textarea class="form-control" name="address" rows="10" cols="55" id="comment"><?php echo htmlentities($result->Address);?></textarea>
        <br>
        <label for="city">City</label> 
        <br>
        <input id="city"  name="city" type="text"  value="<?php echo htmlentities($result->city);?>">
        <br>
        <label>Country</label>
        <br>
        <input type="text" name="country" class="form-control" value="<?php echo htmlentities($result->country);?>">
               
         
        <br>  
        <br>  
        <br>  
        <br> 
         
        <button type="submit" name="updateprofile" value="SAVE CHANGES">Update</button>
        <?php }} ?>
    </form>
        </div>
    </body>
</html>
<?php } ?>