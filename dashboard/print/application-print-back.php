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

<p align="center">
<b>Section V</b>
</p>
<table width="100%">
	<tr>
		<td colspan="4">
		39. Hire purchase/hypothecation information:<br>
		The vehicle is subject to hire purchase/hypothecation with:
		</td>
	</tr>
	<tr>
		<td>a) Name:</td>
		<td width="30%">&nbsp;</td>
		<td>b) Date:</td>
		<td width="25%">&nbsp;</td>
	</tr>
	<tr>
		<td>Address:</td>
		<td colspan="3"></td>
	</tr>
</table>

<table width="100%">
	<tr>
		<td colspan="6">
		40. Insurance information:
		</td>
	</tr>
	<tr>
		<td>a) Policy no:</td>
		<td>&nbsp;</td>
		<td>b) Type of policy:</td>
		<td>&nbsp;</td>
		<td>c) Insurer's name & address:</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
	<td>d) Date of expiry</td>
	</tr>
</table>
<table width="100%">
	<tr>
		<td colspan="4">41. Joint owner information:</td>
	</tr>
	<tr>
		<td>a) Name:</td>
		<td>&nbsp;</td>
		<td>b) Name:</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>Father/Husband:</td>
		<td>&nbsp;</td>
		<td>Father/Husband:</td>
		<td>&nbsp;</td>
	</tr>
</table>

<p align="center">
<b>Section VI</b><br>
(Declaration, Certificates and documents)
</p>

<table width="100%">
	<tr>
		<td>Declaration by owner:</td>
	</tr>
	<tr>
		<td>&nbsp;&nbsp; a) I the undersigned do hereby declare that to the best of my knowledge and belief, the information given and the documents enclosed (as per list attached) are true. I also declare that in case the papers/documents and information furnished is found to be incorrect at any later stage, I shall be liable for legal action. </td>
	</tr>
</table>
<br>
<table width="100%">
	<tr>
		<td>Date:</td>
		<td width="60%">&nbsp;</td>
		<td align="center">Signature of owner</td>
	</tr>
</table>
<br>
Encl: List of documents<br>
43. Registered dealer's certificate:<br><br>
&nbsp;&nbsp;&nbsp;&nbsp; I the undeersigned do hereby certify that the vehicle in question has been sold by me/my firm and the ownership documents attached with the application for registration are true. The information/specifications pertaining to the vehicle are correct and the vehicle complies with all the requirements of the registration.
<br><br>
<table width="100%">
	<tr>
		<td>Date:</td>
		<td width="60%">&nbsp;</td>
		<td align="center">Signature of owner registered Dealer Seal</td>
	</tr>
</table>
<br>
Encl: List of documents<br>
44. Certificate by the Inspector of Motor Vehicles:<br><br>
Certificate that the particulars pertaining to the owner and the vehicle (Chassis No. <strong><?php echo strtoupper($bike_chassis_no); ?>.</strong> Engine No. <strong><?php echo strtoupper($bike_engine_no); ?>.</strong> given in the application match with the ownership documents attached to this application. It is future certified that the vehicle complies with the registration requirements specified in the MV Act and the Rules and/or Regulations made thereunder and the vehicle is not mechanically defective. The necessary documents/papers are available as per list enclosed.
<br><br><br>
<table width="100%">
	<tr>
		<td>Date:</td>
		<td width="60%">&nbsp;</td>
		<td align="center">Signature of Inspector of Motor Vehicles Official Seal</td>
	</tr>
</table>
<br>
Encl: List of documents<br>
<br>
45. Registration Status:<br><br>
<table width="100%">
	<tr>
		<td>Registration allowed/not allowed</td>
		<td width="40%">&nbsp;</td>
		<td align="center">Signature of Inspector of Motor Vehicles Official Seal</td>
	</tr>
</table>
<br>
46. Fees and Tax Accounts:<br>
Necessary fees and taxes amounting to taka ..........................................................................................................
has been paid to PO/Bank ......................................................................................................
vide vouchers and receipts enclosed.
<br><br><br>
<table width="100%">
	<tr>
		<td>Signature of owner <br> of his representive</td>
		<td width="40%">&nbsp;</td>
		<td align="center">Signature of dealing assistant</td>
	</tr>
</table>
<center>Counter signature by the registering authority.</center>

</div>
</body>
</html>