<style>
  .container {
    overflow-x: auto;
  }
</style>

<br>
<h4 class="fw-bold">Model List</h4>

<?php
$user_id  = $logged_user_id;
$brand_id = get_info("sms_users","brand_id","WHERE user_id=$user_id");

if (isset($slug2) && $slug2 > 0) {
  $model_id = $slug2;
}
?>

<form class="form-inline" method="POST" action="">
  <div class="mb-3">
    <input class="form-control" type="text" placeholder="search by model name" aria-label="Search" name="search"
      value="<?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>">
    <button class="btn btn-primary btn-sm" type="submit">Search</button>
  </div>
</form>

<div class="container border bg-light">
  <table class="table table-hover">
    <thead>
      <tr>
        <th class="text-center bg-light">Brand</th>
        <th class="text-center bg-light">Model</th>
        <th class="text-center bg-light">Status</th>
        <th class="text-center bg-light">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php

      if (isset($_POST['search'])) {
        $search = $_POST['search'];
        $query = "SELECT *  FROM sms_models WHERE model_name LIKE '%$search%'";
      } else {
        $query = "SELECT *  FROM sms_models WHERE brand_id=$brand_id";
      }

      $q = mysqli_query($con, $query);
      while ($r = mysqli_fetch_assoc($q)) {
      ?>

        <tr>
          <td class="text-center"><?php echo get_info("sms_brands", "brand_name", "WHERE brand_id=" . $r["brand_id"]); ?></td>
          <td class="text-center"><?php echo $r["model_name"]; ?></td>
          <td class="text-center"><?php echo $r["status"]; ?></td>
          <td class="text-center">
            <a href="<?php echo $site_url; ?>/models-edit/<?php echo $r["model_id"]; ?>/">
                <button type="button" class="btn btn-info">Edit</button></a>
          </td>
        </tr>

      <?php
      }
      ?>
    </tbody>
  </table>
</div>
