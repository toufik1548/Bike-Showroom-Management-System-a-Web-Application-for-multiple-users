<!DOCTYPE html>
<html>
<head>
	<title>SPECIMEN</title>
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
$client_mother_name = $rc['client_mother_name'];
$client_spouse_name = $rc['client_spouse_name'];
$client_village = $rc['client_village'];
$client_po = $rc['client_po'];
$client_ps = $rc['client_ps'];
$client_per_village = $rc['client_per_village'];
$client_per_po = $rc['client_per_po'];
$client_per_ps = $rc['client_per_ps'];
$client_nationality = $rc['client_nationality'];
$client_phone = $rc['client_phone'];
$client_dob = $rc['client_dob'];
if($client_dob=="1900-01-01"){$client_dob="";}else{$client_dob=$client_dob;}
$client_nid = $rc['client_nid'];
$client_etin = $rc['client_etin'];

$client_gurdian_name = $rc['client_gurdian_name'];

$location_id = $rc['location_id'];
$location_name = get_info("sms_locations","location_name","WHERE location_id=".$rc["location_id"]);

$location_per_id = $rc['location_per_id'];
$location_per_name = get_info("sms_locations","location_name","WHERE location_id=".$rc["location_per_id"]);

$gender_id = $rc['gender_id'];
$gender_name = get_info("sms_genders","gender_name","WHERE gender_id=".$rc["gender_id"]);

$client_bank = $rc['client_bank'];
$client_bike_reg_no = $rc['client_bike_reg_no'];

//bike records
$qb = mysqli_query($con,"SELECT * FROM sms_bikes WHERE bike_id=$bike_id");
$rb = mysqli_fetch_assoc($qb);

$brand_id = $rb['brand_id'];
$brand_name =  get_info("sms_brands","brand_name","WHERE brand_id=".$rb["brand_id"]);
$brand_manufcturer = get_info("sms_brands","brand_manufcturer","WHERE brand_id=".$rb["brand_id"]);

$model_id = $rb['model_id'];
$model_name =  get_info("sms_models","model_name","WHERE model_id=".$rb["model_id"]);

$bike_reg_no = $rb['bike_reg_no'];
$bike_chassis_no = $rb['bike_chassis_no'];
$bike_engine_no = $rb['bike_engine_no'];
$bike_color = $rb['bike_color'];
$bike_yom = $rb['bike_yom'];
$bike_weight = $rb['bike_weight'];
$bike_cc = $rb['bike_cc'];


?>

<div id="top_space"></div>

<br><center><h3>&nbsp; OWNER'S PARTICULARS/SPECIMEN SIGNATURE &nbsp;</h3></center>
<table width="100" align="right">
<tr>
	<td align="center">
	Copies<br> Photograph
	</td>
</tr>
</table>
<br><br><br>

<table width="100" height="110" border="1" cellpadding="2" id="table_border" align="right">
<tr>
	<td align="center">
	<img src="smiley.gif" alt="Stamp Size Color Pic">
	</td>
</tr>
</table>

<div id="specimen-text">
<!--<div id="pics">
<img src="smiley.gif" alt="Stamp Size Color Pic">
</div>
-->
<ol>
	<li>NAME: <?php echo strtoupper($client_name); ?></li>
	<li>FATHER/HUSBAND: <?php echo strtoupper($client_gurdian_name); ?></li>
	<li>MOTHER NAME: <?php echo strtoupper($client_mother_name); ?></li>
	<li>SPOUSE NAME: <?php echo strtoupper($client_spouse_name); ?></li>
	<li>PRESENT ADDRESS: <?php echo strtoupper($client_village); ?>, <?php echo strtoupper($location_name); ?></li>
	<li>PERMANENT ADDRESS: <?php echo strtoupper($client_per_village); ?>, <?php echo strtoupper($location_per_name); ?></li>
	<li>SEX: <?php echo strtoupper($gender_name); ?></li>
	<li>PHONE NO: <?php echo strtoupper($client_phone); ?></li>
	<li>NATIONALITY: <?php echo strtoupper($client_nationality); ?></li>
	<li>DATE OF BIRTH: <?php echo strtoupper($client_dob); ?></li>
	<li>NID NO<small>(WITH COPY):</small> <?php echo strtoupper($client_nid); ?></li>
	<li>e-TIN NO:<small>(WITH COPY):</small> <?php echo strtoupper($client_etin); ?></li>
	<li>GURDIAN'S NAME: <?php echo strtoupper($client_gurdian_name); ?> </li>
	<li>VECHILE REGI NO:<?php echo strtoupper($client_bike_reg_no); ?><br><small>(IN CASE OF OWNERSHIP TRANSFER)</small> </li>
	<li>CHASSIS NO: <?php echo strtoupper($bike_chassis_no); ?></li>
	<li>ENGINE NO: <?php echo strtoupper($bike_engine_no); ?></li>
	<li>YEAR OF MFG: <?php echo strtoupper($bike_yom); ?></li>
	<li>PREV. REGN. NO. (IF ANY): </li>
	<li>P.O./BANK: <?php echo strtoupper($client_bank); ?></li>
</ol>

<b>SPECIMEN SIGNATURE</b>
<br>
</div>
<table>
<tr>
	<td>1. &nbsp;</td>
	<td>
		<table border="1" id="table_border">
			<tr>
				<td width="400" height="40"></td>
			</tr>
		</table>
	</td>
	<td width="100">&nbsp;</td>
	<td>2. &nbsp;</td>
	<td>
		<table border="1" id="table_border">
			<tr>
				<td width="400" height="40"></td>
			</tr>
		</table>
	</td>
</tr>
</table>
<br>
<table>
<tr>
	<td>3. &nbsp;</td>
	<td>
		<table border="1" id="table_border">
			<tr>
				<td width="400" height="40"></td>
			</tr>
		</table>
	</td>
	<td width="100">&nbsp;</td>
	<td>4. &nbsp;</td>
	<td>
		<table border="1" id="table_border">
			<tr>
				<td width="400" height="40"></td>
			</tr>
		</table>
	</td>
</tr>
</table>

</body>
</html>