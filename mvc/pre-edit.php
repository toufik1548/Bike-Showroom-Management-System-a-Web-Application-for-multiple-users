<br>
<h4 class="fw-bold">Pre-Booking Edit</h4>

<?php
$client_id  = $slug2;
$user_id    = $logged_user_id;
$brand_id 	= get_info("sms_users","brand_id","WHERE user_id=$user_id");

$qp = mysqli_query($con, "SELECT * FROM sms_prebook WHERE user_id = $logged_user_id AND status = 0");
$rp = mysqli_fetch_assoc($qp);


if ($user_id == $logged_user_id) {
  if (isset($_POST["submit"])) {

  $model_id           	= $_POST["model_id"];
  $payment_amount     	= addslashes($_POST["payment_amount"]);
  $remarks            	= addslashes($_POST["remarks"]);    
  $add_datetime       	= $_POST["add_datetime"];   
  $status       		    = $_POST["status"];

  if ($status == "") {$status = "0";} else {$status = $status;}



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
    (NULL, '$logged_user_id', '$client_id', '$model_id', '$payment_amount', '$remarks', '$add_datetime', '$status')"
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
    <?php
    $qm = mysqli_query($con,"SELECT model_id,model_name FROM sms_models WHERE brand_id=$brand_id AND status=1");
    while($rm=mysqli_fetch_array($qm)){ ?>
      <option value="<?php echo $rm['model_id'];?>"> <?php echo $rm['model_name']; ?></option>
    <?php 
    }
    ?>
    </select>
    <small id="small">Please select Model</small>
  </div>


	<div class="mb-3">
	  <input type="number" name="payment_amount" class="form-control" id="payment_amount" value="<?php echo $rp['payment_amount'];?>" placeholder="Pre-Booking Amount"required>
	  <small id="small">Please enter Pre-Booking Amount</small>
	</div>
	<div class="mb-3">
	    <?php
	        // Assuming $rp['add_datetime'] contains the date string
	        $originalDatetime = $rp['add_datetime'];
	        // Remove the last 9 digits
	        $trimmedDatetime = substr($originalDatetime, 0, -9);
	    ?>
	    <input type="date" name="add_datetime" class="form-control" id="add_datetime" value="<?php echo $trimmedDatetime;?>" placeholder="Add Datetime" required>
	    <small id="small">Please Add Datetime</small>
	</div>
    <div class="mb-3">
      <textarea name="remarks" class="form-control rounded-0" id="remarks" rows="3" placeholder="Remarks"><?php echo isset($rp['remarks']) ? $rp['remarks'] : ''; ?></textarea>
  </div>
  <div class="mb-3">
      <input type="radio" name="status" value="1"> Delivered 
      <input type="radio" name="status" value="2"> Refund
      <br>
      <small id="small" class="text-danger"><b>*Booking</b></small>
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

