<style>
    .container {
        overflow-x: auto;
    }
</style>

<br>
<h4 class="fw-bold">Sell List</h4>

<?php
if (isset($slug2) && $slug2 > 0) {
    $sells_id = $slug2;
}
?>

<form class="form-inline" method="POST" action="">
    <div class="mb-3">
        <input class="form-control" type="text" placeholder="search by date/sell id" aria-label="Search"
            name="search" value="<?php echo isset($_POST['search']) ? htmlspecialchars($_POST['search']) : ''; ?>">
        <button class="btn btn-primary btn-sm" type="submit">Search</button>
    </div>
</form>

<div class="container border">
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="text-center bg-light">Sell ID</th>
                <th class="text-center bg-light">Client Name</th>
                <th class="text-center bg-light">Bike info</th>
                <th class="text-center bg-light">Bike Price</th>
                <th class="text-center bg-light">Sell Price</th>
                <th class="text-center bg-light">Add Date</th>
                <th class="text-center bg-light">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0;
            if (isset($_POST['search'])) {
                $search = mysqli_real_escape_string($con, $_POST['search']);
                $query = "SELECT * FROM sms_sells WHERE add_date='$search' OR sells_id='$search' AND user_id = $logged_user_id";
            } else {
                $query = "SELECT * FROM sms_sells WHERE user_id = $logged_user_id";
            }

            $q = mysqli_query($con, $query);
            while ($r = mysqli_fetch_assoc($q)) {
                ?>
                <tr>
                    <td class="text-center"><?php echo $r["sells_id"]; ?></td>
                    <td><?php echo get_info("sms_clients", "client_name", "WHERE client_id=" . $r["client_id"]); ?></td>
                    <td>
                        <?php
                        $model_id = get_info("sms_bikes", "model_id", "WHERE bike_id=" . $r['bike_id']);
                        $model_name = get_info("sms_models", "model_name", "WHERE model_id=$model_id");
                        $bike_engine_no = get_info("sms_bikes", "bike_engine_no", "WHERE bike_id=" . $r["bike_id"]);
                        echo $model_name . " (" . $bike_engine_no . ")";
                        ?>
                    </td>
                    <td><?php echo get_info("sms_bikes", "bike_price", "WHERE bike_id=" . $r["bike_id"]); ?></td>
                    <td><?php echo $r["sells_price"];
                        $total = $total + $r["sells_price"]; ?></td>
                    <td class="text-center"><?php echo $r["add_date"]; ?></td>
                    <td width="20%">
                        <a href="<?php echo $site_url; ?>/sms-payments/<?php echo $r["client_id"]; ?>/">
                            <button type="button" class="btn btn-success">Payment</button>
                        </a>
                        <a href="<?php echo $site_url; ?>/sells-details/<?php echo $r["client_id"]; ?>/">
                            <button type="button" class="btn btn-dark">Details</button>
                        </a>
                    </td>
                </tr>
            <?php
        }
        ?>
        <tr>
            <td colspan="4" align="right">Total</td>
            <td colspan="3"><b><?php echo $total; ?></b></td>
        </tr>
        </tbody>
    </table>
</div>