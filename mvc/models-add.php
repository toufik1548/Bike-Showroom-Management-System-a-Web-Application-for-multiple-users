<br>
<h4 class="fw-bold">Add Model</h4>

<?php
if (isset($_POST["submit"])) {

$model_name=addslashes(trim($_POST["model_name"]));
$brand_id=1;

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
  echo "<div class='alert alert-dismissible' style='background-color: green; color: white;' role='alert'> ✔ Record add successfully.</div>";
}
else{ 
  echo "<div class='alert alert-dismissible' style='background-color: red; color: white;' role='alert'> ❌ Wrong or mismatch!</div>";
}
}
?>

<div class="container border bg-light">
  <br>
<form name="form1" method="POST" action="">          
  <div class="mb-3">
      <input type="text" name="model_name" class="form-control" id="text" placeholder="Enter Models Name" aria-describedby="modelnameHelp">
      <small id="small">* Please Enter Models Name</small>
  </div>
      <button type="submit" name="submit" value="Submit" class="btn btn-primary btn-block">Submit</button>
      <br><br>

</form>
</div>

