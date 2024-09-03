<br>

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
	$sells_price		= $rs['sells_price'];
	$sells_price_word 	= $rs['sells_price_word'];
	$bike_id 			= $rs['bike_id'];

	//client records
	$qc 					= mysqli_query($con,"SELECT * FROM sms_clients WHERE client_id=$client_id");
	$rc 					= mysqli_fetch_assoc($qc);
	$client_name 			= $rc['client_name'];
	$client_gurdian_name 	= $rc['client_gurdian_name'];
	$client_mother_name 	= $rc['client_mother_name'];
	$client_village 		= $rc['client_village'];
	$client_po 				= $rc['client_po'];
	$client_ps 				= $rc['client_ps'];
	$client_nationality 	= $rc['client_nationality'];
	$client_phone 			= $rc['client_phone'];
	$client_dob 			= $rc['client_dob'];
	$client_gurdian_name 	= $rc['client_gurdian_name'];

	$location_id 	= $rc['location_id'];
	$location_name 	= get_info("sms_locations","location_name","WHERE location_id=".$rc["location_id"]);

	$gender_id 		= $rc['gender_id'];
	$gender_name 	= get_info("sms_genders","gender_name","WHERE gender_id=".$rc["gender_id"]);

	//bike records
	$qb = mysqli_query($con,"SELECT * FROM sms_bikes WHERE bike_id=$bike_id");
	$rb = mysqli_fetch_assoc($qb);

	$brand_id 			= $rb['brand_id'];
	$brand_name 		=  get_info("sms_brands","brand_name","WHERE brand_id=".$rb["brand_id"]);
	$brand_manufcturer 	= get_info("sms_brands","brand_manufcturer","WHERE brand_id=".$rb["brand_id"]);

	$model_id 	= $rb['model_id'];
	$model_name =  get_info("sms_models","model_name","WHERE model_id=".$rb["model_id"]);

	$bike_chassis_no 	= $rb['bike_chassis_no'];
	$bike_engine_no 	= $rb['bike_engine_no'];
	$bike_color 		= $rb['bike_color'];
	$bike_yom 			= $rb['bike_yom'];
	$bike_weight 		= $rb['bike_weight'];
	$bike_cc 			= $rb['bike_cc'];
	$bike_country 		= $rb['bike_country'];
	$bike_cylinder 		= $rb['bike_cylinder'];
	$bike_fuel 			= $rb['bike_fuel'];
	$bike_bhp 			= $rb['bike_bhp'];
	$bike_rpm 			= $rb['bike_rpm'];
	$bike_seats 		= $rb['bike_seats'];
	$bike_wb 			= $rb['bike_wb'];
	$bike_maxload 		= $rb['bike_maxload'];
	$bike_tyres 		= $rb['bike_tyres'];
?>


<a href="<?php echo $site_url; ?>/print/assessment-form-print.php?client_id=<?php echo $client_id;?>" target="_blank"><button type="button" class="btn btn-danger" style="float: right; margin-right: 9px;">Print</button></a>
<br><br>
<center>
<h3>Bangladesh Road Transport Authority</h3>
<h5>Allen bari, Tejgaon, Dhaka-1215</h5>
<h6>(Assessment Form)</h6>
</center>

<div class="container border">

<table width="100%" border="1" id="table-border2">
	<tr>
		<td id="tdback" width="25%">Vehicle Information</td>
		<td width="25%">&nbsp;</td>
		<td id="tdback" width="25%"><center>District</center></td>
		<td width="25%"><b><?php echo strtoupper($location_name); ?></b></td>
	</tr>
	<tr>
		<td width="25%">Branch Name</td>
		<td width="25%"></td>
		<td width="25%">&nbsp;</td>
		<td width="25%">&nbsp;</td>
	</tr>
</table>
<br>
<table width="100%" border="1" id="table-border2">
	<tr>
		<td id="tdback" width="20%">Vehicle Information</td>
		<td width="35%">&nbsp;</td>
		<td id="tdback" width="20%"><center>Permit Information</center></td>
		<td width="25%">&nbsp;</td>
	</tr>
	<tr>
		<td>Registration No.</td>
		<td>&nbsp;</td>
		<td>No. of Districts</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><b>Chassis No.</b></td>
		<td> <b> <?php echo strtoupper($bike_chassis_no); ?></b></td>
		<td>No. of Routes</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><b>Engine No.</b></td>
		<td> <b> <?php echo strtoupper($bike_engine_no); ?></b></td>
		<td id="tdback">Driving License</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>Vehicle Type</td>
		<td>&nbsp;</td>
		<td>License No.</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><b>Owner Name</b></td>
		<td> <b> <?php echo strtoupper($client_name); ?></b></td>
		<td>License Type</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>Father's Name & Address</td>
		<td>&nbsp;</td>
		<td>Person Name</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>Owner Type</td>
		<td>&nbsp;</td>
		<td>Father's Name & Address</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>Seating Capacity/Weight</td>
		<td> <b> <?php echo strtoupper($bike_seats); ?> / <?php echo strtoupper($bike_weight); ?></b></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td colspan="4">Depositor name & address: MOB- <?php echo strtoupper($client_phone); ?></td>
	</tr>
</table>
<br>
<center><h3><u>Fee Assessment</u></h3></center>
<table width="100%" border="1" id="table-border2">
	<tr>
		<th id="tdback">SL.<br>No.</th>
		<th id="tdback">Fee Particulars</th>
		<th id="tdback">Main<br>Fee</th>
		<th id="tdback">Inspection<br>Fee</th>
		<th id="tdback">Label<br>Fee</th>
		<th id="tdback">Application<br>Fee</th>
		<th id="tdback">Late<br>Fee</th>
		<th id="tdback">Other<br>Fee</th>
	</tr>
	<tr>
		<td rowspan="2">1</td>
		<td rowspan="2">
		a) <b>New Registration</b><br>
		b) <b>Conversion</b>
		</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>2</td>
		<td><b>Transfer of Ownership (T.O)</b></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td rowspan="2">3</td>
		<td rowspan="2">
		a) <b>Issue of Tax Token</b><br>
		b) <b>Renewal of Tax Token</b>
		</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr><tr>
		<td rowspan="2">4</td>
		<td rowspan="2">
		a) <b>Issue of Certificate of Fitness (C.F)</b><br>
		b) <b>Renewal of Certificate of Fitness</b>
		</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td rowspan="3">5</td>
		<td rowspan="2">
		a) Issue of Route Permit (R.P) Contract<br>
		Carriage/Privet Temporary or Permanent
		</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>b) <b>Renewal of Route Permit</b></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td rowspan="9">6</td>
		<td rowspan="9">
		a) Issue of Driving License (D.L)<br>
		Professional/Non-Professional<br>
		b) Renewal of Driving License:<br>
		Professional/Non-Professional<br>
		c) Issue/Renewal of Lerner<br>
		d) Issue/Renewal of Counductor License<br>
		e) Registration of Driving School<br>
		f) Issue of Instructor License<br>
		g) Others
		</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
	<td id="tdback">7</td>
	<td id="tdback"><center><b>Miscellaneous</b></center></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
	<tr>
		<td rowspan="12">&nbsp;</td>
		<td rowspan="12">
		a) Engine Change<br>
		b) Color / Address Change<br>
		c) Endorsement<br>
		d) Any Correction (Spicily)<br>
		e) i) Issue of New Trade Certificate<br>
		(Garage Number)<br>
		ii) Renewal of Trade Certificate<br>
		(Garage Number)<br>
		f) Issue of Duplicate Registration<br>
		Certificate/Duplicate D.L/Duplicate<br>
		C.F/Duplicate R.P/Duplicate<br>
		Tax Token
		</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
</table>

<br><br>
</div>

<?php
}else{
  echo "You don't have permission to change this";
  //exit;
}
?>