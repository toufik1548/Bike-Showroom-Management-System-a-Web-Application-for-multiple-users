<br>
<h4 class="fw-bold">Add Bike</h4>

<?php
$user_id  = $logged_user_id;
$brand_id = get_info("sms_users","brand_id","WHERE user_id=$user_id");

if (isset($_POST["submit"])) {

$model_id         = $_POST["model_id"];
$bike_engine_no   = addslashes($_POST["bike_engine_no"]);
$bike_chassis_no  = addslashes($_POST["bike_chassis_no"]);
$bike_bhp         = addslashes($_POST["bike_bhp"]);
$bike_color       = addslashes($_POST["bike_color"]);
$bike_cc          = addslashes($_POST["bike_cc"]);
$bike_cylinder    = addslashes($_POST["bike_cylinder"]);
$country_id       = $_POST["country_id"];
$bike_yom         = addslashes($_POST["bike_yom"]);
$bike_weight      = addslashes($_POST["bike_weight"]);
$bike_fuel        = addslashes($_POST["bike_fuel"]);
$bike_rpm         = addslashes($_POST["bike_rpm"]);
$bike_wb          = addslashes($_POST["bike_wb"]);
$bike_maxload     = addslashes($_POST["bike_maxload"]);
$bike_seats       = addslashes($_POST["bike_seats"]);
$bike_tyres       = addslashes($_POST["bike_tyres"]);
$bike_price       = addslashes($_POST["bike_price"]);

  // Display error msg
  $err = array();

  if($model_id == '')
    { $err[]="Please select Model";}

  if($bike_engine_no == '')
    { $err[]="Please enter Engine No";}

  if($bike_chassis_no == '')
    { $err[]="Please enter Chassis No";}

  if($bike_bhp == '')
    { $err[]="Please enter Horse Power (BHP)";}

  if($bike_color== '')
    { $err[]="Please enter Bike Color";}

  if($bike_cc == '')
    { $err[]="Please enter C.C";}

  if($bike_cylinder== '')
    { $err[]="Please enter Bike Cylinder";}

  if($country_id == '')
    { $err[]="Please select Manufacture Country";}

  if($bike_yom== '')
    { $err[]="Please enter Year of Manufacture Date";}

  if($bike_weight== '')
    { $err[]="Please enter Weight";}

  if($bike_fuel == '')
    { $err[]="Please select Fuel Used";}

  if($bike_rpm== '')
    { $err[]="Please enter RPM";}

  if($bike_wb == '')
    { $err[]="Please enter Wheel Base";}

  if($bike_maxload== '')
    { $err[]="Please enter Maximum Laden";}

  if($bike_seats== '')
    { $err[]="Please enter Seating Capacity";}

  if($bike_tyres == '')
    { $err[]="Please enter Tyre Size";}

  if($bike_price== '')
    { $err[]="Please enter Purchase Price";}


  $n = count($err);

  if($n > 0) {
    $msg = "<div class=\"alert alert-danger\" role=\"alert\"><ol>";
    for($i=0; $i < $n; $i++)
      { $msg .= "<li>".$err[$i]."</li>"; }
    $msg .= "</ol></div>";
    $_SESSION['msg'] = $msg;
  }else{


$q=mysqli_query($con, 
  "INSERT INTO `sms_bikes` (`bike_id`, `user_id`, `brand_id`, `model_id`, `bike_engine_no`, `bike_chassis_no`, `bike_bhp`, `bike_color`, `bike_cc`, `bike_cylinder`, `country_id`, `bike_yom`, `bike_weight`, `bike_fuel`, `bike_rpm`, `bike_wb`, `bike_maxload`, `bike_seats`, `bike_tyres`, `bike_price`, `status`) VALUES (NULL, '$logged_user_id', '$brand_id', '$model_id', '$bike_engine_no', '$bike_chassis_no', '$bike_bhp', '$bike_color','$bike_cc', '$bike_cylinder', '$country_id', '$bike_yom', '$bike_weight', '$bike_fuel', '$bike_rpm', '$bike_wb', '$bike_maxload', '$bike_seats', '$bike_tyres', '$bike_price', '1');");


if($q){
  echo "<div class='alert alert-dismissible' style='background-color: green; color: white;' role='alert'> ✔ Record add successfully.</div>";
}
else{ 
  echo "<div class='alert alert-dismissible' style='background-color: red; color: white;' role='alert'> ❌ Wrong or mismatch!</div>";
}
}
}
?>

<?php
  if(isset($_SESSION['msg']))
  {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
  }
?>

<div class="container border bg-light">
<br>
<form name="form1" method="POST" action="">  
  <div class="mb-3">
    <select class="form-select" id="model_id" name="model_id" aria-label="Default select example">
      <option selected>Model</option>
        <?php
        $qm = mysqli_query($con,"SELECT model_id,model_name FROM sms_models WHERE brand_id=$brand_id");
        while($rm=mysqli_fetch_array($qm)){ 
          $model_id = $rm['model_id'];
        ?>

        <option value="<?php echo $model_id; ?>" <?php echo (empty($model_id) ? 'selected' : ''); ?>> <?php echo $rm['model_name']; ?></option>

        <?php 
        }
        ?>
    </select>
  </div>
  <div class="mb-3">
    <input type="text" class="form-control" name="bike_engine_no" id="bike_engine_no" placeholder="Engine No" value="<?php echo isset($bike_engine_no) ? htmlspecialchars($bike_engine_no) : ''; ?>" maxlength="22" required>
  </div>
  <div class="mb-3">
    <input type="text" class="form-control" name="bike_chassis_no" id="bike_chassis_no" placeholder="Chassis No" value="<?php echo isset($bike_chassis_no) ? htmlspecialchars($bike_chassis_no) : ''; ?>" maxlength="28" required>
  </div>
  <div class="mb-3">
    <input type="text" class="form-control" name="bike_bhp" id="bike_bhp" placeholder="Horse Power (BHP)" value="<?php echo isset($bike_bhp) ? htmlspecialchars($bike_bhp) : ''; ?>" maxlength="10" required>
  </div>
  <div class="mb-3">
    <input type="text" class="form-control" name="bike_color" id="bike_color" placeholder="Bike Color" value="<?php echo isset($bike_color) ? htmlspecialchars($bike_color) : ''; ?>" maxlength="18" required>
  </div>
  <div class="mb-3">
    <input type="number" class="form-control" name="bike_cc" id="bike_cc" placeholder="C.C" value="<?php echo isset($bike_cc) ? htmlspecialchars($bike_cc) : ''; ?>" maxlength="3" required>
    <small id="small">Please enter number only (Ex: 112)</small>
  </div>
  <div class="mb-3">
    <input type="number" class="form-control" name="bike_cylinder" id="bike_cylinder" placeholder="Cylinder" value="<?php echo isset($bike_cylinder) ? htmlspecialchars($bike_cylinder) : ''; ?>" maxlength="2" required>
  </div>
  <div class="mb-3">
    <select class="form-select" id="country_id" name="country_id" aria-label="Default select example">

        <?php
        $qc = mysqli_query($con,"SELECT country_id,country_name FROM sms_country WHERE status=1");
        while($rc=mysqli_fetch_array($qc)){ 
          $country_id = $rc['country_id'];
        ?>

        <option value="<?php echo $country_id; ?>" <?php echo (empty($country_id) ? 'selected' : ''); ?>> <?php echo $rc['country_name']; ?></option>

        <?php 
        }
        ?>
    </select>
    <small id="small">Please select Manufacture Country</small>
  </div>
  <div class="mb-3">
    <input type="number" class="form-control" name="bike_yom" id="bike_yom" placeholder="Year of Manufacture" value="<?php echo isset($bike_yom) ? htmlspecialchars($bike_yom) : ''; ?>" maxlength="4" required>
      <small id="small">Please enter year only (Ex: 2018)</small>
  </div>
  <div class="mb-3">
    <input type="text" class="form-control" name="bike_weight" id="bike_weight" placeholder="Weight" value="<?php echo isset($bike_weight) ? htmlspecialchars($bike_weight) : ''; ?>" maxlength="6" required>
  </div>
  <div class="mb-3">
    <input type="text" class="form-control" name="bike_fuel" id="bike_fuel" placeholder="Fuel Used" value="<?php echo isset($bike_fuel) ? htmlspecialchars($bike_fuel) : ''; ?>" required>
  </div>
  <div class="mb-3">
    <input type="number" class="form-control" name="bike_rpm" id="bike_rpm" placeholder="RPM" value="<?php echo isset($bike_rpm) ? htmlspecialchars($bike_rpm) : ''; ?>" required>
      <small id="small">Please enter number only (Ex: 5000)</small>
  </div>
  <div class="mb-3">
    <input type="text" class="form-control" name="bike_wb" id="bike_wb" placeholder="Wheel Base" value="<?php echo isset($bike_wb) ? htmlspecialchars($bike_wb) : ''; ?>" maxlength="6" required>
  </div>
  <div class="mb-3">
    <input type="number" class="form-control" name="bike_maxload" id="bike_maxload" placeholder="Maximum Laden" value="<?php echo isset($bike_maxload) ? htmlspecialchars($bike_maxload) : ''; ?>" maxlength="4" required>
      <small id="small">Please enter Maximum Laden (Ex: 000 KG)</small>
  </div>
  <div class="mb-3">
    <input type="number" class="form-control" name="bike_seats" id="bike_seats" placeholder="Seating Capacity" value="<?php echo isset($bike_seats) ? htmlspecialchars($bike_seats) : ''; ?>" maxlength="2" required>
  </div>
  <div class="mb-3">
    <input type="text" class="form-control" name="bike_tyres" id="bike_tyres" placeholder="Tyre Size" value="<?php echo isset($bike_tyres) ? htmlspecialchars($bike_tyres) : ''; ?>" maxlength="10" required>
  </div>
  <div class="mb-3">
    <input type="number" class="form-control" name="bike_price" id="bike_price" placeholder="Purchase Price" value="<?php echo isset($bike_price) ? htmlspecialchars($bike_price) : ''; ?>" maxlength="7" required>
      <small id="small">Please enter number only (Ex: 200000)</small>
  </div>

  <button type="submit" name="submit" value="Submit" class="btn btn-primary btn-block">Submit</button>
  <br><br>

</form>
</div>
