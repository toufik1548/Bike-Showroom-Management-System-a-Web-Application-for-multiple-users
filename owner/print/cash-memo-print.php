<!DOCTYPE html>
<html>
<head>
	<title>CASH MEMO</title>
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

$location_id = $rc['location_id'];
$location_name = get_info("sms_locations","location_name","WHERE location_id=".$rc["location_id"]);


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
<br><br><br><br><br><br><br><br><br><br><br><br>
<div id="top_space"></div>
<center><h1>CASH MEMO</h1></center>
<br><br><br>
<p style="float: right; margin-right: 5px;">Date : <?php echo $add_date; ?></p>
<br>
<div id="cashmemo-text">
<table width="50%">
  <tbody>
<tr>
    <td rowspan="6" valign="top"><b>SOLD TO</b></td>
    <td><?php echo $client_name; ?><br>
    	<b>S/O-</b> <?php echo $client_gurdian_name; ?><br>
    	<b>Address-</b> <?php echo $client_village; ?><br>
    	<!--<b>City-</b> <?php //echo $location_name; ?><br>-->
    </td>
  </tr>
  </tbody>
</table>
</div>
<br>
<table width="100%" border="1" cellpadding="2" id="table_border">
	<thead>
	  <tr>
	    <th width="120">QUANTITY</th>
	    <th colspan="2">DESCRIPTION</th>
	    <th width="120">AMOUNT</th>
	  </tr>
	</thead>
	 <tbody>
	  <tr>
	    <td rowspan="10" valign="top"><center>1 (ONE)</center></td>
	    <td width="130"><b>Brand</b></td>
	    <td><?php echo $brand_name; ?></td>
	    <td rowspan="9" valign="top"><center><?php echo number_format($sells_price,2); ?></center></td>
	  </tr>
	  <tr>
	    <td><b>Model</b></td>
	    <td><?php echo $model_name; ?></td>
	  </tr>
	  <tr>
	    <td><b>Chassis No</b></td>
	    <td><?php echo $bike_chassis_no; ?></td>
	  </tr>
	  <tr>
	    <td><b>Engine No</b></td>
	    <td><?php echo $bike_engine_no; ?></td>
	  </tr>
	  <tr>
	    <td><b>Color</b></td>
	    <td><?php echo $bike_color; ?></td>
	  </tr>
	  <tr>
	    <td><b>Manufactured by</b></td>
	    <td><?php echo $brand_manufcturer; ?></td>
	  </tr>
	  <tr>
	    <td><b>Year of Manufacture</b></td>
	    <td><?php echo $bike_yom; ?></td>
	  </tr>
	  <tr>
	    <td><b>Weight</b></td>
	    <td><?php echo $bike_weight; ?></td>
	  </tr>
	  <tr>
	    <td><b>C.C</b></td>
	    <td><?php echo $bike_cc; ?></td>
	  </tr>
	  <tr>
	    <td colspan="2" align="right"><b>TOTAL</b></td>
	    <td><center><?php echo number_format($sells_price,2); ?></center></td>
	  </tr>
	</tbody>
</table>



<p>
&nbsp;
<b>Taka In Word</b> : <?php echo strtoupper($sells_price_word); ?></p><br>


<br><br><br><br><br>

<table>
	<tr>
    <td width="500"><b>Customer's Signature</b></td>
    <td>
	    <center>
	    	<b>K.R.Bike Center</b><br>
	    	Authorized Signature
	    </center>
    </td>
  </tr>

</table>

</body>
</html>