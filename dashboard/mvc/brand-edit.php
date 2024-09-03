<br>
<h4 class="fw-bold">Brand Edit</h4>
<?php

$brand_id=$slug2;

if (isset($_POST["update"])) {

$brand_name         = addslashes($_POST["brand_name"]);
$brand_manufcturer  = addslashes($_POST["brand_manufcturer"]);
$status             = addslashes($_POST["status"]);


  // Display error msg
  $err = array();

  if($brand_name == '')
    { $err[]="Please enter brand name";}

  if($brand_manufcturer == '')
    { $err[]="Please enter brand manufcturer";}

  if($file_name == '')
    { $err[]="Please enter file name";}
  

  $n = count($err);

if($n > 0) {
  $msg = "<div class=\"alert alert-danger\" role=\"alert\"><ol>";
  for($i=0; $i < $n; $i++)
    { $msg .= "<li>".$err[$i]."</li>"; }
  $msg .= "</ol></div>";
  $_SESSION['msg'] = $msg;
}else{

$q=mysqli_query($con, 
  "UPDATE `sms_brands` SET 
  brand_name          = '$brand_name',
  brand_manufcturer   = '$brand_manufcturer',
  status              = '$status'
  WHERE brand_id=$brand_id");

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
$q = mysqli_query($con,"SELECT *  FROM sms_brands WHERE brand_id=$brand_id");
$r = mysqli_fetch_assoc($q);
?>
<div class="container border">
<br>
<form name="form1" method="POST" action="">
  <div class="mb-3">
      <input type="text" name="brand_name" class="form-control" id="text" placeholder="Brand Name" value="<?php echo $r['brand_name'];?>">
  </div>

  <div class="mb-3">
      <input type="text" name="brand_manufcturer" class="form-control" id="text" placeholder="Brand Manufcturer" value="<?php echo $r['brand_manufcturer'];?>">
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