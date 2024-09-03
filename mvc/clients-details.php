<br>
<h4 class="fw-bold">Clients Details</h4>
<div class="container border">
<br>

<?php
$client_id 	= $slug2;
$sells_id 	= get_info("sms_sells","sells_id","WHERE client_id=$client_id");
$user_id    = get_info("sms_clients","user_id","WHERE client_id=$client_id");

if (isset($bike_id)) {
    echo $bike_id;
}


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
	$client_name 			= $rc['client_name'];
	$client_village 		= $rc['client_village'];
	$client_po 				= $rc['client_po'];
	$client_ps 				= $rc['client_ps'];
	$client_per_village 	= $rc['client_per_village'];
	$client_per_po 			= $rc['client_per_po'];
	$client_per_ps 			= $rc['client_per_ps'];
	$client_nationality 	= $rc['client_nationality'];
	$client_phone 			= $rc['client_phone'];
	$client_dob 			= $rc['client_dob'];
	$client_gurdian_name 	= $rc['client_gurdian_name'];
	$client_mother_name 	= $rc['client_mother_name'];
	$client_spouse_name 	= $rc['client_spouse_name'];
	$location_id 			= $rc['location_id'];
	$location_name 			= get_info("sms_locations","location_name","WHERE location_id=".$rc["location_id"]);
	$location_id 			= $rc['location_per_id'];
	$location_per_name 		= get_info("sms_locations","location_name","WHERE location_id=".$rc["location_per_id"]);
	$gender_id 				= $rc['gender_id'];
	$gender_name 			= get_info("sms_genders","gender_name","WHERE gender_id=".$rc["gender_id"]);


	//bike records
	$qb 				= mysqli_query($con,"SELECT * FROM sms_bikes WHERE bike_id=$bike_id");
	$rb 				= mysqli_fetch_assoc($qb);
	$brand_id 			= $rb['brand_id'];
	$brand_name 		= get_info("sms_brands","brand_name","WHERE brand_id=".$rb["brand_id"]);
	$brand_manufcturer 	= get_info("sms_brands","brand_manufcturer","WHERE brand_id=".$rb["brand_id"]);
	$model_id 			= $rb['model_id'];
	$model_name 		= get_info("sms_models","model_name","WHERE model_id=".$rb["model_id"]);
	$bike_chassis_no 	= $rb['bike_chassis_no'];
	$bike_engine_no 	= $rb['bike_engine_no'];
	$bike_color 		= $rb['bike_color'];
	$bike_yom 			= $rb['bike_yom'];
	$bike_weight 		= $rb['bike_weight'];
	$bike_cc 			= $rb['bike_cc'];
	$sells_price 		= get_info("sms_sells","sells_price","WHERE bike_id=$bike_id");
?>


<a href="<?php echo $site_url; ?>/cash-memo/<?php echo $rc["client_id"]; ?>/">
<button type="button" class="btn btn-primary btn-sm">CASH MEMO</button></a>

<a href="<?php echo $site_url; ?>/sales-certificate/<?php echo $rc["client_id"]; ?>/">
<button type="button" class="btn btn-primary btn-sm">SALES CERTIFICATE</button></a>

<a href="<?php echo $site_url; ?>/specimen/<?php echo $rc["client_id"]; ?>/">
<button type="button" class="btn btn-primary btn-sm">SPECIMEN</button></a>

<a href="<?php echo $site_url; ?>/application/<?php echo $rc["client_id"]; ?>/">
<button type="button" class="btn btn-primary btn-sm">APPLICATION</button></a>

<a href="<?php echo $site_url; ?>/assessment-form/<?php echo $rc["client_id"]; ?>/">
<button type="button" class="btn btn-primary btn-sm">ASSESSMENT FORM</button></a>

<a href="<?php echo $site_url; ?>/challan-form/<?php echo $rc["client_id"]; ?>/">
<button type="button" class="btn btn-primary btn-sm">CHALLAN FORM</button></a>

<a href="<?php echo $site_url; ?>/certificate/<?php echo $rc["client_id"]; ?>/">
<button type="button" class="btn btn-primary btn-sm">CERTIFICATE</button></a>

<br>
<center>
	<span class="badge badge-pill badge-secondary">
		<h3 class="border p-2 bg-white text-dark">Client Info</h3>
	</span>
</center>

<table width="100%" class="table table-bordered">
<tbody>

	<tr>
		<td width="25%"><b>Client Name:</b></td>
		<td><?php echo $client_name; ?></td>
	</tr>
	<tr>
		<td><b>Gurdian Name:</b></td>
		<td><?php echo $client_gurdian_name; ?></td>
	</tr>
	<tr>
		<td><b>Mother Name:</b></td>
		<td><?php echo $client_mother_name; ?></td>
	</tr>
		<tr>
		<td><b>Spouse Name:</b></td>
		<td><?php echo $client_spouse_name; ?></td>
	</tr>
	<tr>
		<td><b>Address:</b></td>
		<td><?php echo $client_village; ?></td>
	</tr>
	<tr>
		<td><b>Nationality:</b></td>
		<td><?php echo strtoupper($client_nationality); ?></td>
	</tr>
	<tr>
		<td><b>Phone:</b></td>
		<td><?php echo $client_phone; ?></td>
	</tr>
	<tr>
		<td><b>Date of Birth</b></td>
		<td><?php echo $client_dob; ?></td>
	</tr>
	<tr>
		<td><b>Gender:</b></td>
		<td>
			<?php echo $gender_name; ?>
		</td>
	</tr>
</tbody>
</table>



<center>
	<span class="badge badge-pill badge-secondary">
		<h3 class="border p-2 bg-white text-dark">Bike Info</h3>
	</span>
</center>
<table width="100%" class="table table-bordered">
	
	  <tr>
	    <td width="25%"><b>Brand</b></td>
	    <td><?php echo $brand_name; ?></td>
	    +
	  </tr><tr>
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
	    <td><b>Bike Price</b></td>
	    <td><?php echo $sells_price; ?></td>
	  </tr>

</table>





<center>
	<span class="badge badge-pill badge-secondary">
		<h3 class="border p-2 bg-white text-dark">Payment Details</h3>
	</span>
</center>
<table width="100%" class="table table-bordered">
    <tr>
        <th>Payment Date</th>
        <th>Payment Amount</th>
        <th>Due</th>
    </tr>

    <?php
    //payment records
    $totalPayments = 0;
    $bikePrice = get_info("sms_sells", "sells_price", "WHERE user_id = $logged_user_id AND sells_id = $sells_id");

    $qp = mysqli_query($con, "SELECT * FROM sms_payments WHERE sells_id=$sells_id");
    while ($rp = mysqli_fetch_assoc($qp)) {
        ?>
        <tr>
            <td><?php echo $rp['payment_date']; ?></td>
            <td><?php echo $rp["payment_amount"]; $totalPayments += $rp["payment_amount"]; ?></td>
            <td></td> <!-- Dues will be displayed in the last row only -->
        </tr>
        <?php
    }
    ?>
    <tr>
        <td width="25%" align="right">Total</td>
        <td><b><?php echo $totalPayments; ?></b></td>
        <td>
            <?php
            $totalPaymentsForSell = get_sum("sms_payments", "payment_amount", "WHERE sells_id = $sells_id");
            $dues = $bikePrice - $totalPaymentsForSell;
            echo $dues;
            ?>
        </td>
    </tr>
</table>

<br><br>

<a href="<?php echo $site_url; ?>/cash-memo/<?php echo $rc["client_id"]; ?>/">
<button type="button" class="btn btn-primary btn-sm">CASH MEMO</button></a>

<a href="<?php echo $site_url; ?>/sales-certificate/<?php echo $rc["client_id"]; ?>/">
<button type="button" class="btn btn-primary btn-sm">SALES CERTIFICATE</button></a>

<a href="<?php echo $site_url; ?>/specimen/<?php echo $rc["client_id"]; ?>/">
<button type="button" class="btn btn-primary btn-sm">SPECIMEN</button></a>

<a href="<?php echo $site_url; ?>/application/<?php echo $rc["client_id"]; ?>/">
<button type="button" class="btn btn-primary btn-sm">APPLICATION</button></a>

<a href="<?php echo $site_url; ?>/assessment-form/<?php echo $rc["client_id"]; ?>/">
<button type="button" class="btn btn-primary btn-sm">ASSESSMENT FORM</button></a>

<a href="<?php echo $site_url; ?>/challan-form/<?php echo $rc["client_id"]; ?>/">
<button type="button" class="btn btn-primary btn-sm">CHALLAN FORM</button></a>

<a href="<?php echo $site_url; ?>/certificate/<?php echo $rc["client_id"]; ?>/">
<button type="button" class="btn btn-primary btn-sm">CERTIFICATE</button></a>

<br><br>
<center><a href="#top"><button type="button" class="btn btn-light brn-sm">Back To Top</button></a></center><br>
</div>
