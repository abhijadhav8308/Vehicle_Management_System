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
	$vehicleno=$_POST['vehicleno'];
	$expense=$_POST['expense'];
	$location=$_POST['location'];
	$amount=$_POST['amount'];
	$date=$_POST['date'];
	$sql="INSERT INTO tblexpense(Vehicle_No,Expense_Type,Location,Amount,Date) VALUES(:vehicleno,:expense,:location,:amount,:date)"; 
	$query = $dbh->prepare($sql);
	$query->bindParam(':vehicleno',$vehicleno,PDO::PARAM_STR);
	$query->bindParam(':expense',$expense,PDO::PARAM_STR);
	$query->bindParam(':location',$location,PDO::PARAM_STR);
	$query->bindParam(':amount',$amount,PDO::PARAM_STR);
	$query->bindParam(':date',$date,PDO::PARAM_STR);
	$query->execute();
	$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
	$msg="Database Entry successful";
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
	
	<title>Vehicle Management System | Add Expense</title>

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

select{
	Height:45px;
	margin-bottom:20px;
}

.col-md-7{
	margin-left:20%;
}

.form-horizontal .control-label{
	text-align:center;
	margin-left:20px;
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
					
						<h2 class="page-title" style="text-align:center;">Add Expense</h2>

						<div class="row">
							<div class="col-md-7">
								<div class="panel panel-default">
									<div class="panel-heading">Form fields</div>
									<div class="panel-body">
										<form method="post" name="chngpwd" class="form-horizontal" onSubmit="return valid();">
										
											
  	        	  <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
					<div class="form-group">
						<label class="col-sm-3 control-label">Vehicle No</label>
						<div class="col-sm-8">
						<select class="col-xs-12 col-sm-12 testselect1" name="vehiclenoreg" required>
							<option value=""> Select </option>
							<?php $ret="select id,VehicleNo from tblvehicles";
							$query= $dbh -> prepare($ret);
							$query-> execute();
							$results = $query -> fetchAll(PDO::FETCH_OBJ);
							if($query -> rowCount() > 0)
							{
							foreach($results as $result)
							{
							?>
							<option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->VehicleNo);?></option>
							<?php }} ?>
						</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Expense Type</label>
						<div class="col-sm-8">
							<select name="expense" class="col-xs-12 col-sm-12 testselect1" id="expense_group">
							<option value="" selected="selected">Select an Option</option>
							<option value="Fine">Fine</option>
							<option value="Parking">Parking</option>
							<option value="Toll">Toll</option>
							<option value="Financing">Financing</option> 
							</select>			
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Location</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="location" required>											</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Amount</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="amount" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Date</label>
						<div class="col-sm-8">
							<input type="date" class="form-control" name="date" required>
						</div>
					</div>				
					<div class="form-group">
						<div class="col-sm-8 col-sm-offset-4">
		
							<button class="btn btn-primary" name="submit" type="submit">Submit</button>
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