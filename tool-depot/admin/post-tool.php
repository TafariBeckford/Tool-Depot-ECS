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
$toolname=$_POST['toolname'];
$brand=$_POST['brandname'];
$tooloverview=$_POST['tooloverview'];
$priceperday=$_POST['priceperday'];
$toolcategory=$_POST['toolcategory'];
$quantity=$_POST['quantity'];
$vimage1=$_FILES["img1"]["name"];
$vimage2=$_FILES["img2"]["name"];
$vimage3=$_FILES["img3"]["name"];
$vimage4=$_FILES["img4"]["name"];

move_uploaded_file($_FILES["img1"]["tmp_name"],"img/tools/".$_FILES["img1"]["name"]);
move_uploaded_file($_FILES["img2"]["tmp_name"],"img/tools/".$_FILES["img2"]["name"]);
move_uploaded_file($_FILES["img3"]["tmp_name"],"img/tools/".$_FILES["img3"]["name"]);
move_uploaded_file($_FILES["img4"]["tmp_name"],"img/tools/".$_FILES["img4"]["name"]);


$sql="INSERT INTO  tools(ToolName,ToolBrand,ToolOverview,PricePerDay,ToolCategory,Quantity,Vimage1,Vimage2,Vimage3,Vimage4) VALUES(:toolname,:brand,:tooloverview,:priceperday,:toolcategory,:quantity,:vimage1,:vimage2,:vimage3,:vimage4)";
$query = $conn->prepare($sql);
$query->bindParam(':toolname',$toolname,PDO::PARAM_STR);
$query->bindParam(':brand',$brand,PDO::PARAM_STR);
$query->bindParam(':tooloverview',$tooloverview,PDO::PARAM_STR);
$query->bindParam(':priceperday',$priceperday,PDO::PARAM_STR);
$query->bindParam(':toolcategory',$toolcategory,PDO::PARAM_STR);
$query->bindParam(':quantity',$quantity,PDO::PARAM_STR);
$query->bindParam(':vimage1',$vimage1,PDO::PARAM_STR);
$query->bindParam(':vimage2',$vimage2,PDO::PARAM_STR);
$query->bindParam(':vimage3',$vimage3,PDO::PARAM_STR);
$query->bindParam(':vimage4',$vimage4,PDO::PARAM_STR);

$query->execute();
$lastInsertId = $conn->lastInsertId();
if($lastInsertId)
{
$msg="Tool Posted Successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

}


	?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	 <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Post Tool</title>
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
                            Post Tool
                        </h2>
                    </div>
                </div> 
                 <!-- /. ROW  -->
              <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tool Info
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

<form method="post"  enctype="multipart/form-data">
<div class="form-group">
<label >Tool Name<span style="color:red">*</span></label>
<div >
<input type="text" name="toolname" class="form-control" required>
</div>&nbsp;&nbsp;
<div class="form-group"><label>Select Brand<span style="color:red">*</span></label>
<div>
<select class="selectpicker" name="brandname" required>
<option value=""> Select </option>
<?php $ret="select BrandName from brands";
$query= $conn -> prepare($ret);
/*$query->bindParam(':id',$id, PDO::PARAM_STR);*/
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
foreach($results as $result)
{
?>
<option value="<?php echo htmlentities($result->BrandName);?>"><?php echo htmlentities($result->BrandName);?></option>
<?php }} ?>

</select></div> &nbsp;

</div> 
</div>
											
<div class="form-group" >
<label >Tool Overview<span style="color:red">*</span></label>
<div>
<textarea class="form-control" name="tooloverview" rows="3" required></textarea>
</div>
</div> &nbsp;

<div class="form-group">
<label>Price Per Day(in JMD)<span style="color:red">*</span></label>
<div>
<input type="text" name="priceperday" class="form-control" required>
</div> &nbsp;

<!--TOOL CATEGORY-->
<div class=form-group><label>Select Tool Category<span style="color:red">*</span></label>
<div >
<select class="selectpicker" name="toolcategory" required>
<option value=""> Select </option>

<option value="Power Tools">Power Tools</option>
<option value="Hand Tools">Hand Tools</option>
<option value="Woodworking Tools">Woodworking Tools</option>
<option value="Welding & Soldering Tools">Welding &amp; Soldering Tools</option>
<option value="Tool Storage">Tool Storage</option>
<option value="Air Compressors & Accessories">Air Compressors &amp; Accessories</option>
</select></div>
</div> &nbsp;



<div class="form-group">
<label>Quantity<span style="color:red">*</span></label>
<div>
<input type="text" name="quantity" class="form-control" required>
</div>

</div>
<div ></div> &nbsp;


<div class="form-group">
<div>
<h4><b>Upload Images</b></h4>
</div>
</div>


<div class="form-group">
<div>
Image 1 <span style="color:red">*</span><input type="file" name="img1" required>
</div>
<div>
Image 2<input type="file" name="img2">
</div>
<div>
Image 3<input type="file" name="img3">
</div>
</div>


<div class="form-group">
<div>
Image 4<input type="file" name="img4">
</div>


</div>
<div></div>	 &nbsp;&nbsp;&nbsp;&nbsp;
                                

								
																								
<div class="form-group">
												<div>
													<button class="btn btn-default" type="reset">Cancel</button>
													<button class="btn btn-primary" name="submit" type="submit">Save changes</button>
												</div>
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
	<script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
</body>
</html>
<?php } ?>