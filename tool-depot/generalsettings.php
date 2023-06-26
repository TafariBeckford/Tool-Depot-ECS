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
$name=$_POST['fullname'];
$mobileno=$_POST['phoneNumber'];
$dob=$_POST['dob'];
$adress=$_POST['address'];
$city=$_POST['city'];
$country=$_POST['country'];
$email=$_SESSION['alogin'];
$sql="update tblusers set FullName=:name,ContactNo=:mobileno,dob=:dob,Address=:adress,City=:city,Country=:country where EmailId=:email";
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

select {
   
}
input[type=submit] {
  width: 19%;
  background-color: #000000;
  color: white;
  padding: 14px 20px;
  margin: 5px 0;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #808080 ;
}
 
    
    
    
    </style>
    <body>
        <div class="center">
            <h4>General Settings</h4>
            <p id="date"></p>
            
    <form>
        <label for="name">Full Name</label>
        <br>
        <input id="name" type="text" name="fullName" placeholder="" required> 
        <br> <br>
        
        <label for="email">Email Address</label> 
        <br>
        <input id="email" type="email" name="emailaddress" placeholder="" required>
        <br> <br>
        
        <label for="telnumber">Phone Number</label> 
        <br>
        <input id="telnumber" type="tel" name="phoneNumber" placeholder="" required>
        <br> <br>
        
        <label for="dob">Date of Birth</label> 
        <br>
        <input id="dob" type="text" name="dob" placeholder="" required>
        <br>
        
        <h5>ADDRESS</h5>
      <textarea class="form-control" name="address" rows="10" id="comment"></textarea>
        <br>
        <label for="city">City</label> 
        <br>
        <input id="city" type="text" required>
        <br>
        <label>Country</label>
        <br>
        <input type="text" name="country" class="form-control" required>
               
         
        <br>  
        <br>  
        <br>  
        <br> 
         
        <button type="submit" value="SAVE CHANGES"> </button>
    </form>
        </div>
    </body>
</html>