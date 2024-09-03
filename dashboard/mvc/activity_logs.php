<style>
  .container {
    overflow-x: auto;
  }
</style>

<br>
<h4 class="fw-bold">Activity logs</h4>

<div class="container border bg-light">
  <table class="table table-hover">
    <thead>
      <tr>
        <th class="text-center bg-light">Log ID</th>
        <th class="text-center bg-light">User ID</th>
        <th class="text-center bg-light">User IP</th>
        <th class="text-center bg-light">Login Datetime</th>
      </tr>
    </thead>
    <tbody>
    <?php
      $query = "SELECT *  FROM sms_users_loginlogs ORDER BY log_id DESC";
      $q = mysqli_query($con, $query);
      while ($r = mysqli_fetch_assoc($q)) {
      	$user_id = $r['user_id'];
      	$showroom_name = get_info("sms_users","showroom_name","WHERE user_id=$user_id");
    ?>

        <tr>
          <td class="text-center"><?php echo $r['log_id']; ?></td>
          <td class="text-center"><?php echo $showroom_name; ?></td>
          <td class="text-center"><a href="https://iplocation.io/ip/<?php echo $r['user_ip']; ?>"><?php echo $r['user_ip']; ?><a/></td>
          <td class="text-center"><?php echo $r['login_datetime']; ?></td>
        </tr>

      <?php
      }
      ?>
    </tbody>
  </table>
</div>
