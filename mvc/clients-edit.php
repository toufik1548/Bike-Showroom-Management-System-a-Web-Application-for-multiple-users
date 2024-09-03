<br>
<h4 class="fw-bold">Edit Client</h4>

<?php
$client_id = $slug2;
$user_id   = get_info("sms_clients","user_id","WHERE client_id=$client_id");

if ($user_id == $logged_user_id) {
  if (isset($_POST["update"])) {

    $client_name          = addslashes($_POST["client_name"]);
    $client_village       = addslashes($_POST["client_village"]);
    $client_gurdian_name  = addslashes($_POST["client_gurdian_name"]);
    $client_mother_name   = addslashes($_POST["client_mother_name"]);
    $client_spouse_name   = addslashes($_POST["client_spouse_name"]);
    $location_id          = $_POST["location_id"];
    $client_per_village   = addslashes($_POST["client_per_village"]);
    $location_per_id      = $_POST["location_per_id"];
    $gender_id            = $_POST["gender_id"];
    $client_phone         = addslashes($_POST["client_phone"]);
    $client_nationality   = addslashes($_POST["client_nationality"]);
    $client_dob           = $_POST["client_dob"];

    if ($client_dob == "") {$client_dob = "1900-01-01";} else {$client_dob = $client_dob;}

    $client_nid           = $_POST["client_nid"];
    $client_etin          = $_POST["client_etin"];
    $client_bank          = addslashes($_POST["client_bank"]);
    $client_bike_reg_no   = $_POST["client_bike_reg_no"];
    $status               = addslashes($_POST["status"]);

    $q = mysqli_query($con, "UPDATE `sms_clients` SET 
  client_name         = '$client_name',
  client_village      = '$client_village',
  client_gurdian_name = '$client_gurdian_name',
  client_mother_name  = '$client_mother_name',
  client_spouse_name  = '$client_spouse_name',
  location_id         = '$location_id',
  client_per_village  = '$client_per_village',
  location_per_id     = '$location_per_id',
  gender_id           = '$gender_id',
  client_phone        = '$client_phone',
  client_nationality  = '$client_nationality',
  client_dob          = '$client_dob',
  client_nid          = '$client_nid',
  client_etin         = '$client_etin',
  client_bank         = '$client_bank',
  client_bike_reg_no  = '$client_bike_reg_no',
  status              = '$status'
  WHERE client_id=$client_id");


  if($q){
    echo "<div class='alert alert-dismissible' style='background-color: green; color: white;' role='alert'> ✔ Record add successfully.</div>";
  }
  else{ 
    echo "<div class='alert alert-dismissible' style='background-color: red; color: white;' role='alert'> ❌ Wrong or mismatch!</div>";
  }
  }
?>


<?php
$q = mysqli_query($con,"SELECT *  FROM sms_clients WHERE client_id=$client_id");
$r=mysqli_fetch_assoc($q);
?>

<div class="container border">
<br>
<form name="form1" method="POST" action="">
  <div class="mb-3">
      <input type="text" name="client_name" class="form-control" id="text" placeholder="Clients Name" aria-describedby="clientsnameHelp" value="<?php echo $r['client_name'];?>">
  </div>
  <div class="mb-3">
      <input type="text" name="client_gurdian_name" class="form-control" id="text" placeholder="Gurdian Name" aria-describedby="gurdiannameHelp" value="<?php echo $r['client_gurdian_name'];?>">
  </div>
  <div class="mb-3">
      <input type="text" name="client_mother_name" class="form-control" id="text" placeholder="Mother Name" aria-describedby="mothernameHelp" value="<?php echo $r['client_mother_name'];?>">
  </div>
  <div class="mb-3">
      <input type="text" name="client_spouse_name" class="form-control" id="text" placeholder="Spouse Name" aria-describedby="spousenameHelp" value="<?php echo $r['client_spouse_name'];?>">
  </div>
  <div class="mb-3">
      <input type="text" name="client_village" class="form-control" id="text" placeholder="Present Address" aria-describedby="presentaddressHelp" value="<?php echo $r['client_village'];?>">
  </div>
  <div class="mb-3">
    <select class="form-select" id="models1" name="location_id" aria-label="Default select example">
      <option selected>Present City</option>
    <?php
    $qm = mysqli_query($con,"SELECT location_id,location_name FROM sms_locations WHERE status=1");
    while($rm=mysqli_fetch_array($qm)){ ?>

      <option value="<?php echo $rm['location_id']; ?>" 
        <?php if($rm['location_id']==$r['location_id']){echo "Selected";} ?>
      > 
    <?php echo $rm['location_name']; ?></option>

    <?php 
    }
    ?>
    </select>
    <small id="small">Please select preasent city</small>
  </div>
  <div class="mb-3">
      <input type="text" name="client_per_village" class="form-control" id="text" placeholder="Permanent Address" aria-describedby="permanentaddressHelp" value="<?php echo $r['client_per_village'];?>">
  </div>
  <div class="mb-3">
    <select class="form-select" id="models1" name="location_per_id" aria-label="Default select example">
      <option selected>Permanent City</option>
    <?php
    $qm = mysqli_query($con,"SELECT location_id,location_name FROM sms_locations WHERE status=1");
    while($rm=mysqli_fetch_array($qm)){ ?>
      <option value="<?php echo $rm['location_id']; ?>" 
        <?php if($rm['location_id']==$r['location_per_id']){echo "Selected";} ?>
      > 
    <?php echo $rm['location_name']; ?></option>
    <?php 
    }
    ?>
    </select>
    <small id="small">Please select permanent city</small>
  </div>
  <div class="mb-3">
      <input type="text" name="client_nationality" class="form-control" id="text" placeholder="Nationality" aria-describedby="permanentaddressHelp" value="<?php echo $r['client_nationality'];?>">
  </div>
  <div class="mb-3">
      <input type="number" name="client_phone" class="form-control" id="number" placeholder="Phone" aria-describedby="permanentaddressHelp" value="<?php echo $r['client_phone'];?>" maxlength="20">
      <small>* Please Enter 11 Digits Phone Number Only (Ex: 01720667286)</small>
  </div>
  <div class="mb-3">
      <input type="date" name="client_dob" class="form-control" id="date" placeholder="Date of Birth" aria-describedby="permanentaddressHelp" value="<?php echo $r['client_dob'];?>">
      <small>* Please Enter date of birth</small>
  </div>
  <div class="mb-3">
      <input type="number" name="client_nid" class="form-control" id="number" placeholder="NID" aria-describedby="permanentaddressHelp" value="<?php echo $r['client_nid'];?>" maxlength="30" required>
  </div>
  <div class="mb-3">
      <input type="number" name="client_etin" class="form-control" id="number" placeholder="e-TIN" aria-describedby="permanentaddressHelp" value="<?php echo $r['client_etin'];?>" maxlength="30">
  </div>
  <div class="mb-3">
    <select class="form-select" id="models1" name="gender_id" aria-label="Default select example">
      <option selected>Gender</option>
    <?php
    $qm = mysqli_query($con,"SELECT gender_id,gender_name FROM sms_genders WHERE status=1");
    while($rm=mysqli_fetch_array($qm)){ ?>

      <option value="<?php echo $rm['gender_id']; ?>" 
        <?php if($rm['gender_id']==$r['gender_id']){echo "Selected";} ?>
      > 
        <?php echo $rm['gender_name']; ?></option>
    <?php 
    }
    ?>
    </select>
    <small id="small">Please select gender</small>
  </div>
  <div class="mb-3">
      <input type="text" name="client_bank" class="form-control" id="text" placeholder="Clients Bank" aria-describedby="permanentaddressHelp" value="<?php echo $r['client_bank'];?>">
  </div>
  <div class="mb-3">
      <input type="number" name="client_bike_reg_no" class="form-control" id="number" placeholder="Bike Reg No" aria-describedby="permanentaddressHelp" value="<?php echo $r['client_bike_reg_no'];?>" maxlength="10">
  </div>
  <div class="mb-3">
      <label>Active</label>
      <input type="radio" name="status" value="1" <?php if($r['status']==1){echo " checked";}?>> yes 
      <input type="radio" name="status" value="0" <?php if($r['status']==0){echo " checked";}?>> no
  </div>

<button type="submit" name="update" value="Submit" class="btn btn-primary btn-block">Update</button>
<br>

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