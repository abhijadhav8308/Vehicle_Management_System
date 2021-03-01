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
$vehicleno=$_POST['vehicleno'];
$rate=$_POST['rate'];
$fueltype=$_POST['fueltype'];
$average=$_POST['average'];
$totfuel=$_POST['totfuel'];

$sql="INSERT INTO tblfuel(date,vehicle_no,rate,fuel_type,total_amount_of_fuel,average_of_vehicle) VALUES(:date,:vehicleno,:rate,:fueltype,:totfuel,:average)";
$query = $dbh->prepare($sql);
$query->bindParam(':date',$date,PDO::PARAM_STR);
$query->bindParam(':vehicleno',$vehicleno,PDO::PARAM_STR);
$query->bindParam(':rate',$rate,PDO::PARAM_STR);
$query->bindParam(':fueltype',$fueltype,PDO::PARAM_STR);
$query->bindParam(':average',$average,PDO::PARAM_STR);
$query->bindParam(':totfuel',$totfuel,PDO::PARAM_STR);

$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
	$msg="Fuel details posted successfully";
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
						<h2 class="page-title">Fuel History</h2>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Fuel info</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
									<div class="panel-body">
										<form method="post" class="form-horizontal" enctype="multipart/form-data">
											<div class="form-group">
												<div class="row">
													<label class="col-sm-2 control-label">Date<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="date" name="date" class="form-control" required>
													</div>
													<label class="col-sm-2 control-label">Vehicle No<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<select class="selectpicker" name="vehicleno" required>
															<option value=""> Select </option>
															<?php
																$ret="select id,VehicleNo from tblvehicles";
																$query= $dbh -> prepare($ret);
																//$query->bindParam(':id',$id, PDO::PARAM_STR);
																$query-> execute();
																$results = $query -> fetchAll(PDO::FETCH_OBJ);
																if($query -> rowCount() > 0)
																{
																	foreach($results as $result)
																	{?>
																		<option value="<?php
																			echo htmlentities($result->id);?>">
																		<?php
																			echo htmlentities($result->VehicleNo);
																		?></option><?php
																	}
																}?>
														</select>
													</div>
												</div>
											</div>
											<div class=row>
											<div class="form-group">
											<label class="col-sm-2 control-label">Rate/L<span style="color:red">*</span></label>
											<div class="col-sm-4">
												<input type="text" name="rate" class="form-control" required>
											</div>

											<label class="col-sm-2 control-label">Fuel type<span style="color:red">*</span></label>
											<div class="col-sm-4">
												<select class="selectpicker" name="fueltype" required>
												<option value=""> Select </option>
												<option value="Petrol">Petrol</option>
												<option value="Diesel">diesel oil</option>
												<option value="CNG">CNG</option>
												<option value="CNG">LPG</option>
												<option value="CNG">Other expences</option>
												</select>
											</div>	
											</div>
											</div>
											<div class=row>
										</div>
										<div class="row">
										<div class="form-group">
											<label class="col-sm-2 control-label">Average of vehicle<span style="color:red">*</span></label>
											<div class="col-sm-4">
												<input type="text" name="average" class="form-control" required>
											</div>
			
											<div class="form-group">
												<label class="col-sm-2 control-label">Total Fuel<span style="color:red">*</span></label>
												<div class="col-sm-4">
													<input type="number" name="totfuel" class="form-control" style="width:300px" required>
												</div>
											</div>					
										</div>
										<div class="form-group">
											<div class="col-sm-12">
											</div>
										</div>

										<div class="row">
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