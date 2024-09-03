<?php 
include("configs/config.php"); 
?>
<?php
session_start();
if(!isset($_SESSION['sess_user_id']))
    {
      header("location: $owner_url/login.php");
    }

include("configs/functions.php"); 
include("configs/router.php"); 

$logged_user_id                  = $_SESSION['sess_user_id'];
$logged_showroom_name            = $_SESSION['sess_showroom_name'];
$logged_showroom_owner_name      = $_SESSION['sess_showroom_owner_name'];

?>

<!DOCTYPE html>
<html lang="en">
<?php include("head.php"); ?>
    <body class="sb-nav-fixed">

        <?php include("nav_top.php"); ?>
        
        <div id="layoutSidenav">
            
            <?php include("nav_left.php"); ?>
        
            <?php include("includes.php"); ?>
        </div>
        
        <script type="text/javascript" src="<?php echo $owner_url; ?>/js/scripts.js"></script>
        <script type="text/javascript" src="<?php echo $owner_url; ?>/js//Chart.min.js"></script>
        <script type="text/javascript" src="<?php echo $owner_url; ?>/assets/demo/chart-area-demo.js"></script>
        <script type="text/javascript" src="<?php echo $owner_url; ?>/assets/demo/chart-bar-demo.js"></script>
        <script type="text/javascript" src="<?php echo $owner_url; ?>/js/datatables-simple-demo.js"></script>
        <script type="text/javascript" src="<?php echo $owner_url; ?>/js/jquery-3.7.1.min.js"></script>
        <script type="text/javascript" src="<?php echo $owner_url; ?>/js/popper.min.js"></script>
        <script type="text/javascript" src="<?php echo $owner_url; ?>/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo $owner_url; ?>/js/all.js"></script>
        <script type="text/javascript" src="<?php echo $owner_url; ?>/js/html2pdf.bundle.js"></script>
    </body>
</html>