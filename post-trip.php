<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 

if(isset($_POST['submit']))
{
	$date=$_POST['date'];
	$cusname=$_POST['cusname'];
	$cusmobno=$_POST['cusmobno'];
	$cusemail=$_POST['cusemail'];
	$cusgender=$_POST['gender'];
	$cusadd=$_POST['cusadd'];
	$souplace=$_POST['souplace'];
	$desplace=$_POST['desplace'];
	$distance=$_POST['distance'];
	$amoperkm=$_POST['amoperkm'];
	$staychar=$_POST['staychar'];
	$noofday=$_POST['noofday'];
	$noofnight=$_POST['noofnight'];
	$drivername=$_POST['drivername'];
	$totamount = ($amoperkm * $distance) + $staychar;

	$sql="INSERT INTO tbltour(Date,CusName,CusMobNo,CusEmail,CusGender,CusAdd,SouPlace,desPlace,Distance,Amoperkm,StayChar,NoOfDay,NoOfNight,DriverName,TotalAmount) VALUES(:date,:cusname,:cusmobno,:cusemail,:gender,:cusadd,:souplace,:desplace,:distance,:amoperkm,:staychar,:noofday,:noofnight,:drivername,:totamount)";
	$query = $dbh->prepare($sql);

	$query->bindParam(':date',$date,PDO::PARAM_STR);
	$query->bindParam(':cusname',$cusname,PDO::PARAM_STR);
	$query->bindParam(':cusmobno',$cusmobno,PDO::PARAM_STR);
	$query->bindParam(':cusemail',$cusemail,PDO::PARAM_STR);
	$query->bindParam(':gender',$cusgender,PDO::PARAM_STR);
	$query->bindParam(':cusadd',$cusadd,PDO::PARAM_STR);
	$query->bindParam(':souplace',$souplace,PDO::PARAM_STR);
	$query->bindParam(':desplace',$desplace,PDO::PARAM_STR);
	$query->bindParam(':distance',$distance,PDO::PARAM_STR);
	$query->bindParam(':amoperkm',$amoperkm,PDO::PARAM_STR);
	$query->bindParam(':staychar',$staychar,PDO::PARAM_STR);
	$query->bindParam(':noofday',$noofday,PDO::PARAM_STR);
	$query->bindParam(':noofnight',$noofnight,PDO::PARAM_STR);
	$query->bindParam(':drivername',$drivername,PDO::PARAM_STR);
	$query->bindParam(':totamount',$totamount,PDO::PARAM_STR);
	$query->execute();

	$lastInsertId = $dbh->lastInsertId();
	if($lastInsertId)
	{
		$msg="Trip posted successfully";
	}
	else 
	{
		$error="Something went wrong. Please try again";
	}
	}
?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Car Rental Portal | Admin Post Trip</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
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
.selectpicker{
	overflow:
}
</style>
</head>
<body>
	
<?php include('includes/header.php');?>
<div class="ts-main-content">
<?php include('includes/leftbar.php');?>
<div class="content-wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<h2 class="page-title">Post A Trip</h2>
<div class="row">
<div class="col-md-12">
								
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>			

<form method="post" class="form-horizontal" enctype="multipart/form-data">							
<div class="form-group">							

<label class="col-sm-2 control-label">Date<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="date" name="date" class="form-control" required>
</div>		
</div><br>
			
<br><div class="panel panel-default" style=" overflow: auto;">
<div class="panel-heading">Customer Info</div>
<div class="panel-body">

<div class="form-group">
<label class="col-sm-2 control-label">Name<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="cusname" class="form-control" required>
</div>

<label class="col-sm-2 control-label">Mobile No.<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" maxlength="10" name="cusmobno" class="form-control" required>
</div>

<label class="col-sm-2 control-label">E-mail</label>
<div class="col-sm-4">
<input type="text" name="cusemail" class="form-control">
</div>

<label class="col-sm-2 control-label">Address<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="cusadd" class="form-control" required>
</div> 

<label class="col-sm-2 control-label">Gender<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="gender" required>
<option value=""> Select </option>
<option value="male">Male</option>
<option value="female">Female</option>
</select>
</div>
               
</div>										
</div>
</div>






<div class="panel panel-default" style=" overflow: auto;">
<div class="panel-heading">Trip Info</div>
<div class="panel-body">
<div class="form-group">

<label class="col-sm-2 control-label">Source Place<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="souplace" class="form-control" required>
</div>

<label class="col-sm-2 control-label">Destination Place<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="desplace" class="form-control" required>
</div>

<label class="col-sm-2 control-label">Distance(in km)<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="distance" class="form-control" required>
</div>

<label class="col-sm-2 control-label">Days<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="number" name="noofday" class="form-control">
</div>

<label class="col-sm-2 control-label">Nights<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="number" name="noofnight" class="form-control">
</div>

</div>
</div>
</div>






<div class="panel panel-default" style=" overflow: auto;">
									<div class="panel-heading">Vehicle Info</div>


<div class="panel-body">
<div class="form-group">
<label class="col-sm-2 control-label">Driver Name<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="drivername" required>
	<option value=""> Select </option>
	<?php
		$ret="select id,DriverName from tbldriver";
		$query= $dbh -> prepare($ret);
		$query-> execute();
		$results = $query -> fetchAll(PDO::FETCH_OBJ);
		if($query -> rowCount() > 0)
		{
			foreach($results as $result)
			{?>
				<option value="<?php
					echo htmlentities($result->id);?>">
				<?php
					echo htmlentities($result->DriverName);
				?></option><?php
			}
		}?>
</select>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="panel panel-default" style=" overflow: auto;">
<div class="panel-heading">Payment Info</div>
<div class="panel-body">
<div class="form-group">
<label class="col-sm-2 control-label">Amount (per km)<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="amoperkm" class="form-control" required>
</div>

<label class="col-sm-2 control-label">Stay Charge<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="staychar" class="form-control" required>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
			<div class="form-group">
					<div class="col-sm-8 col-sm-offset-2">
						<button class="btn btn-default" type="reset">Cancel</button>
						<button class="btn btn-primary" name="submit" type="submit">Save</button>
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
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	<script src="js/lang.js"></script>
</body>
</html>
<?php } ?>