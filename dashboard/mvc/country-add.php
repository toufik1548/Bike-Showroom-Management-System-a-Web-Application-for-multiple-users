<br>
<h4 class="fw-bold">Country Add</h4>

<?php
if (isset($_POST["submit"])) {

$country_name=addslashes(trim($_POST["country_name"]));


  // Display error msg
  $err = array();

  if($country_name == '')
    { $err[]="Please enter country name";}
  

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
  `sms_country` (
    `country_id`, 
    `country_name`, 
    `status`
    )

     VALUES ( 
      NULL, 
      '$country_name', 
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
      <input type="text" name="country_name" class="form-control" id="text" placeholder="Enter country Name" value="<?php echo isset($model_name) ? htmlspecialchars($model_name) : ''; ?>">
      <small id="small">* Please Enter country Name</small>
  </div>
      <button type="submit" name="submit" value="Submit" class="btn btn-primary btn-block">Submit</button>
      <br><br>

</form>
</div>

