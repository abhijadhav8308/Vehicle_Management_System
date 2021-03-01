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
$vehiclename=$_POST['vehiclename'];
$type=$_POST['type'];
$vehicleno=$_POST['vehicleno'];
$fueltype=$_POST['fueltype'];
$regdate=$_POST['regdate'];
$seatingcapacity=$_POST['seatingcapacity'];



$sql="INSERT INTO tblvehicles(VehicleName,VehicleType,VehicleNo,FuelType,RegDate,SeatingCap) VALUES(:vehiclename,:type,:vehicleno,:fueltype,:regdate,:seatingcapacity)";
$query = $dbh->prepare($sql);
$query->bindParam(':vehiclename',$vehiclename,PDO::PARAM_STR);
$query->bindParam(':type',$type,PDO::PARAM_STR);
$query->bindParam(':vehicleno',$vehicleno,PDO::PARAM_STR);
$query->bindParam(':fueltype',$fueltype,PDO::PARAM_STR);
$query->bindParam(':regdate',$regdate,PDO::PARAM_STR);
$query->bindParam(':seatingcapacity',$seatingcapacity,PDO::PARAM_STR);

$query->execute();

$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Vehicle posted successfully";
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
	
	<title>Car Rental Portal | Admin Post Vehicle</title>

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
					
						<h2 class="page-title">Post A Vehicle</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default" style=" overflow: auto;">
									<div class="panel-heading">Basic Info</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label">Vehicle Name<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="vehiclename" class="form-control" required>
</div>
<label class="col-sm-2 control-label">Select Type<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="type" onchange="selectedValue(this)" id="ctype" style="overflow-y: scroll" size="5" required>
<option value=""> Select </option>
<option value="Convertible">Convertible (seat:4)</option>
<option value="Crossover">Crossover (seat:7)</option>
<option value="Hatchback">Hatchback (seat:5)</option>
<option value="Luxury">Luxury (seat:4)</option>
<option value="Minivan">Minivan (seat:7)</option> 
<option value="Sedan">Sedan (seat:5)</option>
<option value="SUV">SUV (seat:7)</option>
<option value="estate">estate (seat:10)</option>
<option value="Minibus1">Minibus (seat:15)</option>
<option value="Minibus2">Minibus (seat:18)</option>
<option value="Minibus3">Minibus (seat:21)</option>
<option value="Minibus4">Minibus (seat:25)</option>
</select>
<script type="text/javascript" language="javascript">
function selectedValue(sel){
	var value=sel.value;
	//confirm(value);
	switch(value) {
		case 'Convertible':
			 //alert('option 1 selected');
			 document.getElementById('sc').value=4;
			 break;
		case 'Crossover':
			 //alert('option 1 selected');
			 document.getElementById('sc').value=7;
			 break;
		case 'Hatchback':
			 //alert('option 1 selected');
			 document.getElementById('sc').value=5;
			 break;
		case 'Luxury':
			 //alert('option 1 selected');
			 document.getElementById('sc').value=4;
			 break;
		case 'Minivan':
			 //alert('option 1 selected');
			 document.getElementById('sc').value=7;
			 break;
		case 'Sedan':
			 //alert('option 1 selected');
			 document.getElementById('sc').value=5;
			 break;
		case 'SUV':
			 //alert('option 1 selected');
			 document.getElementById('sc').value=7;
			 break;
		case 'estate':
			 //alert('option 1 selected');
			 document.getElementById('sc').value=10;
			 break;
		case 'Minibus1':
			 //alert('option 1 selected');
			 document.getElementById('sc').value=15;
			 break;
		case 'Minibus2':
			 //alert('option 1 selected');
			 document.getElementById('sc').value=18;
			 break;
		case 'Minibus3':
			 //alert('option 1 selected');
			 document.getElementById('sc').value=21;
			 break;
		case 'Minibus4':
			 //alert('option 1 selected');
			 document.getElementById('sc').value=25;
			 break;
	}
	
}
</script>
</div>
</div>
											

<div class="form-group">
<label class="col-sm-2 control-label">Vehicle No.<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="vehicleno" class="form-control" required>
</div>
<label class="col-sm-2 control-label">Select Fuel Type<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="fueltype" required>
<option value=""> Select </option>
<option value="Petrol">Petrol</option>
<option value="Diesel">Diesel</option>
<option value="CNG">CNG</option>
</select>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Reg. Date<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="date" name="regdate" class="form-control" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Seating Capacity<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="number" name="seatingcapacity" class="form-control" id="sc" required readonly>
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
													<button class="btn btn-primary" name="submit" type="submit">Save changes</button>
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