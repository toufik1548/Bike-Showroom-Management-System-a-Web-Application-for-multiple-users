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
	$client_name 			= $rc['client_name'];
	$client_village 		= $rc['client_village'];
	$client_po 				= $rc['client_po'];
	$client_ps 				= $rc['client_ps'];
	$client_gurdian_name 	= $rc['client_gurdian_name'];
	$client_mother_name 	= $rc['client_mother_name'];
	$location_id 			= $rc['location_id'];
	$location_name 			= get_info("sms_locations","location_name","WHERE location_id=".$rc["location_id"]);

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
?>

<br>
<a href="<?php echo $site_url; ?>/print/cash-memo-print.php?client_id=<?php echo $client_id;?>" target="_blank"><button type="button" class="btn btn-danger" style="float: right; margin-right: 9px;">Print</button></a>
<button type="button" class="btn btn-primary" id="downloadPdfButton">Download PDF</button>

<br><center><h3>&nbsp; Cash Memo &nbsp;</h3></center>
<div class="container border" id="cashmemo">

<p style="float: right;">Date : <?php echo $add_date; ?></p><br><br>

<table class="table table-borderless">
  <tbody>
<tr>
    <th rowspan="6" width="15%">SOLD TO:</th>
    <td><?php echo $client_name; ?><br>
    	<b>S/O-</b> <?php echo $client_gurdian_name; ?><br>
    	<b>S/O-</b> <?php echo $client_mother_name; ?><br>
    	<b>Address-</b> <?php echo $client_village; ?><br>
    </td>
  </tr>
  </tbody>
</table>

<table class="table table-bordered">
	<thead>
	  <tr>
	    <th><center>QUANTITY</center></th>
	    <th colspan="2"><center>DESCRIPTION</center></th>
	    <th><center>AMOUNT</center></th>
	  </tr>
	</thead>
	 <tbody>
	  <tr>
	    <td rowspan="10"><center>1 (ONE)</center></td>
	    <td><b>Brand</b></td>
	    <td><?php echo $brand_name; ?></td>
	    <td rowspan="9"><center><?php echo $sells_price; ?></center></td>
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
	    <td><center><?php echo $sells_price; ?></center></td>
	  </tr>
	</tbody>
</table>
<p>
&nbsp;
<b>Taka In Word</b> : <?php echo $sells_price_word; ?></p><br>

<table class="table table-borderless">
  <tbody>
<tr>
	<td>&nbsp;</td>
    <th>Customer's Signature</th>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
	    <center>
	    	<b><?php echo $logged_showroom_name; ?></b><br>
	    	Authorized Signature
	    </center>
    </td>
  </tr>
  </tbody>
</table>
<br><br><br><br>
</div>

<?php
}else{
  echo "You don't have permission to change this";
  //exit;
}
?>

<script>
    document.getElementById('downloadPdfButton').addEventListener('click', function () {
        // Select the cashmemo div
        var element = document.getElementById('cashmemo');

        // Use html2pdf library to convert HTML to PDF
        html2pdf(element);

        // Optional: You can add more options, e.g., to set the filename
        // var opt = {
        //     margin: 10,
        //     filename: 'cashmemo.pdf',
        //     image: { type: 'jpeg', quality: 0.98 },
        //     html2canvas: { scale: 2 },
        //     jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
        // };
        // html2pdf(element, opt);
    });
</script>