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

<div id="top_space"></div>
<div id="text-spacing">
<br><br><br>
<center><h3>প্রত্যয়ন পত্র। </h3></center>
<br>
বরাবর<br>

রেজিস্ট্রেশন কর্তৃপক্ষ<br><br>
<table width="100%">
	<tr>
		<td width="20%">বিষয়: <strong>চেসিস নম্বর -</strong></td>
		<td width="30%"><?php echo $bike_chassis_no; ?></td>
		<td width="13%"><strong>ইঞ্জিন নম্বর -</strong></td>
		<td width="37%"><?php echo $bike_engine_no; ?></td>
	</tr>
</table>

<table width="100%">
	<tr>
	<td width="15%"><strong>মডেল ও সিসি -</strong></td>
	<td><?php echo $model_name; ?>, <?php echo $bike_cc; ?>&nbsp; সম্বলিত মোটরসাইকেল রেজিস্ট্রেশন করণ প্রসঙ্গে !</td>
	
	</tr>
</table>
<br>

উপযুক্ত বিষয়ের প্রেক্ষিতে আপনার সদয় অবগতির জন্য জানানো যাচ্ছে যে, বিষয়ে উল্লেখিত চেসিস ও ইঞ্জিন নম্বর সম্বলিত মোটর সাইকেলটি 
<strong>জনাব - </strong> <?php echo $client_name; ?> 
<strong>পিতা -</strong> <?php echo $client_gurdian_name; ?> 
<strong>ঠিকানা -</strong> <?php echo $client_village; ?>
<!--<table width="100%">
<tr>
	<td width="7%"><strong>পিতা -</strong></td>
	<td width="25%"></td>
	<td width="8%"></td>
	<td></td>
</tr>
</table>-->
<br><br>
এর নিকট আমার প্রতিস্থানের মাধ্যমে বিক্রয় করা হয়েছে। 
বিক্রিত মোটর সাইকেলটি রেজিস্ট্রেশনের নিমিত্তে যে সকল কাগজ পত্র ও বিক্রয় পর্যায়ে কাস্টমস কর্তৃক সত্যায়িত ........................ টাকার ভ্যাট চালান ক্রেতার বরাবরে সরবরাহ করা হয়েছে উহা আমাদের মাধ্যমে সরবরাহ করা হয়েছে এবং বিক্রিত কগজপত্র ও কাস্টমস কর্তৃক সত্যায়িত ভ্যাট চালানটি সঠিক আছে ! <br><br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;উক্ত মোটর সাইকেলটি রেজিস্ট্রেশনের নিমিত্তে সরবরাহকৃত কাগজপত্র ও সত্যায়িত ভ্যাট চালানের বিষয়ে কোন প্রকার জতিলটা সৃষ্টি হলে সকল দায়-দায়িত্ব নিম্নসাক্ষরকারী বহন করিবে বিআরটিএ কতৃপক্ষ নহে !
</div>
</body>
</html>