<style>
  .container {
    overflow-x: auto;
  }
</style>

<br>
<h4 class="fw-bold">Pre-Booking List</h4>

<form class="form-inline" method="POST" action="">
  <div class="mb-3">
    <input class="form-control" type="text" placeholder="Search by phone / name / address" aria-label="Search"
      name="search" value="<?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>">
    <button class="btn btn-primary btn-sm" type="submit">Search</button>
  </div>
</form>


<div class="container border bg-light">
  <table class="table table-hover">
    <thead>
      <tr>
        <th class="text-center bg-light">Name</th>
        <th class="text-center bg-light">Bike Model</th>
        <th class="text-center bg-light">Phone</th>
        <th class="text-center bg-light">Pre-Amount</th>
        <th class="text-center bg-light">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if (isset($_POST['search'])) {
        $search = $_POST['search'];
        $query = "SELECT * FROM sms_clients WHERE client_phone LIKE '%$search%' OR client_name LIKE '%$search%' AND user_id = $logged_user_id";
      } else {
        $query = "SELECT * FROM sms_prebook WHERE user_id = $logged_user_id AND status=2";
      }

      $q = mysqli_query($con, $query);
      while($r = mysqli_fetch_assoc($q)){
      $client_id      = $r['client_id'];
      $model_id       = $r['model_id'];
      $payment_amount = $r['payment_amount'];
      $status         = $r['status'];

      $client_name  = get_info("sms_clients","client_name","WHERE user_id = $logged_user_id AND client_id=$client_id");
      $model_name  = get_info("sms_models","model_name","WHERE model_id = $model_id");
      $client_phone = get_info("sms_clients","client_phone","WHERE user_id = $logged_user_id AND client_id=$client_id");
      ?>
        <tr>
          <td class="text-center"><?php echo $client_name; ?></td>
          <td class="text-center"><?php echo $model_name; ?></td>
          <td class="text-center"><?php echo $client_phone; ?></td>
          <td class="text-center"><?php echo $payment_amount; ?></td>
          <td class="text-center"><a class="btn btn-primary" href="<?php echo $site_url; ?>/pre-edit/<?php echo $client_id; ?>/">Edit</a></td>
        </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
</div>

