<br>
<h4 class="fw-bold">Brand Add</h4>

<?php
if (isset($_POST["submit"])) {

$brand_name			= addslashes(trim($_POST["brand_name"]));
$brand_manufcturer	= addslashes(trim($_POST["brand_manufcturer"]));


//temparary uploaded file
$tmp_name = $_FILES["file_name"]["tmp_name"];

//getting file name // time()."-". for pre-fix
$filename=time()."-".$_FILES["file_name"]["name"];

//uploading file in target folder
move_uploaded_file($tmp_name, "../images/".$filename);

// Convert the uploaded image to JPG format
$image_path = "../images/".$filename;

// Create an image resource from the original file
$image = imagecreatefromstring(file_get_contents($image_path));

// Resize the image to 200x200 pixels
$resized_image = imagescale($image, 200, 200);

// Save the resized image in JPG format with "jpg" extension
imagejpeg($resized_image, $image_path . ".jpg", 100);

// Free up memory
imagedestroy($image);
imagedestroy($resized_image);

// Update $filename to include the "jpg" extension
$filename .= ".jpg";



  // Display error msg
  $err = array();

  if($brand_name == '')
    { $err[]="Please enter brand name";}

  if($brand_manufcturer == '')
    { $err[]="Please enter brand manufcturer";}

  if($file_name == '')
    { $err[]="Please enter file name";}
  

  $n = count($err);

  if($n > 0) {
    $msg = "<div class=\"alert alert-danger\" role=\"alert\"><ol>";
    for($i=0; $i < $n; $i++)
      { $msg .= "<li>".$err[$i]."</li>"; }
    $msg .= "</ol></div>";
    $_SESSION['msg'] = $msg;
  }else{



$q=mysqli_query($con, 
  "INSERT INTO 
  `sms_brands` (
    `brand_id`, 
    `brand_name`, 
    `brand_manufcturer`,
    `brand_logo`,
    `status`
    )

     VALUES ( 
      NULL,
      '$brand_name', 
      '$brand_manufcturer',
      '$filename',
      '1'
      );");



if($q){
echo "<div class='alert alert-dismissible' style='background-color: green; color: white;' role='alert'> ✔ Record added successfully.<br></div>";

}
else{ 
  echo "<div class='alert alert-dismissible' style='background-color: red; color: white;' role='alert'> ❌ Wrong or mismatch!</div>";
}
}
}
?>

<?php
  if(isset($_SESSION['msg']))
  {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
  }
?>


<div class="container border bg-light">
  <br>
<form name="form1" method="POST" action="" enctype="multipart/form-data">          
  <div class="mb-3">
      <input type="text" name="brand_name" class="form-control" id="text" placeholder="Enter brands Name" value="<?php echo isset($brand_name) ? htmlspecialchars($brand_name) : ''; ?>">
      <small id="small">* Please Enter brands Name</small>
  </div>

  <div class="mb-3">
      <input type="text" name="brand_manufcturer" class="form-control" id="text" placeholder="Enter brands Manufcturer" value="<?php echo isset($brand_manufcturer) ? htmlspecialchars($brand_manufcturer) : ''; ?>">
      <small id="small">* Please Enter brands Manufcturer</small>
  </div>
  <div class="form-group">
      <input type="file" class="form-control" name="file_name" value="file_name">
      <small id="small">* Add Brand Here</small>
  </div>

      <button type="submit" name="submit" value="Submit" class="btn btn-primary btn-block">Submit</button>
      <br><br>

</form>
</div>

