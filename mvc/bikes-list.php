<br><center><span class="badge badge-light"><h3>&nbsp; Bike List &nbsp;</h3></span></center><br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>/">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Bike List</li>
  </ol>
</nav>

<?php
if (isset($slug2) && $slug2>0){

$bike_id=$slug2;

$q=mysqli_query($con,"DELETE FROM sms_bikes WHERE bike_id=$bike_id");

if($q){
  echo "<div class='alert alert-dismissible' style='background-color: green; color: white;' role='alert'> ✔ Record add successfully.</div>";
}
else{ 
  echo "<div class='alert alert-dismissible' style='background-color: red; color: white;' role='alert'> ❌ Wrong or mismatch!</div>";
}
}
?>

<div class="container border">
<br><br>
<table width="100%" class="table table-bordered">
<tbody>
	<tr>
		<th><center>Brand</center></th>
		<th><center>Model</center></th>
		<th><center>Status</center></th>
		<th><center>Actions</center></th>
	</tr>


<?php
$q = mysqli_query($con,"SELECT sms_brands.brand_name,sms_models.model_name,sms_bikes.*  FROM sms_brands,sms_models,sms_bikes WHERE sms_brands.brand_id=sms_bikes.brand_id AND sms_models.model_id=sms_bikes.model_id ORDER BY status DESC, model_name ASC");
while($r=mysqli_fetch_assoc($q)){
?>
	<tr>
		<td><center><?php echo $r["brand_name"]; ?></center></td>
		<td><?php echo $r["model_name"]; ?></td>
		<td><center><?php echo $r["status"]; ?></center></td>
		<td>
			
			<center><a href="<?php echo $cp_url; ?>/bikes-edit/<?php echo $r["bike_id"]; ?>/">
	      <button type="button" class="btn btn-info">edit</button></a>
	      </center>
		</td>
	</tr>
</tbody>
<?php

}
?>
</table>
</div>