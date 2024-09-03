<style>
  .container {
    overflow-x: auto;
  }
</style>

<br>
<h4 class="fw-bold">Client List</h4>

<form class="form-inline" method="POST" action="">
  <div class="mb-3">
    <input class="form-control" type="text" placeholder="Search by phone / name / address" aria-label="Search"
      name="search" value="<?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>">
    <button class="btn btn-primary btn-sm" type="submit">Search</button>
  </div>
</form>

<?php
if (isset($slug2) && $slug2 > 0) {
  $client_id = $slug2;

}
?>

<div class="container border bg-light">
  <table class="table table-hover">
    <thead>
      <tr>
        <th class="text-center bg-light">Name</th>
        <th class="text-center bg-light">Bike Model</th>
        <th class="text-center bg-light">Phone</th>
        <th class="text-center bg-light">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if (isset($_POST['search'])) {
        $search = $_POST['search'];
        $query = "SELECT * FROM sms_clients WHERE client_phone LIKE '%$search%' OR client_name LIKE '%$search%' OR client_village LIKE '%$search%' AND user_id = $logged_user_id";
      } else {
        $query = "SELECT * FROM sms_clients WHERE user_id = $logged_user_id";
      }

      $q = mysqli_query($con, $query);
      while($r = mysqli_fetch_assoc($q)){
      $client_id  = $r['client_id'];
      $bike_id    = get_info("sms_bikes","bike_id","WHERE user_id = $logged_user_id");

      $model_id   = get_info("sms_bikes","model_id","WHERE bike_id = $bike_id");

      $model_name = get_info("sms_models","model_name","WHERE model_id = $model_id");
      ?>
        <tr>
          <td><?php echo $r["client_name"]; ?></td>
          <td><?php echo $model_name; ?></td>
          <td class="text-center"><?php echo $r["client_phone"]; ?></td>
          <td class="text-center" style="width:35%">
            <?php
            $sell_id = get_info("sms_sells", "sells_id", "WHERE client_id=$client_id");

            if ($sell_id === null || $sell_id === "") { ?>
              <a href="<?php echo $site_url; ?>/sells-add/<?php echo $client_id; ?>/">
                <button type="button" class="btn btn-warning">Sell Bike</button></a>
            <?php } ?>

            <a href="<?php echo $site_url; ?>/sms-payments/<?php echo $client_id; ?>/"><button type="button"
                class="btn btn-success">Payment</button></a>
            <a href="<?php echo $site_url; ?>/clients-details/<?php echo $client_id; ?>/"><button type="button"
                class="btn btn-info">Details</button></a>
            <a href="<?php echo $site_url; ?>/clients-edit/<?php echo $client_id; ?>/"><button type="button"
                class="btn btn-primary">Edit</button></a>
          </td>
        </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
</div>

