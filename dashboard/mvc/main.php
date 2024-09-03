<?php 
include("configs/config.php"); 
?>
<?php
session_start();
if(!isset($_SESSION['sess_admin_id']))
    {
      header("location: $dashboard_url/login.php");
    }

include("configs/functions.php"); 
include("configs/router.php"); 

$logged_admin_id        = $_SESSION['sess_admin_id'];
$logged_admin_name      = $_SESSION['sess_admin_name'];


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

        <script src="<?php echo $dashboard_url; ?>/ckeditor/ckeditor.js"></script>
        <script>
            // Replace the <textarea> with a CKEditor
            CKEDITOR.replace('post_details',{
                filebrowserUploadUrl: '<?php echo $dashboard_url; ?>/ckeditor/ck_upload.php',
                filebrowserUploadMethod: 'form'
            });
            CKEDITOR.config.extraPlugins = 'colorbutton';
        </script>
        
        <script type="text/javascript" src="<?php echo $dashboard_url; ?>/js/scripts.js"></script>
        <script type="text/javascript" src="<?php echo $dashboard_url; ?>/js//Chart.min.js"></script>
        <script type="text/javascript" src="<?php echo $dashboard_url; ?>/assets/demo/chart-area-demo.js"></script>
        <script type="text/javascript" src="<?php echo $dashboard_url; ?>/assets/demo/chart-bar-demo.js"></script>
        <script type="text/javascript" src="<?php echo $dashboard_url; ?>/js/datatables-simple-demo.js"></script>
        <script type="text/javascript" src="<?php echo $dashboard_url; ?>/js/jquery-3.7.1.min.js"></script>
        <script type="text/javascript" src="<?php echo $dashboard_url; ?>/js/popper.min.js"></script>
        <script type="text/javascript" src="<?php echo $dashboard_url; ?>/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo $dashboard_url; ?>/js/all.js"></script>
        <script type="text/javascript" src="<?php echo $dashboard_url; ?>/js/html2pdf.bundle.js"></script>
    </body>
</html>