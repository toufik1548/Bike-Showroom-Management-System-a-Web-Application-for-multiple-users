<br>
<h4 class="fw-bold p-2 text-center bg-secondary" style="color: white;">Add Client</h4>

<?php
if (isset($_POST["submit"])) {

$client_name            = addslashes($_POST["client_name"]);
$client_village         = addslashes($_POST["client_village"]);
$location_id            = $_POST["location_id"];
$client_per_village     = addslashes($_POST["client_per_village"]);
$location_per_id        = $_POST["location_per_id"];
$gender_id              = $_POST["gender_id"];
$client_phone           = addslashes($_POST["client_phone"]);
$client_nationality     = addslashes($_POST["client_nationality"]);
$client_dob             = $_POST["client_dob"];

if($client_dob==""){$client_dob="1900-01-01";}else{$client_dob=$client_dob;}

$client_nid             = $_POST["client_nid"];
$client_etin            = $_POST["client_etin"];
$client_gurdian_name    = addslashes($_POST["client_gurdian_name"]);
$client_mother_name     = addslashes($_POST["client_mother_name"]);
$client_spouse_name     = addslashes($_POST["client_spouse_name"]);
$client_bank            = addslashes($_POST["client_bank"]);
$client_bike_reg_no     = $_POST["client_bike_reg_no"];
$add_date               = date('Y-m-d');



  // Display error msg
  $err = array();

  if($client_name == '')
    { $err[]="Please enter Name";}

  if($client_gurdian_name == '')
    { $err[]="Please enter Gurdian Name";}

  if($client_mother_name == '')
    { $err[]="Please enter Mother Name";}

  if($client_spouse_name == '')
    { $err[]="Please enter Spouse Name";}

  if($client_village== '')
    { $err[]="Please enter Present Address";}

  if($location_id == '')
    { $err[]="Please select preasent city";}

  if($client_per_village == '')
    { $err[]="Please enter Permanent Address";}

  if($location_per_id== '')
    { $err[]="Please select Permanent city";}

  if($gender_id == '')
    { $err[]="Please select Gender";}

  if($client_phone== '')
    { $err[]="Please enter Phone";}

  if($client_nationality== '')
    { $err[]="Please enter Nationality";}

  if($client_dob == '')
    { $err[]="Please enter Date of Birth";}

  if($client_nid== '')
    { $err[]="Please enter NID No";}

  if($client_etin == '')
    { $err[]="Please enter e-TIN No";}

  if($client_bank== '')
    { $err[]="Please enter Bank Name";}

  if($client_bike_reg_no== '')
    { $err[]="Please enter Bike Regestration No";}


  $n = count($err);

  if($n > 0) {
    $msg = "<div class=\"alert alert-danger\" role=\"alert\"><ol>";
    for($i=0; $i < $n; $i++)
      { $msg .= "<li>".$err[$i]."</li>"; }
    $msg .= "</ol></div>";
    $_SESSION['msg'] = $msg;
  }else{


$q=mysqli_query($con, 
  "INSERT INTO `sms_clients` (`client_id`, `user_id`, `client_name`, `client_village`, `client_po`, `client_ps`, `location_id`, `client_per_village`, `client_per_po`, `client_per_ps`, `location_per_id`, `gender_id`, `client_phone`, `client_nationality`, `client_dob`, `client_nid`, `client_etin`, `client_gurdian_name`, `client_mother_name`, `client_spouse_name`, `client_bank`, `client_bike_reg_no`, `add_date`, `status`) VALUES (NULL, '$logged_user_id', '$client_name', '$client_village', 'N/A', 'N/A', '$location_id', '$client_per_village', 'N/A', 'N/A', '$location_per_id', '$gender_id', '$client_phone', '$client_nationality', '$client_dob', '$client_nid', '$client_etin', '$client_gurdian_name', '$client_mother_name', '$client_spouse_name', '$client_bank', '$client_bike_reg_no', '$add_date', '1')");

$client_id = mysqli_insert_id($con);

if($q){
echo "<div class='alert alert-dismissible' style='background-color: green; color: white;' role='alert'> ✔ Record added successfully.<br></div>";
echo "<a class='btn btn-info' href='".$site_url."/sells-add/". $client_id."/'>Next</a>";

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
    <input type="text" class="form-control" name="client_name" id="client_name" placeholder="Name" value="<?php echo isset($client_name) ? htmlspecialchars($client_name) : ''; ?>" aria-describedby="nameHelp">
  </div>
  <div class="mb-3">
    <input type="text" class="form-control" name="client_gurdian_name" id="client_gurdian_name" placeholder="Gurdian Name" value="<?php echo isset($client_gurdian_name) ? htmlspecialchars($client_gurdian_name) : ''; ?>" aria-describedby="gurdianNameHelp">
  </div>
  <div class="mb-3">
    <input type="text" class="form-control" name="client_mother_name" id="client_mother_name" placeholder="Mother Name" value="<?php echo isset($client_mother_name) ? htmlspecialchars($client_mother_name) : ''; ?>" aria-describedby="motherNameHelp">
  </div>
  <div class="mb-3">
    <input type="text" class="form-control" name="client_spouse_name" id="client_spouse_name" placeholder="Spouse Name" value="<?php echo isset($client_spouse_name) ? htmlspecialchars($client_spouse_name) : ''; ?>" aria-describedby="spouseNameHelp">
  </div>
  <div class="mb-3">
    <input type="text" class="form-control" name="client_village" id="client_village" placeholder="Present Address" value="<?php echo isset($client_village) ? htmlspecialchars($client_village) : ''; ?>" aria-describedby="preasentAddressHelp">
  </div>
  <div class="mb-3">
    <select class="form-select" id="location_id" name="location_id" aria-label="Default select example">
      <option selected>Select Preasent City</option>
      <?php
        $qm = mysqli_query($con,"SELECT location_id,location_name FROM sms_locations WHERE status=1");
        while($rm=mysqli_fetch_array($qm)){ 
          $location_id = $rm['location_id'];
        ?>  
      <option value="<?php echo $location_id; ?>" <?php echo (empty($location_id) ? 'selected' : ''); ?>> <?php echo $rm['location_name']; ?></option>
      <?php 
      }
      ?>
    </select>
  </div>
  <div class="mb-3">
    <input type="text" class="form-control" name="client_per_village" id="client_per_village" placeholder="Permanent Address" value="<?php echo isset($client_per_village) ? htmlspecialchars($client_per_village) : ''; ?>" aria-describedby="preasentAddressHelp">
  </div>
  <div class="mb-3">
    <select class="form-select" id="location_per_id" name="location_per_id" aria-label="Default select example">
      <option selected>Select Permanent City</option>
      <?php
        $qm = mysqli_query($con,"SELECT location_id,location_name FROM sms_locations WHERE status=1");
        while($rm=mysqli_fetch_array($qm)){ 
          $location_id = $rm['location_id'];
        ?>
      <option value="<?php echo $rm['location_id']; ?>" <?php echo (empty($location_id) ? 'selected' : ''); ?>> <?php echo $rm['location_name']; ?></option>
      <?php 
      }
      ?>
    </select>
  </div>
  <div class="mb-3">
    <select class="form-select" id="gender_id" name="gender_id" aria-label="Default select example">
      <option selected>Select Gender</option>
      <?php
        $qm = mysqli_query($con,"SELECT gender_id,gender_name FROM sms_genders WHERE status=1");
        while($rm=mysqli_fetch_array($qm)){ 
          $gender_id = $rm['gender_id'];
        ?>
      <option value="<?php echo $gender_id; ?>" <?php echo (empty($gender_id) ? 'selected' : ''); ?>> <?php echo $rm['gender_name']; ?></option>
      <?php 
      }
      ?>
    </select>
  </div>
  <div class="mb-3">
    <input type="number" class="form-control" name="client_phone" id="client_phone" placeholder="Phone" maxlength="11" value="<?php echo isset($client_phone) ? htmlspecialchars($client_phone) : ''; ?>" aria-describedby="phoneNumbweHelp">
    <small id="small">* Please Enter Phone Number (Ex: 01720667286)</small>
  </div>
  <div class="mb-3">
    <input type="text" class="form-control" name="client_nationality" id="client_nationality" placeholder="Nationality" value="BANGLADESHI" value="<?php echo isset($client_nationality) ? htmlspecialchars($client_nationality) : ''; ?>" aria-describedby="nationalityHelp">
  </div>
  <div class="mb-3">
    <input type="date" class="form-control" name="client_dob" id="client_dob" value="" placeholder="Date of Birth" value="<?php echo isset($client_dob) ? htmlspecialchars($client_dob) : ''; ?>" aria-describedby="preasentAddressHelp">
    <small id="small">* Please select Date of birth</small>
  </div>
  <div class="mb-3">
    <input type="number" class="form-control" name="client_nid" id="client_nid" placeholder="NID NO" maxlength="30" value="<?php echo isset($client_nid) ? htmlspecialchars($client_nid) : ''; ?>" aria-describedby="nidHelp">
    <small id="small">* Please Enter NID Number</small>
  </div>
  <div class="mb-3">
    <input type="number" class="form-control" name="client_etin" id="client_etin" placeholder="e-TIN NO" maxlength="30" value="<?php echo isset($client_etin) ? htmlspecialchars($client_etin) : ''; ?>" aria-describedby="etinHelp">
    <small id="small">* Please Enter e-TIN Number </small>
  </div>
  <div class="mb-3">
    <input type="text" class="form-control" name="client_bank" id="client_bank" placeholder="Bank Name" maxlength="30" value="<?php echo isset($client_bank) ? htmlspecialchars($client_bank) : ''; ?>" aria-describedby="banknameHelp">
  </div>
  <div class="mb-3">
    <input type="text" class="form-control" name="client_bike_reg_no" id="client_bike_reg_no" placeholder="Vechile Reg NO" maxlength="30" value="<?php echo isset($client_bike_reg_no) ? htmlspecialchars($client_bike_reg_no) : ''; ?>" aria-describedby="vechileregnoHelp">
  <small id="small">* Please Enter Client Vechile Reg NO</small> 
  </div>
  
  <br>

  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  <br><br>
</form>

</div>

