<style>
  .container {
    overflow-x: auto;
  }
</style>
<?php
// Assuming $logged_user_id is defined somewhere before this code snippet
$user_id = $logged_user_id;
?>
<br>
<center>
  <span class="badge badge-pill badge-secondary">
    <h3 class="border p-2 bg-white text-dark">Due Payments</h3>
  </span>
</center>

  <form class="form-inline" method="POST" action="">
    <div class="mb-3">
      <input class="form-control" type="text" placeholder="Search by Phone No" aria-label="Search"
        name="search" value="<?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>">
      <button class="btn btn-primary btn-sm" type="submit">Search</button>
    </div>
  </form>


  <table class="table table-hover bg-white">
    <thead>
      <tr>
        <th class="text-center">Client Name</th>
        <th class="text-center">Client Phone</th>
        <th class="text-center">Next Payment Date</th>
        <th class="text-center">Model</th>
        <th class="text-center">Sell Price</th>
        <th class="text-center">Due</th>
      </tr>
    </thead>
    <tbody>

  <?php
  $today = date("Y-m-d");

  if (isset($_POST['search'])) {
    // Use prepared statements to prevent SQL injection in search query
    $search = $_POST['search'];
    $query = "SELECT * FROM sms_payments WHERE client_id IN (SELECT client_id FROM sms_clients WHERE user_id = ? AND client_phone LIKE ?)";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "is", $logged_user_id, $search);
  } else {
    // Use prepared statements to prevent SQL injection
    $query = "SELECT * FROM sms_payments WHERE next_payment_date >= ? AND user_id = ? AND payment_amount>0";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "si", $today, $logged_user_id);
  }

  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  // Array to store the last payment for each 'sells_id'
  $last_payment_for_sell = array();

  while ($r = mysqli_fetch_assoc($result)) {
    $sells_id = $r['sells_id'];

    // Check if this payment is the latest for the sells_id
    if (!isset($last_payment_for_sell[$sells_id]) || $r['payment_id'] > $last_payment_for_sell[$sells_id]['payment_id']) {
      $last_payment_for_sell[$sells_id] = $r;
    }
  }

  // Display the table
  foreach ($last_payment_for_sell as $last_payment) {
    $client_id = $last_payment['client_id'];
    $client_phone = get_info("sms_clients","client_phone","WHERE user_id = $logged_user_id AND client_id=$client_id");
    $bike_id = get_info("sms_sells", "bike_id", "WHERE user_id = $logged_user_id AND sells_id=" . $last_payment['sells_id']);
    $model_id = get_info("sms_bikes", "model_id", "WHERE bike_id=$bike_id");
    $model_name = get_info("sms_models", "model_name", "WHERE model_id=$model_id");
    $client_name = get_info("sms_clients", "client_name", "WHERE client_id=$client_id");
    $sells_price = get_info("sms_sells", "sells_price", "WHERE user_id = $logged_user_id AND sells_id=" . $last_payment['sells_id']);

    // Display the last payment for each 'sells_id'
    ?>
    <tr>
      <td class="text-center"><?php echo $client_name; ?></td>
      <td class="text-center"><?php echo $client_phone; ?></td>
      <td class="text-center"><?php echo $last_payment['next_payment_date']; ?></td>
      <td class="text-center"><?php echo $model_name; ?></td>
      <td class="text-center"><?php echo $sells_price; ?></td>
      <td class="text-center"><?php
        $total_payments = get_sum("sms_payments", "payment_amount", "WHERE sells_id=" . $last_payment['sells_id']);
        $bike_price = get_info("sms_sells", "sells_price", "WHERE user_id = $logged_user_id AND sells_id=" . $last_payment['sells_id']);
        $dues = $bike_price - $total_payments;
        echo $dues;
      ?></td>
    </tr>
    <?php
  }
  ?>
    </tbody>
  </table>
