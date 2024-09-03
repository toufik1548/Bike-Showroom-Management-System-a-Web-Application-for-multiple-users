<br>
<h4 class="fw-bold">Location Add</h4>

<?php
if (isset($_POST["submit"])) {

$location_name=addslashes(trim($_POST["location_name"]));

  // Display error msg
  $err = array();

  if($location_name == '')
    { $err[]="Please enter location name";}
  

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
  `sms_locations` (
    `location_id`, 
    `location_name`, 
    `status`
    )

     VALUES ( 
      NULL, 
      '$location_name', 
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
      <input type="text" name="location_name" class="form-control" id="text" placeholder="Enter location Name" value="<?php echo isset($location_name) ? htmlspecialchars($location_name) : ''; ?>">
      <small id="small">* Please Enter location Name</small>
  </div>
      <button type="submit" name="submit" value="Submit" class="btn btn-primary btn-block">Submit</button>
      <br><br>

</form>
</div>

