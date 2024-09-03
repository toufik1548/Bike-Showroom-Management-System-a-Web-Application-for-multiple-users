<br>
<h4 class="fw-bold p-2 text-center bg-secondary" style="color: white;">Sell Bike</h4>

<?php
$client_id = $slug2;
$user_id   = get_info("sms_clients","user_id","WHERE client_id=$client_id");
if (isset($_POST["submit"])) {

    $bike_id            = $_POST["bike_id"];
    $sells_price        = addslashes($_POST["sells_price"]);
    $sells_price_word   = addslashes($_POST["sells_price_word"]);

    $payment_amount     = addslashes($_POST["payment_amount"]);
    $type_id            = $_POST["type_id"];
    $payment_date       = $_POST["payment_date"];
    $next_payment_date  = $_POST["next_payment_date"];
    $add_date           = $payment_date;
    $remarks            = addslashes($_POST["remarks"]);

  // Display error msg
  $err = array();

  if($sells_price < $payment_amount)
    { $err[]="Please enter valied amount in Payment Amount";}

  if($sells_price == '')
    { $err[]="Please enter Sells Price";}

  if($bike_id == '')
    { $err[]="Please select Bike";}

  if($sells_price_word == '')
    { $err[]="Please enter Price in Word";}

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

        $qs = mysqli_query($con,
            "INSERT INTO `sms_sells` (`sells_id`, `user_id`, `client_id`, `bike_id`, `sells_price`, `sells_price_word`, `add_date`, `status`) VALUES (NULL, '$logged_user_id', '$client_id', '$bike_id', '$sells_price', '$sells_price_word', '$add_date', '1');");
        $sells_id = mysqli_insert_id($con);
        
        $qp = mysqli_query($con, 
            "INSERT INTO `sms_payments` (`payment_id`, `user_id`, `client_id`, `sells_id`, `payment_amount`, `type_id`, `payment_date`, `next_payment_date`, `add_date`, `remarks`) VALUES (NULL, '$logged_user_id', '$client_id', '$sells_id', '$payment_amount', '$type_id', '$payment_date', '$next_payment_date', '$add_date', '$remarks');");


        if ($qs && $qp === TRUE) {
            //sells update bike table
            mysqli_query($con, "UPDATE sms_bikes SET status=2 WHERE bike_id=$bike_id");
            echo "<div class='alert alert-dismissible' style='background-color: green; color: white;' role='alert'> ✔ Record add successfully.</div>";
            echo "<a class='btn btn-info' href='$site_url/clients-details/$client_id/'>Next</a>";

        } else {
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
    $qc = mysqli_query($con, "SELECT * FROM sms_clients WHERE client_id = $client_id");
    $rc = mysqli_fetch_assoc($qc);
?>


<div class="card bg-secondary-subtle" style="width: 100%;">
  <ul class="list-group list-group-flush">
    <li class="list-group-item" style="text-decoration: none"><b>Name:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rc["client_name"]; ?></li>
    <li class="list-group-item" style="text-decoration: none"><b>Location:</b>&nbsp;&nbsp;<?php echo $rc["client_village"]; ?></li>
    <li class="list-group-item" style="text-decoration: none"><b>Phone:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rc["client_phone"]; ?></li>
    <li class="list-group-item" style="text-decoration: none"><b>NID:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rc["client_nid"]; ?></li>
  </ul>
</div>

<form class="rounded pt-2" name="form1" method="POST" action=""> 
    <div class="card p-2 mb-2 bg-secondary-subtle">
        <div class="form-group mb-3">
            <select class="form-control" id="bike_id" name="bike_id">
                <option selected>Select bike model</option>
                <?php
                $qm = mysqli_query($con, "SELECT bike_id, model_id, bike_engine_no, bike_chassis_no FROM sms_bikes WHERE user_id=$logged_user_id AND status=1");
                while ($rm = mysqli_fetch_array($qm)) {
                    $model_id       = $rm['model_id'];
                    $model_name     = get_info("sms_models", "model_name", "WHERE model_id=$model_id");
                    $bike_id        = $rm['bike_id'];
                ?>
                    <option value="<?php echo $bike_id; ?>" <?php echo (empty($bike_id) ? 'selected' : ''); ?>>
                        <?php 
                        if (empty($bike_id)) {
                            echo "Please Add Bike";
                        } else {
                            echo $model_name . " (eng." . $rm['bike_engine_no'] ."&nbsp; chs.". $rm['bike_chassis_no'] . ")";
                        }
                        ?>
                    </option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <input type="number" name="sells_price" class="form-control" id="number" placeholder="Sells Price" required maxlength="6" value="<?php echo isset($sells_price) ? htmlspecialchars($sells_price) : ''; ?>">
            <small id="small">Please enter numbers only (Ex: 200000)</small>
        </div>
        <?php $sells_price = mysqli_insert_id($con); ?>

        <div class="mb-3">
            <input type="text" name="sells_price_word" class="form-control" id="text" placeholder="One Lakh Taka" value="<?php echo isset($sells_price_word) ? htmlspecialchars($sells_price_word) : ''; ?>" required>
            <small id="small">Please enter Price in Word</small>
        </div>
    </div>


    <div class="card p-2 mb-2 bg-secondary-subtle"> 
        <div class="mb-3">
          <input type="number" name="payment_amount" class="form-control" id="number" placeholder="Payment Amount" aria-describedby="paymentAmountHelp" value="<?php echo isset($payment_amount) ? htmlspecialchars($payment_amount) : ''; ?>" required>
          <small id="small">Please do not use (,.-) etc. Use only number</small>
        </div>
        <?php $payment_amount = mysqli_insert_id($con); ?>

        <div class="mb-3">
            <select class="form-select" id="type_id" name="type_id" aria-label="Default select example" value="<?php echo isset($type_id) ? htmlspecialchars($type_id) : ''; ?>">
                <?php
                $qm = mysqli_query($con, "SELECT type_id, type_name FROM sms_payments_types WHERE status = 1 AND type_id <= 2");
                while ($rm = mysqli_fetch_array($qm)) {
                    ?>
                    <option value="<?php echo $rm['type_id']; ?>"> <?php echo $rm['type_name']; ?></option>
                <?php
                }
                ?>
            </select>
        </div>

        <div class="mb-3" id="firstDateInput">
            <input type="date" name="payment_date" class="form-control" placeholder="Payment Date" aria-describedby="paymentdateHelp" value="<?php echo isset($payment_date) ? htmlspecialchars($payment_date) : ''; ?>" required>
            <small id="small">Please enter todays payment date</small>
        </div>

        <div class="mb-3" id="secondDateInput">
            <input type="date" name="next_payment_date" class="form-control" placeholder="Next Payment Date" aria-describedby="nextpaymentdateHelp" value="<?php echo isset($next_payment_date) ? htmlspecialchars($next_payment_date) : ''; ?>">
            <small id="small">Please enter next payment date</small>
        </div>

        <div class="mb-3">
          <textarea name="remarks" class="form-control rounded-0" placeholder="Remarks" id="text" value="<?php echo isset($remarks) ? htmlspecialchars($remarks) : ''; ?>" rows="3"></textarea>
        </div>

        <button type="submit" name="submit" value="Submit" class="btn btn-info">Submit</button>
     
      <br><br>       
    </div>
</form>



<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $("#secondDateInput").hide();

        $("#type_id").change(function (event) {
            event.preventDefault(); 

            var selectedValue = $(this).val();

            if (selectedValue == 2) {
                $("#firstDateInput").show();
                $("#secondDateInput").show();
            } else {
                $("#secondDateInput").hide();
                $("#firstDateInput").show();
            }
        });
    });
</script>