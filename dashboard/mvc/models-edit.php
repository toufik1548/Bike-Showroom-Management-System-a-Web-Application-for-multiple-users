<br>
<h4 class="fw-bold">Edit Model</h4>
<?php
$model_id=$slug2;

if (isset($_POST["update"])) {

$model_name=addslashes($_POST["model_name"]);
$status=addslashes($_POST["status"]);

  // Display error msg
  $err = array();

  if($brand_id == '')
    { $err[]="Please select brand";}

  if($model_name == '')
    { $err[]="Please enter model name";}
  

  $n = count($err);

if($n > 0) {
  $msg = "<div class=\"alert alert-danger\" role=\"alert\"><ol>";
  for($i=0; $i < $n; $i++)
    { $msg .= "<li>".$err[$i]."</li>"; }
  $msg .= "</ol></div>";
  $_SESSION['msg'] = $msg;
}else{



$q=mysqli_query($con, 
  "UPDATE `sms_models` SET 
  model_name  ='$model_name',
  status      ='$status'
  WHERE model_id=$model_id");

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
$q = mysqli_query($con,"SELECT *  FROM sms_models WHERE model_id=$model_id");
$r=mysqli_fetch_assoc($q);
?>
<div class="container border">
<br>
<form name="form1" method="POST" action="">
  <div class="mb-3">
      <input type="text" name="model_name" class="form-control" id="text" placeholder="Model Name" aria-describedby="modelnameHelp" value="<?php echo $r['model_name'];?>">
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