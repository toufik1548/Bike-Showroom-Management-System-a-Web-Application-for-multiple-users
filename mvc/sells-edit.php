<br><center><span class="badge badge-light"><h3>&nbsp; Edit Sell &nbsp;</h3></span></center><br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>/">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>/sells-list/">Sell List</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Sell</li>
  </ol>
</nav>
<div class="container border">
<br><br>

<?php

$sells_id=$slug2;

if (isset($_POST["update"])) {

$client_id=$_POST["client_id"];
$bike_id=$_POST["bike_id"];
$status=addslashes($_POST["status"]);

$q=mysqli_query($con, 
  "UPDATE `honda_sells` SET 
  client_id='$client_id',
  bike_id='$bike_id',
  status='$status'
  WHERE sells_id=$sells_id");


if($q){
  echo "<div class='alert alert-dismissible' style='background-color: green; color: white;' role='alert'> ✔ Record add successfully.</div>";
}
else{ 
  echo "<div class='alert alert-dismissible' style='background-color: red; color: white;' role='alert'> ❌ Wrong or mismatch!</div>";
}
}
?>


<?php
$q = mysqli_query($con,"SELECT *  FROM honda_sells WHERE sells_id=$sells_id");
$r=mysqli_fetch_assoc($q);

?>
<form name="form1" method="POST" action="">
  <table class="table table-striped table-bordered">
    <tbody>
  <tr>
    <td width="20%">
      <font size="3">Client</font>
    </td>
    <td>
      <div class="form-group">
        <select class="form-control" id="models1" style="width: 35%" name="client_id">
          <option>Select Client</option>

<?php
$qm = mysqli_query($con,"SELECT client_id,client_name FROM honda_clients WHERE status=1");
while($rm=mysqli_fetch_array($qm)){ ?>

<option value="<?php echo $rm['client_id']; ?>" 
<?php if($rm['client_id']==$r['client_id']){echo "Selected";} ?>
> 
  <?php echo $rm['client_name']; ?></option>

<?php 
}
?>


        </select>
      </div>
    </td>
  </tr>

	<tr>
	    <td width="20%">
	      <font size="3">Bike</font>
	    </td>
	    <td>
	      <div class="form-group">
	        <select class="form-control" id="models1" style="width: 35%" name="bike_id">
	          <option>Select Bike</option>

	<?php
	$qm = mysqli_query($con,"SELECT bike_id FROM honda_bikes WHERE status=1");
	while($rm=mysqli_fetch_array($qm)){ ?>

	<option value="<?php echo $rm['bike_id']; ?>" 
	<?php if($rm['bike_id']==$r['bike_id']){echo "Selected";} ?>
	> 
	  <?php echo $rm['bike_id']; ?></option>

	<?php 
	}
	?>


	        </select>
	      </div>
	    </td>
	  </tr>

  <tr>
    <td width="20%">
      <font size="3">Active</font>
    </td>
    <td>
      <input type="radio" name="status" value="1" <?php if($r['status']==1){echo " checked";}?>> yes 
      <input type="radio" name="status" value="0" <?php if($r['status']==0){echo " checked";}?>> no
    </td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td>
      <button type="submit" name="update" value="Submit" class="btn btn-primary btn-block" style="width: 30%">Update</button>
    </tr>

</tbody>
  </table><br>
  <a title="Back to previous page" href="javascript:history.back()"><button type="button" class="btn btn-dark btn-sm">Back To Previous</button></a><br><br>
</form>
</div>