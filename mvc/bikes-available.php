<style>
.container {
  overflow-x: auto;
}
</style>

<br>
<h4 class="fw-bold">Available Bikes</h4>

<?php
if (isset($slug2) && $slug2 > 0) {
  $bike_id = $slug2;
}
?>

<form class="form-inline" method="POST" action="">
  <div class="mb-3">
    <input class="form-control" type="text" placeholder="Search by bike id / engine no / chassis no" aria-label="Search"
      name="search" value="<?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>">
    <button class="btn btn-primary btn-sm" type="submit">Search</button>
  </div>
</form>

<br>

<div class="container border bg-light">
  <table class="table table-hover">
    <thead>
      <tr>
        <th class="text-center bg-light">ID</th>
        <th class="text-center bg-light">Brand</th>
        <th class="text-center bg-light">Model</th>
        <th class="text-center bg-light">Engine No</th>
        <th class="text-center bg-light">Chassis No</th>
        <th class="text-center bg-light">Actions</th>
      </tr>
    </thead>
    <tbody>

      <?php

      if (isset($_POST['search'])) {
        $search = $_POST['search'];
        $query = "SELECT * FROM sms_bikes WHERE bike_engine_no='$search' OR bike_chassis_no='$search' OR bike_id='$search'";
      } else {
        $query = "SELECT * FROM sms_bikes WHERE user_id =$logged_user_id AND status=1";
      }

      $q = mysqli_query($con, $query);

      while ($r = mysqli_fetch_assoc($q)) {
      ?>
        <tr>
          <td class="text-center"><?php echo $r["bike_id"]; ?></td>
          <td class="text-center"><?php echo get_info("sms_brands", "brand_name", "WHERE brand_id=" . $r["brand_id"]); ?></td>
          <td class="text-center"><?php echo get_info("sms_models", "model_name", "WHERE model_id=" . $r["model_id"]); ?></td>
          <td class="text-center"><?php echo $r["bike_engine_no"]; ?></td>
          <td class="text-center"><?php echo $r["bike_chassis_no"]; ?></td>
          <td class="text-center">
            <a href="<?php echo $site_url; ?>/bikes-available-details/<?php echo $r["bike_id"]; ?>/">
              <button type="button" class="btn btn-dark">Details</button>
            </a>
            <a href="<?php echo $site_url; ?>/bikes-available-edit/<?php echo $r["bike_id"]; ?>/">
              <button type="button" class="btn btn-info">Edit</button>
            </a>
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</div>