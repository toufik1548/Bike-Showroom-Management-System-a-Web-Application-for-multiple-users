<!DOCTYPE html>
<html>
<head>
	<title>APPLICATION</title>
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
$client_name = $rc['client_name'];
$client_gurdian_name = $rc['client_gurdian_name'];
$client_village = $rc['client_village'];
$client_po = $rc['client_po'];
$client_ps = $rc['client_ps'];
$client_nationality = $rc['client_nationality'];
$client_phone = $rc['client_phone'];
$client_dob = $rc['client_dob'];
$client_gurdian_name = $rc['client_gurdian_name'];

$location_id = $rc['location_id'];
$location_name = get_info("sms_locations","location_name","WHERE location_id=".$rc["location_id"]);

$gender_id = $rc['gender_id'];
$gender_name = get_info("sms_genders","gender_name","WHERE gender_id=".$rc["gender_id"]);

//bike records
$qb = mysqli_query($con,"SELECT * FROM sms_bikes WHERE bike_id=$bike_id");
$rb = mysqli_fetch_assoc($qb);

$brand_id = $rb['brand_id'];
$brand_name =  get_info("sms_brands","brand_name","WHERE brand_id=".$rb["brand_id"]);
$brand_manufcturer = get_info("sms_brands","brand_manufcturer","WHERE brand_id=".$rb["brand_id"]);

$model_id = $rb['model_id'];
$model_name =  get_info("sms_models","model_name","WHERE model_id=".$rb["model_id"]);

$bike_chassis_no = $rb['bike_chassis_no'];
$bike_engine_no = $rb['bike_engine_no'];
$bike_color = $rb['bike_color'];
$bike_yom = $rb['bike_yom'];
$bike_weight = $rb['bike_weight'];
$bike_cc = $rb['bike_cc'];
$bike_country = $rb['bike_country'];
$bike_cylinder = $rb['bike_cylinder'];
$bike_fuel = $rb['bike_fuel'];
$bike_bhp = $rb['bike_bhp'];
$bike_rpm = $rb['bike_rpm'];
$bike_seats = $rb['bike_seats'];
$bike_wb = $rb['bike_wb'];
$bike_maxload = $rb['bike_maxload'];
$bike_tyres = $rb['bike_tyres'];

?>

<div id="top_space"></div>
<div id="application-text">
<center>
	<h3>FORM OF APPLICATION FOR THE REGISTRATION OF MOTOR VEHICLE</h3>
	<p>To be filled in by the office<br>
		<b>Section-1</b>
	</p>
</center>

<table width="100%">
	<tr>
		<td width="15%">Regn No:</td>
		<td width="15%">&nbsp;</td>
		<td width="15%">Date:</td>
		<td width="15%">&nbsp;</td>
		<td width="25%">Prev. Regn No (If Any):</td>
		<td width="15%">&nbsp;</td>
	</tr>
	<tr>
		<td>Issue No:</td>
		<td>&nbsp;</td>
		<td>Date:</td>
		<td>&nbsp;</td>
		<td>Issue by:</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>Diary No:</td>
		<td>&nbsp;</td>
		<td>Date:</td>
		<td>&nbsp;</td>
		<td>Received by:</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>Customer ID:</td>
		<td>&nbsp;</td>
		<td>District:</td>
		<td>&nbsp;</td>
		<td>Vehicle ID:</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>Veh. Description:</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>Call non date:</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>Refusal date:</td>
		<td>&nbsp;</td>
		<td>Refusal Code:</td>
		<td>&nbsp;</td>
		<td>Refused by:</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>P.O/Bank:</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>Index:</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>Remarks (if any):</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>Index No:</td>
		<td>&nbsp;</td>
	</tr>

</table>

<p align="center">
	To be filled in by the owner<br>
	<b>Section II</b><br>
	(Owner information)
</p>

<table width="100%">
	<tr>
		<td width="50%">1. Name of owner: <?php echo strtoupper($client_name); ?></td>
		<td>2. Date of birth: <?php echo strtoupper($client_dob); ?></td>
	</tr>
	<tr>
		<td>3. Father/Husband: <?php echo strtoupper($client_gurdian_name); ?></td>
		<td>4. Nationality: <?php echo strtoupper($client_nationality); ?></td>
	</tr>
	<tr>
		<td>5. Sex: <?php echo strtoupper($gender_name); ?></td>
		<td>6. Guardian's name: </td>
	</tr>
	<tr>
		<td colspan="2">7. Owner's Address (One only): <?php echo strtoupper($client_village); ?><!--, <?php //echo strtoupper($location_name); ?>--></td>
	</tr>
	<tr>
		<td>8. Phone No. (if any): <?php echo strtoupper($client_phone); ?></td>
		<td>9. PO/Bank:</td>
	</tr>
	<tr>
		<td>10. Joint owner:</td>
		<td>11. Owner type:</td>
	</tr>
	<tr>
		<td>12. Hire:</td>
		<td>13. Hire purchase:</td>
	</tr>
</table>

	<p align="center">
		To be filled in by the owner<br>
		<b>Section III</b><br>
		(Owner information)
	</p>

<table width="100%">
	<tr>
		<td width="50%">14. Vehicle or trailer: MOTOR CYCLE</td>
		<td>15. Prev. Reg. No. (if any): N/A</td>
	</tr>
	<tr>
		<td>14a. Class of vehicle: MOTOR CYCLE</td>
		<td>15a. Maker's name: <span style="font-size: 10px !important;"><?php echo strtoupper($brand_manufcturer); ?></span></td>
	</tr>
	<tr>
		<td>16. Type of body: MOTOR CYCLE</td>
		<td>17. Maker's Country: <?php echo strtoupper($bike_country); ?></td>
	</tr>
	<tr>
		<td>18. Color (cabin/body): <?php echo strtoupper($bike_color); ?></td>
		<td>19. Year of manufacture: <?php echo strtoupper($bike_yom); ?></td>
	</tr>
	<tr>
		<td>20. Number of cylinders: <?php echo strtoupper($bike_cylinder); ?></td>
		<td>21. Chassis number: <strong><?php echo strtoupper($bike_chassis_no); ?></strong></td>
	</tr>
	<tr>
		<td>22. Engine number: <strong><?php echo strtoupper($bike_engine_no); ?></strong></td>
		<td>23. Fuel used: <?php echo strtoupper($bike_fuel); ?></td>
	</tr>
	<tr>
		<td>24. Horse power: <?php echo strtoupper($bike_bhp); ?></td>
		<td>25. RPM: <?php echo strtoupper($bike_rpm); ?></td>
	</tr>
	<tr>
		<td>26. Cubic capacity: </td>
		<td>27. Seats (incl. driver): <?php echo strtoupper($bike_seats); ?></td>
	</tr>
	<tr>
		<td>28. No. of Standee: <?php echo strtoupper($bike_cc); ?></td>
		<td>29. Wheel base: <?php echo strtoupper($bike_wb); ?></td>
	</tr>
	<tr>
		<td>30. Unladen weight (kg): <?php echo strtoupper($bike_weight); ?></td>
		<td>31. Maximum laden/train weight (kg): <?php echo strtoupper($bike_maxload); ?></td>
	</tr>
</table>

	<p align="center">
		<b>Section IV</b><br>
		(Additional information for transport vehicle)
	</p>

<table width="100%">
	<tr>
		<td width="50%">32. No of types: 2 (TWO)</td>
		<td>33. Tyres size: <?php echo strtoupper($bike_tyres); ?></td>
	</tr>
	<tr>
		<td>34. No. of axle: 2 (TWO)</td>
		<td>35. Maximum axle weight (kg): </td>
	</tr>
	<tr>
		<td rowspan="3">&nbsp;</td>
		<td>a) Front axle (1) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (2)<br>
		b) Central axle (1) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (2) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (3)<br>
		b) Rear axle (1) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (2) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (3)
		</td>
	</tr>
</table>

<table width="100%">
	<tr>
		<td colspan="3">36. Dimensions (mm): </td>
	</tr>
	<tr>
		<td>a) Overall lenght: </td>
		<td>b) Overall width: </td>
		<td>c) Overall height: </td>
	</tr>
	<tr>
		<td colspan="3">37. Overhangs (%): </td>
	</tr>
	<tr>
		<td>a) Front: </td>
		<td>b) Rear: </td>
		<td>c) Other: </td>
	</tr>
	<tr>
		<td colspan="3">38. A copy of the drawing showing the vehicle dimension specifications of the body and of the seating<br>
		Arrangements approved by ............................................ on ........................................... is attached herewith.
		</td>
	</tr>
</table>
<br><br>

</div>
</body>
</html>