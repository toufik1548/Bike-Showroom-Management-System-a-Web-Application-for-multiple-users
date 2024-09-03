<br>
<h4 class="fw-bold">Add Payment</h4>

<?php
$client_id  = $slug2;
$sells_id   = get_info("sms_sells","sells_id","WHERE client_id=$client_id");
$user_id    = get_info("sms_clients","user_id","WHERE client_id=$client_id");

if ($user_id == $logged_user_id) {
  if (isset($_POST["submit"])) {

  $payment_amount     = addslashes($_POST["payment_amount"]);
  $type_id            = $_POST["type_id"];
  $payment_date       = $_POST["payment_date"];
  $next_payment_date  = $_POST["next_payment_date"];
  $add_date           = date('Y-m-d');
  $remarks            = addslashes($_POST["remarks"]);



  // Display error msg
  $err = array();

  if($payment_amount == '')
    { $err[]="Please enter Payment Amount";}

  if($type_id == '')
    { $err[]="Please select Payment Type";}

  if($payment_date == '')
    { $err[]="Please enter payment date";}

  if($type_id == '2' && $next_payment_date== '')
    { $err[]="Please enter next payment date";}

  if($remarks== '')
    { $err[]="Please enter remarks";}


  $n = count($err);

  if($n > 0) {
    $msg = "<div class=\"alert alert-danger\" role=\"alert\"><ol>";
    for($i=0; $i < $n; $i++)
      { $msg .= "<li>".$err[$i]."</li>"; }
    $msg .= "</ol></div>";
    $_SESSION['msg'] = $msg;
  }else{

  $q=mysqli_query($con, 
    "INSERT INTO `sms_payments` (`payment_id`, `user_id`, `client_id`, `sells_id`, `payment_amount`, `type_id`, `payment_date`, `next_payment_date`, `add_date`, `remarks`) VALUES (NULL, '$logged_user_id', '$client_id', '$sells_id', '$payment_amount', '$type_id', '$payment_date', '$next_payment_date', '$add_date', '$remarks');");


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
      <input type="text" name="payment_amount" class="form-control" id="text" placeholder="Payment Amount" aria-describedby="paymentAmountHelp" required>
      <small id="small">Please do not use (,.-) etc. Use only number</small>
  </div>
  <div class="mb-3">
    <select class="form-select" id="type_id" name="type_id" aria-label="Default select example">
      <option selected>Payment Type</option>
    <?php
    $qm = mysqli_query($con,"SELECT type_id,type_name FROM sms_payments_types WHERE status=1");
    while($rm=mysqli_fetch_array($qm)){ ?>
      <option value="<?php echo $rm['type_id']; ?>"> <?php echo $rm['type_name']; ?></option>
    <?php 
    }
    ?>
    </select>
  </div>
  <div class="mb-3" id="firstDateInput">
      <input type="date" name="payment_date" class="form-control" id="text" placeholder="Payment Date" aria-describedby="paymentdateHelp" required>
      <small id="small">Please enter todays payment date</small>
  </div>
    <div class="mb-3" id="secondDateInput">
      <input type="date" name="next_payment_date" class="form-control" id="text" placeholder="Next Payment Date" aria-describedby="nextpaymentdateHelp">
      <small id="small">Please enter next payment date</small>
  </div>
    <div class="mb-3">
      <textarea name="remarks" class="form-control rounded-0" placeholder="Remarks" id="text" rows="3"></textarea>
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



<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $("#secondDateInput").show();

        $("#type_id").change(function (event) {
            event.preventDefault();

            var selectedValue = $(this).val();

            if (selectedValue == 3) {
                $("#firstDateInput").show();
                $("#secondDateInput").hide();
            } else {
                $("#secondDateInput").show();
                $("#firstDateInput").show();
            }
        });
    });

    // Check if payment_date and next_payment_date are the same
    $('form[name="form1"]').submit(function (e) {
        var paymentDate = $('input[name="payment_date"]').val();
        var nextPaymentDate = $('input[name="next_payment_date"]').val();

        if (paymentDate === nextPaymentDate) {
            e.preventDefault();
            alert('Payment Date and Next Payment Date cannot be the same.');
            // Optionally, you can display an error message on the page.
        }
    });
</script>