<br>
<h4 class="fw-bold">Showroom Add</h4>

<?php
if (isset($_POST["submit"])) {

$user_mobile                = addslashes($_POST["user_mobile"]);
$user_password              = addslashes($_POST["user_password"]);
$showroom_name              = addslashes($_POST["showroom_name"]);
$brand_id                   = $_POST["brand_id"];
$showroom_address           = $_POST["showroom_address"];
$location_id                = $_POST["location_id"];
$showroom_phones            = $_POST["showroom_phones"];
$showroom_email             = addslashes($_POST["showroom_email"]);
$showroom_owner_name        = addslashes($_POST["showroom_owner_name"]);
$showroom_owner_mobile      = addslashes($_POST["showroom_owner_mobile"]);
$showroom_owner_password    = addslashes($_POST["showroom_owner_password"]);
$add_datetime               = date('Y-m-d');
$update_datetime            = date('Y-m-d');
$start_datetime             = date('Y-m-d');
$expire_datetime            = date('Y-m-d');



  // Display error msg
  $err = array();

  if($showroom_name == '')
    { $err[]="Please enter Showroom Name";}

  if($user_password == '')
    { $err[]="Please enter user password";}

  if($brand_id == '')
    { $err[]="Please select Brand";}

  if($user_mobile == '')
    { $err[]="Please enter Showroom Mobile";}

  if($showroom_address == '')
    { $err[]="Please enter showroom address";}

  if($location_id== '')
    { $err[]="Please select location";}

  if($showroom_phones == '')
    { $err[]="Please enter showroom phones";}

  if($showroom_email == '')
    { $err[]="Please enter showroom email";}

  if($showroom_owner_name== '')
    { $err[]="Please enter showroom owner name";}

  if($showroom_owner_mobile== '')
    { $err[]="Please enter showroom owner mobile";}

  if($showroom_owner_password== '')
    { $err[]="Please enter showroom owner password";}

  if($add_datetime == '')
    { $err[]="Please add today datetime";}

  if($update_datetime== '')
    { $err[]="Please add update datetime";}

  if($start_datetime== '')
    { $err[]="Please add start datetime";}

  if($expire_datetime == '')
    { $err[]="Please add expire datetime";}


  $n = count($err);

  if($n > 0) {
    $msg = "<div class=\"alert alert-danger\" role=\"alert\"><ol>";
    for($i=0; $i < $n; $i++)
      { $msg .= "<li>".$err[$i]."</li>"; }
    $msg .= "</ol></div>";
    $_SESSION['msg'] = $msg;
  }else{


$q=mysqli_query($con, 
  "INSERT INTO `sms_users` (
  `user_id`, 
  `user_mobile`,
  `user_password`,
  `brand_id`,
  `showroom_name`,
  `showroom_address`,
  `location_id`,
  `showroom_phones`,
  `showroom_email`,
  `showroom_owner_name`,
  `showroom_owner_mobile`,
  `showroom_owner_password`,
  `add_datetime`, 
  `update_datetime`, 
  `start_datetime`,  
  `expire_datetime`, 

  `status`) 
  VALUES (
  NULL,
  '$user_mobile',
  '$user_password',
  '$brand_id',
  '$showroom_name',
  '$showroom_address',
  '$location_id',
  '$showroom_phones',
  '$showroom_email',
  '$showroom_owner_name',
  '$showroom_owner_mobile',
  '$showroom_owner_password',
  '$add_datetime', 
  '$update_datetime',
  '$start_datetime',
  '$expire_datetime',

  '1')");


if($q){
echo "<div class='alert alert-dismissible' style='background-color: green; color: white;' role='alert'> ✔ Record added successfully.<br></div>";

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
    <input type="text" class="form-control" name="showroom_name" id="showroom_name" placeholder="Showroom Name" value="<?php echo isset($showroom_name) ? htmlspecialchars($showroom_name) : ''; ?>">
  </div>

  <div class="mb-3">
    <select class="form-select" id="brand_id" name="brand_id">
      <option selected>Select Brand</option>
      <?php
        $qm = mysqli_query($con,"SELECT brand_id,brand_name FROM sms_brands WHERE status=1");
        while($rm=mysqli_fetch_array($qm)){ 
          $brand_id = $rm['brand_id'];
        ?>  
      <option value="<?php echo $brand_id; ?>" <?php echo (empty($brand_id) ? 'selected' : ''); ?>> <?php echo $rm['brand_name']; ?></option>
      <?php 
      }
      ?>
    </select>
  </div>

  <div class="mb-3">
    <input type="number" class="form-control" name="user_mobile" id="user_mobile" placeholder="Showroom Mobile" value="<?php echo isset($user_mobile) ? htmlspecialchars($user_mobile) : ''; ?>">
  </div>

  <div class="mb-3">
    <input type="text" class="form-control" name="user_password" id="user_password" placeholder="User Password" value="<?php echo isset($user_password) ? htmlspecialchars($user_password) : ''; ?>">
  </div>

  <div class="mb-3">
    <input type="text" class="form-control" name="showroom_address" id="showroom_address" placeholder="Showroom Address" value="<?php echo isset($showroom_address) ? htmlspecialchars($showroom_address) : ''; ?>">
  </div>

  <div class="mb-3">
    <select class="form-select" id="location_id" name="location_id" aria-label="Default select example">
      <option selected>Select Your Location</option>
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
    <input type="text" class="form-control" name="showroom_phones" id="showroom_phones" placeholder="Showroom Another Phone Numbers" value="<?php echo isset($showroom_phones) ? htmlspecialchars($showroom_phones) : ''; ?>">
  </div>


  <div class="mb-3">
    <input type="email" class="form-control" name="showroom_email" id="showroom_email" placeholder="Showroom Email" value="<?php echo isset($showroom_email) ? htmlspecialchars($showroom_email) : ''; ?>">
  </div>

  <div class="mb-3">
    <input type="text" class="form-control" name="showroom_owner_name" id="showroom_owner_name" placeholder="Showroom Owner Name" value="<?php echo isset($showroom_owner_name) ? htmlspecialchars($showroom_owner_name) : ''; ?>">
  </div>

  <div class="mb-3">
    <input type="number" class="form-control" name="showroom_owner_mobile" id="showroom_owner_mobile" placeholder="Showroom Owner Mobile" value="<?php echo isset($showroom_owner_mobile) ? htmlspecialchars($showroom_owner_mobile) : ''; ?>">
  </div>

  <div class="mb-3">
    <input type="text" class="form-control" name="showroom_owner_password" id="showroom_owner_password" placeholder="Showroom Owner Password" value="<?php echo isset($showroom_owner_password) ? htmlspecialchars($showroom_owner_password) : ''; ?>">
  </div>

  <div class="mb-3">
    <input type="date" class="form-control" name="add_datetime" id="add_datetime" placeholder="Add Date Time" value="<?php echo isset($add_datetime) ? htmlspecialchars($add_datetime) : ''; ?>">
    <small id="small">* Please select Today Date</small>
  </div>

  <div class="mb-3">
    <input type="date" class="form-control" name="update_datetime" id="update_datetime" placeholder="Update Date Time" value="<?php echo isset($update_datetime) ? htmlspecialchars($update_datetime) : ''; ?>">
    <small id="small">* Please select Update Date</small>
  </div>

  <div class="mb-3">
    <input type="date" class="form-control" name="start_datetime" id="start_datetime" placeholder="Start Date Time" value="<?php echo isset($start_datetime) ? htmlspecialchars($start_datetime) : ''; ?>">
    <small id="small">* Please select Start Date</small>
  </div>

  <div class="mb-3">
    <input type="date" class="form-control" name="expire_datetime" id="expire_datetime" placeholder="Expire Date Time" value="<?php echo isset($expire_datetime) ? htmlspecialchars($expire_datetime) : ''; ?>">
    <small id="small">* Please select Expire Date</small>
  </div>
  
  <br>

  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  <br><br>
</form>

</div>





