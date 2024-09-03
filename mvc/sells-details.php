
<br>
<h4 class="fw-bold">Sell Details</h4>

<?php
$client_id    = $slug2;
$sells_id     = get_info("sms_sells","sells_id","WHERE client_id=$client_id");
$user_id      = get_info("sms_sells","user_id","WHERE client_id=$client_id");
if ($user_id == $logged_user_id) {
?>

<div class="container border">
  <table class="table table-hover">
    <tbody>

      <?php
      // Fetch sell details from the database
      $q = mysqli_query($con, "SELECT * FROM sms_sells WHERE sells_id=$sells_id");
      $r = mysqli_fetch_assoc($q);
      ?>

      <!-- Sell ID -->
      <tr>
        <td width="35%"><b>Sell ID:</b></td>
        <td><?php
          if (empty($r["sells_id"])) {
            echo "Null";
          } else {
            echo $r["sells_id"];
          }
          ?></td>
      </tr>

      <!-- Client Name -->
      <tr>
        <td><b>Client Name:</b></td>
        <td><?php
          if (empty($r["client_id"])) {
            echo "Null";
          } else {
            echo get_info("sms_clients", "client_name", "WHERE client_id=" . $r["client_id"]);
          }
          ?></td>
      </tr>

      <!-- Bike -->
      <tr>
        <td><b>Bike:</b></td>
        <td><?php
          if (empty($r["bike_id"])) {
            echo "Null";
          } else {
            $model_id = get_info("sms_bikes", "model_id", "WHERE bike_id=" . $r['bike_id']);
            $model_name = get_info("sms_models", "model_name", "WHERE model_id=$model_id");
            $bike_engine_no = get_info("sms_bikes", "bike_engine_no", "WHERE bike_id=" . $r["bike_id"]);

            echo $model_name . " (" . $bike_engine_no . ")";
          }
          ?>
        </td>
      </tr>

      <!-- Bike Price -->
      <tr>
        <td width="35%"><b>Bike Price:</b></td>
        <td><?php
          if (empty($r["bike_id"])) {
            echo "Null";
          } else {
            echo get_info("sms_bikes", "bike_price", "WHERE bike_id=" . $r["bike_id"]);
          }
          ?>
        </td>
      </tr>

      <!-- Sell Price -->
      <tr>
        <td width="35%"><b>Sell Price:</b></td>
        <td><?php
          if (empty($r["sells_price"])) {
            echo "Null";
          } else {
            echo $r["sells_price"];
          }
          ?>
        </td>
      </tr>

      <!-- Sell Price (in words) -->
      <tr>
        <td width="35%"><b>Sell Price (in words):</b></td>
        <td><?php
          if (empty($r["sells_price_word"])) {
            echo "Null";
          } else {
            echo $r["sells_price_word"];
          }
          ?>
        </td>
      </tr>

      <!-- Add Date -->
      <tr>
        <td><b>Add Date:</b></td>
        <td><?php
          if (empty($r["add_date"])) {
            echo "Null";
          } else {
            echo $r["add_date"];
          }
          ?>
        </td>
      </tr>

    </tbody>
  </table>

</div>

<?php
}else{
  echo "You don't have permission to change this";
  //exit;
}
?>