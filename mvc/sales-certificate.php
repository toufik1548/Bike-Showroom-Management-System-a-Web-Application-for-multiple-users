<?php

$client_id 	= $slug2;
$sells_id 	= get_info("sms_sells","sells_id","WHERE client_id=$client_id");
$user_id    = get_info("sms_clients","user_id","WHERE client_id=$client_id");

if ($user_id == $logged_user_id) {
	if($sells_id==""){echo "No records found"; exit();}
?>

<?php
	//sells records
	$qs 				= mysqli_query($con,"SELECT * FROM sms_sells WHERE sells_id=$sells_id");
	$rs 				= mysqli_fetch_assoc($qs);
	$add_date 			= $rs['add_date'];
	$sells_price 		= $rs['sells_price'];
	$sells_price_word 	= $rs['sells_price_word'];
	$bike_id 			= $rs['bike_id'];

	//client records
	$qc 					= mysqli_query($con,"SELECT * FROM sms_clients WHERE client_id=$client_id");
	$rc 					= mysqli_fetch_assoc($qc);
	$client_id 				= $rs['client_id'];
	$client_name 			= $rc['client_name'];
	$client_gurdian_name 	= $rc['client_gurdian_name'];
	$client_village 		= $rc['client_village'];
	$client_po 				= $rc['client_po'];
	$client_ps 				= $rc['client_ps'];
	$client_phone 			= $rc['client_phone'];

	$location_id 	= $rc['location_id'];
	$location_name 	= get_info("sms_locations","location_name","WHERE location_id=".$rc["location_id"]);


	//bike records
	$qb = mysqli_query($con,"SELECT * FROM sms_bikes WHERE bike_id=$bike_id");
	$rb = mysqli_fetch_assoc($qb);

	$brand_id 	= $rb['brand_id'];
	$brand_name =  get_info("sms_brands","brand_name","WHERE brand_id=".$rb["brand_id"]);

	$model_id 	= $rb['model_id'];
	$model_name =  get_info("sms_models","model_name","WHERE model_id=".$rb["model_id"]);

	$bike_chassis_no 	= $rb['bike_chassis_no'];
	$bike_engine_no 	= $rb['bike_engine_no'];
	$bike_color 		= $rb['bike_color'];
	$bike_yom 			= $rb['bike_yom'];
	$bike_cylinder 		= $rb['bike_cylinder'];
	$bike_weight 		= $rb['bike_weight'];
	$bike_cc 			= $rb['bike_cc'];
	$bike_seats 		= $rb['bike_seats'];
	$bike_tyres 		= $rb['bike_tyres'];
?>

<br>
<div class="container" style="margin-left: 12px;">
<a href="<?php echo $site_url; ?>/print/sales-certificate-print.php?client_id=<?php echo $client_id;?>" target="_blank"><button type="button" class="btn btn-danger" style="float: right; margin-right: 9px;">Print</button></a>
<br><center><span class="badge badge-pill badge-dark"><h3>&nbsp; SALES CERTIFICATE &nbsp;</h3></span></center>
<br>

<p style="float: right;">Date : <?php echo $add_date; ?></p>
<br>
<p style="margin-left: 12px;">
	To<br>
	The Asstt. Director<br>
	B.R.T.A & Registration Authority<br>
	<?php echo $location_name; ?><br><br>

	<b>Sub: Registration Of A New Sold Motor Cycle.</b><br><br>

	Dear Sir,<br>
	This is for your kind information that one unit Motorcycle brand <b><?php echo $brand_name; ?></b>.
</p>

<table class="table table-borderless">
	<tbody>
		<tr>
			<th width="20%">Engine No.</th>
			<td width="1%">:</td>
			<td><?php echo $bike_engine_no; ?></td>
		</tr>
		<tr>
			<th>Chassis No.</th>
			<td>:</td>
			<td><?php echo $bike_chassis_no; ?></td>
		</tr>
		<tr>
			<th>Color</th>
			<td>:</td>
			<td><?php echo $bike_color; ?></td>
			<th width="15%">Model</th>
			<td width="1%">:</td>
			<td><?php echo $model_name; ?></td>
		</tr>
		<tr>
			<th>C.C</th>
			<td>:</td>
			<td><?php echo $bike_cc; ?></td>
			<th>Weight</th>
			<td>:</td>
			<td><?php echo $bike_weight; ?></td>
		</tr>
		<tr>
			<th>Cylinder Capacity</th>
			<td>:</td>
			<td><?php echo $bike_cylinder; ?></td>
			<th>Seating Capacity</th>
			<td>:</td>
			<td><?php echo $bike_seats; ?></td>
		</tr>
		<tr>
			<th>Year of Manufacture</th>
			<td>:</td>
			<td><?php echo $bike_yom; ?></td>
			<th>Tyre Size</th>
			<td>:</td>
			<td><?php echo $bike_tyres; ?></td>
		</tr>
		<tr>
			<th>Has been sold to</th>
			<td>:</td>
			<td colspan="2">
				<?php echo $client_name; ?> &nbsp;
		    	<b>S/O-</b> <?php echo $client_gurdian_name; ?><br>
		    	<b>Address-</b> <?php echo $client_village; ?><br>
		    	<!--<b>City-</b> <?php //echo $location_name; ?><br>-->
    		</td>
		</tr>
	</tbody>
</table>
<p style="margin-left: 12px;">
	So, It is requested that the above Motorcycle may kindly be registration in the Name of the Purchaser.<br><br>

	Thanking you,<br>
	Your Faitfully
</p>
<br><br>
<p style="margin-left: 12px;">
	<b><?php echo $logged_showroom_name; ?></b>
</p>
<br><br><br>
</div>

<?php
}else{
  echo "You don't have permission to change this";
  //exit;
}
?>