<style>
  .container {
    overflow-x: auto;
  }
</style>

<br>
<h4 class="fw-bold">Brand List</h4>

<div class="container border bg-light">
  <table class="table table-hover">
    <thead>
      <tr>
        <th class="text-center bg-light">Brand</th>
        <th class="text-center bg-light">Manufacture</th>
        <th class="text-center bg-light">Status</th>
        <th class="text-center bg-light">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $query = "SELECT *  FROM sms_brands ORDER BY brand_name ASC";
      $q = mysqli_query($con, $query);
      while ($r = mysqli_fetch_assoc($q)) {
      ?>

        <tr>
          <td class="text-center"><?php echo get_info("sms_brands", "brand_name", "WHERE brand_id=" . $r["brand_id"]); ?></td>
          <td class="text-center"><?php echo $r["brand_manufcturer"]; ?></td>
          <td class="text-center"><?php if($r["status"]==1){echo "Active";}else{echo "Inactive";} ?></td>
          <td class="text-center">
            <a href="<?php echo $dashboard_url; ?>/brand-edit/<?php echo $r["brand_id"]; ?>/">
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
