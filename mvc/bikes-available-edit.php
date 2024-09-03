<br>
<h4 class="fw-bold">Edit Available Bike</h4>

<?php
$bike_id    = $slug2;
$brand_id   = get_info("sms_bikes","brand_id","WHERE bike_id=$bike_id");
$user_id    = get_info("sms_bikes","user_id","WHERE bike_id=$bike_id");

if ($user_id == $logged_user_id) {
  if (isset($_POST["update"])) {

$model_id         = $_POST["model_id"];
$bike_engine_no   = addslashes($_POST["bike_engine_no"]);
$bike_chassis_no  = addslashes($_POST["bike_chassis_no"]);
$bike_bhp         = addslashes($_POST["bike_bhp"]);
$bike_color       = addslashes($_POST["bike_color"]);
$bike_cc          = addslashes($_POST["bike_cc"]);
$bike_cylinder    = addslashes($_POST["bike_cylinder"]);
$bike_country     = addslashes($_POST["bike_country"]);
$bike_yom         = addslashes($_POST["bike_yom"]);
$bike_weight      = addslashes($_POST["bike_weight"]);
$bike_fuel        = addslashes($_POST["bike_fuel"]);
$bike_rpm         = addslashes($_POST["bike_rpm"]);
$bike_wb          = addslashes($_POST["bike_wb"]);
$bike_maxload     = addslashes($_POST["bike_maxload"]);
$bike_seats       = addslashes($_POST["bike_seats"]);
$bike_tyres       = addslashes($_POST["bike_tyres"]);
$bike_price       = addslashes($_POST["bike_price"]);
$status           = addslashes($_POST["status"]);

$q=mysqli_query($con, 
  "UPDATE `sms_bikes` SET 
  model_id          = '$model_id',
  bike_engine_no    = '$bike_engine_no',
  bike_chassis_no   = '$bike_chassis_no',
  bike_bhp          = '$bike_bhp',
  bike_color        = '$bike_color',
  bike_cc           = '$bike_cc',
  bike_cylinder     = '$bike_cylinder',
  bike_country      = '$bike_country',
  bike_yom          = '$bike_yom',
  bike_weight       = '$bike_weight',
  bike_fuel         = '$bike_fuel',
  bike_rpm          = '$bike_rpm',
  bike_wb           = '$bike_wb',
  bike_maxload      = '$bike_maxload',
  bike_seats        = '$bike_seats',
  bike_tyres        = '$bike_tyres',
  bike_price        = '$bike_price',
  status            = '$status'
  WHERE bike_id=$bike_id");


if($q){
  echo "<div class='alert alert-dismissible' style='background-color: green; color: white;' role='alert'> ✔ Record add successfully.</div>";
}
else{ 
  echo "<div class='alert alert-dismissible' style='background-color: red; color: white;' role='alert'> ❌ Wrong or mismatch!</div>";
}
}
?>

<?php
$q = mysqli_query($con,"SELECT *  FROM sms_bikes WHERE bike_id=$bike_id");
$r=mysqli_fetch_assoc($q);
?>

<div class="container border">
<br>
<form name="form1" method="POST" action="">
  <div class="mb-3">
    <select class="form-select" id="models1" name="model_id" aria-label="Default select example">
      <option selected>Model</option>
    <?php
    $qm = mysqli_query($con,"SELECT model_id,model_name FROM sms_models WHERE brand_id=$brand_id");
    while($rm=mysqli_fetch_array($qm)){ ?>
      <option value="<?php echo $rm['model_id']; ?>" 
        <?php if($rm['model_id']==$r['model_id']){echo "Selected";} ?>
      > 
        <?php echo $rm['model_name']; ?></option>
    <?php 
    }
    ?>
    </select>
    <small id="small">Please select Model</small>
  </div>
  <div class="mb-3">
      <input type="text" name="bike_engine_no" class="form-control" id="text" placeholder="Engine No" aria-describedby="presentaddressHelp" value="<?php echo $r['bike_engine_no'];?>" required>
  </div>
  <div class="mb-3">
      <input type="text" name="bike_chassis_no" class="form-control" id="text" placeholder="Chassis No" aria-describedby="presentaddressHelp" value="<?php echo $r['bike_chassis_no'];?>" required>
  </div>
  <div class="mb-3">
      <input type="text" name="bike_bhp" class="form-control" id="text" placeholder="Horse Power (BHP)" aria-describedby="presentaddressHelp" value="<?php echo $r['bike_bhp'];?>" required>
  </div>
  <div class="mb-3">
      <input type="text" name="bike_color" class="form-control" id="text" placeholder="Bike Color" aria-describedby="presentaddressHelp" value="<?php echo $r['bike_color'];?>" required>
  </div>
  <div class="mb-3">
      <input type="text" name="bike_color" class="form-control" id="text" placeholder="C.C" aria-describedby="presentaddressHelp" value="<?php echo $r['bike_cc'];?>" maxlength="3" required>
      <small id="small">Please enter number only (Ex: 112)</small>
  </div>
  <div class="mb-3">
      <input type="text" name="bike_cylinder" class="form-control" id="text" placeholder="Cylinder" aria-describedby="presentaddressHelp" value="<?php echo $r['bike_cylinder'];?>" required>
  </div>
  <div class="mb-3">
    <select class="form-select" id="models1" name="country_id" aria-label="Default select example">

        <?php
        $qc = mysqli_query($con,"SELECT country_id,country_name FROM sms_country WHERE status=1");
        while($rc=mysqli_fetch_array($qc)){ ?>

        <option value="<?php echo $rc['country_id']; ?>"
            <?php if($rc['country_id']==$r['country_id']){echo "Selected";} ?>
          > <?php echo $rc['country_name']; ?></option>

        <?php 
        }
        ?>
    </select>
    <small id="small">Please select Manufacture Country</small>
  </div>
  <div class="mb-3">
      <input type="text" name="bike_yom" class="form-control" id="text" placeholder="Year of Manufacture" aria-describedby="presentaddressHelp" value="<?php echo $r['bike_yom'];?>" maxlength="4" required>
      <small id="small">Please enter year only (Ex: 2018)</small>
  </div>
  <div class="mb-3">
      <input type="text" name="bike_weight" class="form-control" id="text" placeholder="Weight" aria-describedby="presentaddressHelp" value="<?php echo $r['bike_weight'];?>" required>
  </div>
  <div class="mb-3">
      <input type="text" name="bike_fuel" class="form-control" id="text" placeholder="Fuel Used" aria-describedby="presentaddressHelp" value="<?php echo $r['bike_fuel'];?>" required>
  </div>
  <div class="mb-3">
      <input type="text" name="bike_rpm" class="form-control" id="text" placeholder="RPM" aria-describedby="presentaddressHelp" value="<?php echo $r['bike_rpm'];?>" required>
      <small id="small">Please enter number only (Ex: 5000)</small>
  </div>
  <div class="mb-3">
      <input type="text" name="bike_wb" class="form-control" id="text" placeholder="Wheel Base" aria-describedby="presentaddressHelp" value="<?php echo $r['bike_wb'];?>" required>
  </div>
  <div class="mb-3">
      <input type="text" name="bike_maxload" class="form-control" id="text" placeholder="Maximum Laden" aria-describedby="presentaddressHelp" value="<?php echo $r['bike_maxload'];?>" required>
  </div>
  <div class="mb-3">
      <input type="text" name="bike_seats" class="form-control" id="text" placeholder="Seating Capacity" aria-describedby="presentaddressHelp" value="<?php echo $r['bike_seats'];?>" required>
  </div>
  <div class="mb-3">
      <input type="text" name="bike_tyres" class="form-control" id="text" placeholder="Tyre Size" aria-describedby="presentaddressHelp" value="<?php echo $r['bike_tyres'];?>" required>
  </div>
  <div class="mb-3">
      <input type="text" name="bike_price" class="form-control" id="text" placeholder="Purchase Price" aria-describedby="presentaddressHelp" value="<?php echo $r['bike_price'];?>" maxlength="6" required>
      <small id="small">Please enter number only (Ex: 200000)</small>
  </div>
  <div class="mb-3">
      <label>Active</label>
      <input type="radio" name="status" value="1" <?php if($r['status']==1){echo " checked";}?>> yes 
      <input type="radio" name="status" value="0" <?php if($r['status']==0){echo " checked";}?>> no
  </div>

  <button type="submit" name="update" value="Submit" class="btn btn-primary btn-block">Update</button>

  <div class="mb-3 text-center">
  <a title="Back to previous page" href="javascript:history.back()"><button type="button" class="btn btn-dark btn-sm">Back To Previous</button></a>
  </div>
  <br><br>
</form>
</div>

<?php
}else{
  echo "You don't have permission to change this";
  //exit;
}
?>