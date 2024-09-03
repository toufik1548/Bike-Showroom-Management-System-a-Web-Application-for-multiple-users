<style>
  .container {
    overflow-x: auto;
  }
</style>
<br>
<center>
    <span class="badge badge-pill badge-secondary">
        <h3 class="border p-2 bg-white text-dark">Database Backup</h3>
    </span>
</center>



<?php
if (isset($_POST['submit'])) {
    $delete = $_POST['delete'];
    $backupDirectory = 'db_backup'; // Specify the local path to the backup directory
    $filePath = $backupDirectory . "/" . $delete;
    
    $a = unlink($filePath);
    if ($a) {
        echo "File Deleted Successfully";
    } else {
        echo "Failed to delete";
    }
}
?>

<table class="table table-hover bg-white">
    <tr>
        <th>Date</th>
        <th>Name</th>
        <th colspan="2" width="20%">Action</th>
    </tr>

    <?php
    $backupDirectory = 'db_backup'; // Specify the local path to the backup directory
    if ($handle = opendir($backupDirectory)) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                ?>
                <tr>
                    <td><?php echo substr($entry, 10, 10); ?></td>
                    <td><?php echo $entry; ?></td>
                    <td>
                        <a href="<?php echo $backupDirectory . '/' . $entry; ?>">
                            <button class="btn btn-primary btn-sm">Download</button>
                        </a>
                    </td>
                    <td>
                        <form method="post" enctype="multipart/form-data">
                            <input type="hidden" name="delete" value="<?php echo $entry; ?>">
                            <input type="submit" name="submit" value="Delete" class="btn btn-danger btn-sm">
                        </form>
                    </td>
                </tr>
                <?php
            }
        }
        closedir($handle);
    }
    ?>
</table>
