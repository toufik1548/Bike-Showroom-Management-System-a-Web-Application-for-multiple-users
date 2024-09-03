<br>
<h4 class="fw-bold">Add Model</h4>

<?php
if (isset($_POST["submit"])) {

$model_name = addslashes(trim($_POST["model_name"]));
$brand_id   = $_POST["brand_id"];


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
  "INSERT INTO 
  `sms_models` (
    `brand_id`, 
    `model_name`, 
    `status`
    )

     VALUES ( 
      '$brand_id', 
      '$model_name', 
      '1'
      );");


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
    <select class="form-select" id="models1" name="brand_id">
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
      <input type="text" name="model_name" class="form-control" id="text" placeholder="Enter Models Name" value="<?php echo isset($model_name) ? htmlspecialchars($model_name) : ''; ?>" aria-describedby="modelnameHelp">
      <small id="small">* Please Enter Models Name</small>
  </div>
      <button type="submit" name="submit" value="Submit" class="btn btn-primary btn-block">Submit</button>
      <br><br>

</form>
</div>

