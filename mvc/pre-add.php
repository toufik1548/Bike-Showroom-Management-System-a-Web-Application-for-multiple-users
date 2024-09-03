<br>
<h4 class="fw-bold">Pre-Booking Add</h4>

<?php
$client_id  = $slug2;
$user_id    = $logged_user_id;
$brand_id   = get_info("sms_users","brand_id","WHERE user_id=$user_id");


if ($user_id == $logged_user_id) {
  if (isset($_POST["submit"])) {

  $model_id           = $_POST["model_id"];
  $payment_amount     = addslashes($_POST["payment_amount"]);
  $remarks            = addslashes($_POST["remarks"]);    
  $add_datetime       = $_POST["add_datetime"];  
  // Display error msg
  $err = array();

  if($model_id == '')
    { $err[]="Please select Model";}

  if($payment_amount == '')
    { $err[]="Please enter Advance Payment";}

  if($add_datetime == '')
    { $err[]="Please enter Add Datetime";}

  if($remarks == '')
    { $err[]="Please enter Remarks";}

  $n = count($err);

  if($n > 0) {
    $msg = "<div class=\"alert alert-danger\" role=\"alert\"><ol>";
    for($i=0; $i < $n; $i++)
      { $msg .= "<li>".$err[$i]."</li>"; }
    $msg .= "</ol></div>";
    $_SESSION['msg'] = $msg;
  }else{


$q = mysqli_query($con, 
    "INSERT INTO `sms_prebook` 
    (`prebook_id`, `user_id`, `client_id`, `model_id`, `payment_amount`, `remarks`, `add_datetime`, `status`) 
    VALUES 
    (NULL, '$logged_user_id', '$client_id', '$model_id', '$payment_amount', '$remarks', '$add_datetime', 0)"
);




if($q){
  echo "<div class='alert alert-dismissible' style='background-color: green; color: white;' role='alert'> ✔ Record add successfully.</div>";
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
    <select class="form-select" id="model_id" name="model_id" aria-label="Default select example">
      <option selected>Select Model</option>
    <?php
    $qm = mysqli_query($con,"SELECT model_id,model_name FROM sms_models WHERE brand_id=$brand_id AND status=1");
    while($rm=mysqli_fetch_array($qm)){ ?>
      <option value="<?php echo $rm['model_id']; ?>"> <?php echo $rm['model_name']; ?></option>
    <?php 
    }
    ?>
    </select>
  </div>


  <div class="mb-3">
      <input type="number" name="payment_amount" class="form-control" id="payment_amount" placeholder="Pre-Booking Amount" required>
      <small id="small">Please enter Pre-Booking Amount</small>
  </div>
    <div class="mb-3">
      <input type="date" name="add_datetime" class="form-control" id="add_datetime" placeholder="Add Datetime" required>
      <small id="small">Please Add Datetime</small>
  </div>
    <div class="mb-3">
      <textarea name="remarks" class="form-control rounded-0" placeholder="Remarks" id="remarks" rows="3"></textarea>
  </div>
  <button type="submit" name="submit" value="Submit" class="btn btn-primary btn-block">Submit</button>
  <br><br>
</form>
</div>

<?php
}else{
  echo "You don't have permission to change this";
  //exit;
}
?>