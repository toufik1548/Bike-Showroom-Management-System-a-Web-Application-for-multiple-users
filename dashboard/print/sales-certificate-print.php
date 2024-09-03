<!DOCTYPE html>
<html>
<head>
	<title>SALES CERTIFICATE</title>
	<link rel="stylesheet" type="text/css" href="../css/print.css">
</head>
<body>
<?php

include("../configs/config.php");
include("../configs/functions.php"); 
include("../configs/router.php"); 

$client_id = $_GET['client_id'];


$sells_id = get_info("sms_sells","sells_id","WHERE client_id=$client_id");


if($sells_id==""){echo "No records found"; exit();}

?>

<?php

//sells records
$qs = mysqli_query($con,"SELECT * FROM sms_sells WHERE sells_id=$sells_id");
$rs = mysqli_fetch_assoc($qs);
$add_date = $rs['add_date'];
$sells_price = $rs['sells_price'];
$sells_price_word = $rs['sells_price_word'];
$bike_id = $rs['bike_id'];

//client records
$qc = mysqli_query($con,"SELECT * FROM sms_clients WHERE client_id=$client_id");
$rc = mysqli_fetch_assoc($qc);
$client_id = $rs['client_id'];
$client_name = $rc['client_name'];
$client_gurdian_name = $rc['client_gurdian_name'];
$client_village = $rc['client_village'];
$client_po = $rc['client_po'];
$client_ps = $rc['client_ps'];
$client_phone = $rc['client_phone'];

$location_id = $rc['location_id'];
$location_name = get_info("sms_locations","location_name","WHERE location_id=".$rc["location_id"]);


//bike records
$qb = mysqli_query($con,"SELECT * FROM sms_bikes WHERE bike_id=$bike_id");
$rb = mysqli_fetch_assoc($qb);

$brand_id = $rb['brand_id'];
$brand_name =  get_info("sms_brands","brand_name","WHERE brand_id=".$rb["brand_id"]);

$model_id = $rb['model_id'];
$model_name =  get_info("sms_models","model_name","WHERE model_id=".$rb["model_id"]);

$bike_chassis_no = $rb['bike_chassis_no'];
$bike_engine_no = $rb['bike_engine_no'];
$bike_color = $rb['bike_color'];
$bike_yom = $rb['bike_yom'];
$bike_cylinder = $rb['bike_cylinder'];
$bike_weight = $rb['bike_weight'];
$bike_cc = $rb['bike_cc'];
$bike_seats = $rb['bike_seats'];
$bike_tyres = $rb['bike_tyres'];

?>

<br><br><br><br><br><br><br><br><br><br><br><br>
<div id="top_space"></div>
<center><h1>SALES CERTIFICATE</h1></center>
<br><br><br>
<p style="float: right; margin-right: 5px;">Date : <?php echo $add_date; ?></p>
<br>
<p>
	To<br>
	The Asstt. Director<br>
	B.R.T.A & Registration Authority<br>
	RAJSHAHI<br><br>

	<b>Sub: Registration Of A New Sold Motor Cycle.</b><br><br>

	Dear Sir,<br><br>

	This is for your kind information that one unit Motorcycle brand <b><?php echo strtoupper($brand_name); ?></b>.
</p>
<br>
<table width="100%" cellpadding="2">
	<tbody>
		<tr>
			<td><b>Engine No.</b></td>
			<td>:</td>
			<td><?php echo $bike_engine_no; ?></td>
		</tr>
		<tr>
			<td><b>Chassis No.</b></td>
			<td>:</td>
			<td><?php echo $bike_chassis_no; ?></td>
		</tr>
		<tr>
			<td><b>Color</b></td>
			<td>:</td>
			<td><?php echo $bike_color; ?></td>
			<td><b>Model</b></td>
			<td>:</td>
			<td><?php echo $model_name; ?></td>
		</tr>
		<tr>
			<td><b>C.C</b></td>
			<td>:</td>
			<td><?php echo $bike_cc; ?></td>
			<td><b>Weight</b></td>
			<td>:</td>
			<td><?php echo $bike_weight; ?></td>
		</tr>
		<tr>
			<td><b>Cylinder Capacity</b></td>
			<td>:</td>
			<td><?php echo $bike_cylinder; ?></td>
			<td><b>Seating Capacity</b></td>
			<td>:</td>
			<td><?php echo $bike_seats; ?></td>
		</tr>
		<tr>
			<td><b>Year of Manufacture</b></td>
			<td>:</td>
			<td><?php echo $bike_yom; ?></td>
			<td><b>Tyre Size</b></td>
			<td>:</td>
			<td><?php echo $bike_tyres; ?></td>
		</tr>
		<tr>
			<td valign="top"><b>Has been sold to</b></td>
			<td valign="top">:</td>
			<td colspan="2">
				<?php echo $client_name; ?> &nbsp;
		    	<b>S/O-</b> <?php echo $client_gurdian_name; ?><br>
		    	<b>Address-</b> <?php echo $client_village; ?><br>
		    	<!--<b>City-</b> <?php //echo $location_name; ?><br>-->
    		</td>
		</tr>
	</tbody>
</table>
<br>
<p>
	So, It is requested that the above Motorcycle may kindly be registration in the Name of the Purchaser.<br><br>

	Thanking you,<br>
	Your Faitfully
</p>
<br><br><br>
<p>
	<b>K.R.Bike Center</b>
</p>
<br><br>

</body>
</html>