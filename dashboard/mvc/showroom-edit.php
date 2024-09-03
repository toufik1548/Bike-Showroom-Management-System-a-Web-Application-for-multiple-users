<br>
<h4 class="fw-bold">Showroom Edit</h4>
<?php

$user_id=$slug2;

if (isset($_POST["update"])) {

$showroom_name              = addslashes($_POST["showroom_name"]);
$user_mobile                = addslashes($_POST["user_mobile"]);
$user_password              = addslashes($_POST["user_password"]);
$brand_id                   = intval($_POST["brand_id"]); // Assuming brand_id is an integer
$showroom_address           = addslashes($_POST["showroom_address"]);
$location_id                = intval($_POST["location_id"]); // Assuming location_id is an integer
$showroom_phones            = addslashes($_POST["showroom_phones"]);
$showroom_email             = filter_var($_POST["showroom_email"], FILTER_SANITIZE_EMAIL);
$showroom_owner_name        = addslashes($_POST["showroom_owner_name"]);
$showroom_owner_mobile      = addslashes($_POST["showroom_owner_mobile"]);
$showroom_owner_password    = addslashes($_POST["showroom_owner_password"]);
$add_datetime               = $_POST["add_datetime"];
$update_datetime            = $_POST["update_datetime"];
$start_datetime             = $_POST["start_datetime"];
$expire_datetime            = $_POST["expire_datetime"];
$status                     = addslashes($_POST["status"]);



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
  "UPDATE `sms_users` SET 
  showroom_name             = '$showroom_name',
  user_mobile               = 'user_mobile',
  brand_id                  = 'brand_id',
  showroom_address          = 'showroom_address',
  location_id               = 'location_id',
  showroom_phones           = 'showroom_phones',
  showroom_email            = 'showroom_email',
  showroom_owner_name       = 'showroom_owner_name',
  showroom_owner_mobile     = 'showroom_owner_mobile',
  showroom_owner_password   = 'showroom_owner_password',
  add_datetime              = 'add_datetime',
  update_datetime           = 'update_datetime',
  start_datetime            = 'start_datetime',
  expire_datetime           = 'expire_datetime',
  status                    = '$status'
  WHERE user_id = $user_id");

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

<?php
$q = mysqli_query($con,"SELECT *  FROM sms_users WHERE user_id=$user_id");
$r = mysqli_fetch_assoc($q);
?>
<div class="container border">
<br>
<form name="form1" method="POST" action="">
  <div class="mb-3">
      <input type="text" name="showroom_name" class="form-control" id="text" placeholder="Showroom Name" value="<?php echo $r['showroom_name'];?>">
  </div>
  <div class="mb-3">
      <input type="number" name="user_mobile" class="form-control" id="number" placeholder="User Mobile No" value="<?php echo $r['user_mobile'];?>">
  </div>
  <div class="mb-3">
      <input type="text" name="user_password" class="form-control" id="number" placeholder="User password" value="<?php echo $r['user_password'];?>">
  </div>
  <div class="mb-3">
    <select class="form-select" id="models1" name="brand_id" aria-label="Default select example">
      <option selected>Select Brand</option>
    <?php
    $qm = mysqli_query($con,"SELECT brand_id,brand_name FROM sms_brands WHERE status=1");
    while($rm=mysqli_fetch_array($qm)){ ?>

      <option value="<?php echo $rm['brand_id']; ?>" 
        <?php if($rm['brand_id']==$r['brand_id']){echo "Selected";} ?>
      > 
    <?php echo $rm['brand_name']; ?></option>

    <?php 
    }
    ?>
    </select>
    <small id="small">Please select Brand</small>
  </div>
  <div class="mb-3">
      <input type="text" name="showroom_address" class="form-control" id="text" placeholder="Showroom Address" value="<?php echo $r['showroom_address'];?>">
  </div>
  <div class="mb-3">
    <select class="form-select" id="models1" name="location_id" aria-label="Default select example">
      <option selected>Select Location</option>
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
    <small id="small">Please select Location</small>
  </div>
  <div class="mb-3">
      <input type="text" name="showroom_phones" class="form-control" id="text" placeholder="Showroom Mobiles" value="<?php echo $r['showroom_phones'];?>">
  </div>
  <div class="mb-3">
      <input type="text" name="showroom_email" class="form-control" id="text" placeholder="Showroom Email" value="<?php echo $r['showroom_email'];?>">
  </div> 
  <div class="mb-3">
      <input type="text" name="showroom_owner_name" class="form-control" id="text" placeholder="Showroom Owner Name" value="<?php echo $r['showroom_owner_name'];?>">
  </div>
  <div class="mb-3">
      <input type="number" name="showroom_owner_mobile" class="form-control" id="number" placeholder="Showroom Owner Name" value="<?php echo $r['showroom_owner_mobile'];?>">
  </div>
  <div class="mb-3">
      <input type="text" name="showroom_owner_password" class="form-control" id="text" placeholder="Showroom Owner Name" value="<?php echo $r['showroom_owner_password'];?>">
  </div>
  <div class="mb-3">
      <input type="date" name="add_datetime" class="form-control" id="date" placeholder="Add Date Time" value="<?php echo $r['add_datetime'];?>">
      <small>* Please Enter ADD Date Time</small>
  </div>
  <div class="mb-3">
      <input type="date" name="update_datetime" class="form-control" id="date" placeholder="Update Date Time" value="<?php echo $r['update_datetime'];?>">
      <small>* Please Enter Update Date Time</small>
  </div>
  <div class="mb-3">
      <input type="date" name="start_datetime" class="form-control" id="date" placeholder="Start Date Time" value="<?php echo $r['start_datetime'];?>">
      <small>* Please Enter Start Date Time</small>
  </div>
  <div class="mb-3">
      <input type="date" name="expire_datetime" class="form-control" id="date" placeholder="Expire Date Time" value="<?php echo $r['expire_datetime'];?>">
      <small>* Please Expire Date Time</small>
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