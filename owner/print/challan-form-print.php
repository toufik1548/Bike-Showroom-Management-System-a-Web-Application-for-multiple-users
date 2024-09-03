<!DOCTYPE html>
<html>
<head>
	<title>CHALLAN FORM</title>
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


?>

<div id="top_space"></div>

<center>
<h3>চালান ফরম</h3>
<p> টি. আর. ফরম নম্বর ৬ (এস. আর ৩৭ দ্রষ্টব্য )</p>
</center>
<br><br>

<table width="20%" border="1" cellpadding="2" id="table_border" align="right" class="chalantr">
	<tr>
		<td align="center">১ম (মূল) <br> কপি</td>
		<td align="center">২য় <br> কপি</td>
		<td align="center">৩য় <br> কপি</td>
	</tr>
</table>
<br><br><br>
<table width="100%" >
	<tr>
		<td colspan="2">চালান নম্বর .............................................</td>
		<td>&nbsp;</td>
		<td>
		তারিখ: <br>
		শাখায় টাকা জমা দেওয়ার <br>
		চালান
		</td>
	</tr>
	<tr>
		<td colspan="2">বাংলাদেশ ব্যাংক/সোনালী ব্যাংকের .................................... </td>
		<td>জেলার .............................. রাজশাহী কর্পোরেট</td>
		<td>&nbsp;</td>
	</tr>
</table>
<br><br>

<table>
	<td>
		<table width="100" cellpadding="2" id="table_border" align="left" class="chalantr">
		<tr>
			<td align="center">১</td>
		</tr>
		</table>
	</td>
	<td width="100">&nbsp</td>
	<td>
		<table width="200" border="1" cellpadding="2" id="table_border" class="chalantr">
			<tr>
				<td align="center">১</td>
				<td align="center">১</td>
				<td align="center">৩</td>
				<td align="center">৩</td>
			</tr>
		</table>
	</td>
	<td width="100">&nbsp</td>
	<td>
		<table width="250" border="1" cellpadding="2" id="table_border" class="chalantr">
			<tr>
				<td align="center">০</td>
				<td align="center">০</td>
				<td align="center">২</td>
				<td align="center">০</td>
			</tr>
		</table>
	</td>
	<td width="100">&nbsp</td>
	<td>
		<table width="250" border="1" cellpadding="2" id="table_border" class="chalantr">
			<tr>
				<td align="center">০</td>
				<td align="center">৩</td>
				<td align="center">১</td>
				<td align="center">১</td>
			</tr>
		</table>
	</td>
</table>
<br>

<table width="100%" border="1" cellpadding="2" id="table_border">
	<tr>
	<td colspan="4" align="center">জমা প্রদানকারী কতৃক পূরণ করিতে হইবে</td>
		<td colspan="2" align="center">টাকার অংক</td>
		<td align="center">বিভাগের নাম এবং</td>
	</tr>
	<tr>
		<td align="center">যাহার মারফত <br> প্রদত্ত হইল <br> <br> তাহার নাম ও ঠিকানা <br></td>
		<td align="center">যে ব্যক্তির/ প্রতিষ্ঠানের  পক্ষ <br><br> হইতে টাকা  প্রদত্ত হইল <br> তাহার নাম, পদবী ও <br> ঠিকানা</td>
		<td align="center">ফি বাবদ জমা দেওয়া <br> হইল তাহার বিবরণ</td>
		<td align="center">মুদ্রা ও <br> নোটের <br> বিবরণ/ড্রাফ্‌ট <br> পে-অর্ডার ও <br><br> চেকের <br> বিবরণ</td>
		<td align="center">টাকা</td>
		<td align="center">পঃ</td>
		<td align="center">চালানের পৃষ্ঠাংকনকারী <br><br> কর্মকর্তার নাম পদবী <br> ও দপ্তর</td>
	</tr>
	<tr>
		<td rowspan="2" align="center"> মোঃ আবু হোসেন সিদ্দিকী <br><br> প্রোপ্রাইটর <br> কে.আর. বাইক সেন্টার <br><br><br></td>
		<td rowspan="2" align="center">কে.আর. বাইক সেন্টার <br> ১০৯, রানীবাজার, রাজশাহী <br> ভ্যাট রেজিঃ নং- <br><br> এলাকা কোড ঃ ১২০১০১ <br> সার্কেল-২ <br> রাজশাহী কমিশনাত্তে</td>
		<td rowspan="2" align="center"><br> চেসিস <br> <b><?php echo $bike_chassis_no; ?></b> <br><br> ইঞ্জন<br> <b><?php echo $bike_engine_no; ?></b> <br><br> মডেল <br> <b><?php echo $model_name; ?></b> <br><br></td>
		<td rowspan="2" align="center">অনুমোদিত <br> মূল্য <br><br> ১৫% ভ্যাট <br><br>  রেয়াত<br><br><br><br> <b>মোট টাকা</b></td>
		<td align="center" valign="top">১১০৯/-</td>
		<td align="center">&nbsp;</td>
		<td rowspan="2" align="center">&nbsp;</td>
	</tr>
  <tr>
    <td height="30" align="center"> <b>১১০৯/-</b></td>
    <td>&nbsp;</td>
  </tr>
	<tr>
		<td colspan="4">&nbsp; টাকা (কথায়) ঃ</td>
		<td colspan="3" rowspan="3" valign="bottom" align="center"><small>ম্যানেজার</small> <br> বাংলাদেশ ব্যাংক/সোনালী ব্যাংকের</td>
	</tr>
	<tr>
		<td colspan="4">&nbsp; টাকা পাওয়া গেল ঃ</td>
	</tr>
	<tr>
		<td colspan="4">&nbsp; তারিখ ঃ</td>
	</tr>
</table>

</body>
</html>