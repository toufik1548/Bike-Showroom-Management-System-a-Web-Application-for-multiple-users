<style>
  .container {
    overflow-x: auto;
  }
</style>

<br>
<h4 class="fw-bold">Pre-Booking Client List</h4>

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
        $client_id = $r['client_id'];
      ?>
        <tr>
          <td class="text-center"><?php echo $r["client_name"]; ?></td>
          <td class="text-center"><?php echo $r["client_phone"]; ?></td>
          <td class="text-center">
            <a href="<?php echo $site_url; ?>/pre-add/<?php echo $client_id; ?>/"><button type="button"
                class="btn btn-info">Prebook</button></a>
          </td>
        </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
</div>

