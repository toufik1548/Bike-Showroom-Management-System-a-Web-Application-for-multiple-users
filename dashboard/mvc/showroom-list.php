<style>
  .container {
    overflow-x: auto;
  }
</style>

<br>
<h4 class="fw-bold">Showroom List</h4>

<div class="container border bg-light">
  <table class="table table-hover">
    <thead>
      <tr>
        <th class="text-center bg-light">Showroom Name</th>
        <th class="text-center bg-light">Location</th>
        <th class="text-center bg-light">Brand</th>
        <th class="text-center bg-light">Status</th>
        <th class="text-center bg-light">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $query = "SELECT *  FROM sms_users ORDER BY user_id DESC";
      $q = mysqli_query($con, $query);
      while ($r = mysqli_fetch_assoc($q)) {
      ?>

        <tr>
          <td class="text-center"><?php echo $r['showroom_name']; ?></td>
          <td class="text-center"><?php echo $location_name = get_info("sms_locations","location_name","WHERE location_id=".$r['location_id']); ?></td>
          <td class="text-center"><?php echo $brand_name = get_info("sms_brands","brand_name","WHERE brand_id=".$r['brand_id']); ?></td>
          <td class="text-center"><?php if($r["status"]==1){echo "Active";}else{echo "Inactive";} ?></td>
          <td class="text-center">
            <a href="<?php echo $dashboard_url; ?>/showroom-edit/<?php echo $r['user_id']; ?>/">
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
