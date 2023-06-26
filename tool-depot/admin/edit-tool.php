<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['username'])==0)
	{	
header('location:index.php');
}
else{ 

if(isset($_POST['submit']))
  {
$name=$_POST['toolname'];
$brandname=$_POST['brand'];
$overview=$_POST['tooloverview'];
$price=$_POST['priceperday'];
$category=$_POST['toolcategory'];
$toolquantity=$_POST['quantity'];
$vimage1=$_POST['img1'];
$vimage2=$_POST['img2'];
$vimage3=$_POST['img3'];
$vimage4=$_POST['img4'];

$id=intval($_GET['id']);

$sql="update tools set Toolname=:toolname,ToolBrand=:brand,ToolOverview=:tooloverview,PricePerDay=:priceperday,ToolCategory=:toolcategory,Quantity=:quantity,Vimage1=:vimage1,Vimage2=:vimage2,Vimage3=:vimage3,Vimage4=:vimage4 where id=:id ";
$query = $conn->prepare($sql);
$query->bindParam(':toolname',$name,PDO::PARAM_STR);
$query->bindParam(':brand',$brandname,PDO::PARAM_STR);
$query->bindParam(':tooloverview',$overview,PDO::PARAM_STR);
$query->bindParam(':priceperday',$price,PDO::PARAM_STR);
$query->bindParam(':toolcategory',$category,PDO::PARAM_STR);
$query->bindParam(':quantity',$toolquantity,PDO::PARAM_STR);
$query->bindParam(':vimage1',$vimage1,PDO::PARAM_STR);
$query->bindParam(':vimage2',$vimage2,PDO::PARAM_STR);
$query->bindParam(':vimage3',$vimage3,PDO::PARAM_STR);
$query->bindParam(':vimage4',$vimage4,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();

$msg="Data updated successfully";


}


	?>
<!doctype html>
<html lang="en" class="no-js">

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Brands</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- Morris Chart Styles-->
   
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            Edit Brand
                        </h2>
                    </div>
                </div> 
                 <!-- /. ROW  -->
              <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Brand Name:
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                
<?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from tools where tools.id=:id";
$query = $conn -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>

<form method="post" enctype="multipart/form-data">
<div class="form-group">
<label>Tool Name:<span style="color:red">*</span></label>
<div >
<input type="text" name="toolname" class="form-control" value="<?php echo htmlentities($result->ToolName)?>" required>
</div><br>
    
        
<label >Select Brand <span style="color:red">*</span></label>
<div >
<select class="selectpicker" name="brand" required>
<option value="<?php echo htmlentities($results->ToolBrand);?>"> <?php echo htmlentities($result->ToolBrand);?> </option>

<option value="">Select</option>
<option value="DeWalt">DeWalt</option>
<option value="Bosch">Bosch</option>
<option value="Dremel">Dremel</option>
<option value="Ridgid">Ridgid</option>
<option value="Makita">Makita</option>
<option value="Ryobi">Ryobi</option>
</select>
</div>
    
    
    
    
    
</div><br>
    

    

    
    
    

<div class="form-group">
    
<label>Tool Overview<span style="color:red">*</span></label>
<div>
<input type="text" name="tooloverview" class="form-control" value="<?php echo htmlentities($result->ToolOverview)?>" required>
</div><br>
    
    
    
<label>Price (in JMD)<span style="color:red">*</span></label>
<div>
<input type="text" name="priceperday" class="form-control" value="<?php echo htmlentities($result->PricePerDay);?>" required>
</div>
          
</div><br>
    

<div class="form-group">
    
<label>Tool Category<span style="color:red">*</span></label>
<div >
<input type="text" name="toolcategory" class="form-control" value="<?php echo htmlentities($result->ToolCategory);?>" required>
</div><br> 
    
    
<label>Quantity<span style="color:red">*</span></label>
<div>
<input type="text" name="quantity" class="form-control" value="<?php echo htmlentities($result->Quantity)?>" required>
</div><br>
     
    
    
</div>
    
    



							
<div class="form-group">
<div>
<h4><b>Tool Images</b></h4>
</div>
</div>

        
   <div class="form-group">
<div>
Image<br><img src="img/tools/<?php echo htmlentities($result->Vimage1);?>" width="auto" height="auto" style="border:solid 1px #000"><br>
<a href="changeimage1.php?imgid=<?php echo htmlentities($result->id)?>">Change Image 1</a>
</div><br>
<div>
Image 1<br> <img src="img/tools/<?php echo htmlentities($result->Vimage2);?>" width="300" height="auto" style="border:solid 1px #000"><br>
<a href="changeimage2.php?imgid=<?php echo htmlentities($result->id)?>">Change Image 2</a>
</div>
<div><br>
Image 2<br><img src="img/tools/<?php echo htmlentities($result->Vimage3);?>" width="300" height="auto" style="border:solid 1px #000"><br>
<a href="changeimage3.php?imgid=<?php echo htmlentities($result->id)?>">Change Image 3</a>
</div>
<div><br>
Image 3<br><img src="img/tools/<?php echo htmlentities($result->Vimage4);?>" width="300" height="auto" style="border:solid 1px #000"><br>
<a href="changeimage4.php?imgid=<?php echo htmlentities($result->id)?>">Change Image 4</a>
</div>
</div>


<?php }} ?>


											<div class="form-group">
												<div >
													
													<button class="btn btn-primary" name="submit" type="submit" style="margin-top:4%">Save changes</button>
												</div>
											</div>

										</form>
									</div>
                                </div>
                            </div>
                        </div>
				</div>
						</div>
				

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php } ?>