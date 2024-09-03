<br>
<h4 class="fw-bold">Available Bikes Details</h4>

<?php
$bike_id 	= $slug2;
$user_id    = get_info("sms_bikes","user_id","WHERE bike_id=$bike_id");

if ($user_id == $logged_user_id) {
	if (isset($slug2) && $slug2>0){
}
?>

<div class="container border">
<table width="100%" class="table table-hover">
<tbody>
<?php
	$q = mysqli_query($con,"SELECT * FROM sms_bikes WHERE bike_id=$bike_id");
	$r = mysqli_fetch_assoc($q);
?>
	<tr>
		<td width="50%"><b>Bike ID</b></td>
		<td width="50%"><?php echo $r["bike_id"]; ?></td>
	</tr>
	<tr>
		<td width="50%"><b>Brand</b></td>
		<td width="50%"><?php echo get_info("sms_brands","brand_name","WHERE brand_id=".$r["brand_id"]); ?></td>
	</tr>
	<tr>
		<td width="50%"><b>Model</b></td>
		<td width="50%"><?php echo get_info("sms_models","model_name","WHERE model_id=".$r["model_id"]); ?></td>
	</tr>
	<tr>
		<td width="50%"><b>Engine No</b></td>
		<td width="50%"><?php echo $r["bike_engine_no"]; ?></td>
	</tr>
	<tr>
		<td width="50%"><b>Chassis No</b></td>
		<td width="50%"><?php echo $r["bike_chassis_no"]; ?></td>
	</tr>
	<tr>
		<td width="50%"><b>Horse Power (BHP)</b></td>
		<td width="50%"><?php echo $r["bike_bhp"]; ?></td>
	</tr>
	<tr>
		<td width="50%"><b>Bike Color</b></td>
		<td width="50%"><?php echo $r["bike_color"]; ?></td>
	</tr>
	<tr>
		<td width="50%"><b>C.C</b></td>
		<td width="50%"><?php echo $r["bike_cc"]; ?></td>
	</tr>
	<tr>
		<td width="50%"><b>Cylinder</b></td>
		<td width="50%"><?php echo $r["bike_cylinder"]; ?></td>
	</tr>
	<tr>
		<td width="50%"><b>Maker's Country</b></td>
		<td width="50%"><?php echo $r["bike_country"]; ?></td>
	</tr>
	<tr>
		<td width="50%"><b>Year of Manufacture</b></td>
		<td width="50%"><?php echo $r["bike_yom"]; ?></td>
	</tr>
	<tr>
		<td width="50%"><b>Weight</b></td>
		<td width="50%"><?php echo $r["bike_weight"]; ?></td>
	</tr>
	<tr>
		<td width="50%"><b>Fuel Used</b></td>
		<td width="50%"><?php echo $r["bike_fuel"]; ?></td>
	</tr>
	<tr>
		<td width="50%"><b>RPM</b></td>
		<td width="50%"><?php echo $r["bike_rpm"]; ?></td>
	</tr>
	<tr>
		<td width="50%"><b>Wheel Base</b></td>
		<td width="50%"><?php echo $r["bike_wb"]; ?></td>
	</tr>
	<tr>
		<td width="50%"><b>Maximum Laden</b></td>
		<td width="50%"><?php echo $r["bike_maxload"]; ?></td>
	</tr>
	<tr>
		<td width="50%"><b>Seating Capacity</b></td>
		<td width="50%"><?php echo $r["bike_seats"]; ?></td>
	</tr>
	<tr>
		<td width="50%"><b>Tyre Size</b></td>
		<td width="50%"><?php echo $r["bike_tyres"]; ?></td>
	</tr>
	<tr>
		<td width="50%"><b>Purchase Price</b></td>
		<td width="50%"><?php echo $r["bike_price"]; ?></td>
	</tr>
</tbody>
</table>
</div>

<?php
}else{
  echo "You don't have permission to change this";
  //exit;
}
?>