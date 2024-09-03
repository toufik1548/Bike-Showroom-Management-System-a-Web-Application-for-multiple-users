<style>
  .container {
    overflow-x: auto;
  }
</style>

<br>
<h4 class="fw-bold">Location List</h4>

<div class="container border bg-light">
  <table class="table table-hover">
    <thead>
      <tr>
        <th class="text-center bg-light">Location</th>
        <th class="text-center bg-light">Status</th>
        <th class="text-center bg-light">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $query = "SELECT *  FROM sms_locations ORDER BY location_name ASC";
      $q = mysqli_query($con, $query);
      while ($r = mysqli_fetch_assoc($q)) {
      ?>

        <tr>
          <td class="text-center"><?php echo get_info("sms_locations", "location_name", "WHERE location_id=" . $r["location_id"]); ?></td>
          <td class="text-center"><?php if($r["status"]==1){echo "Active";}else{echo "Inactive";} ?></td>
          <td class="text-center">
            <a href="<?php echo $dashboard_url; ?>/location-edit/<?php echo $r["location_id"]; ?>/">
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
