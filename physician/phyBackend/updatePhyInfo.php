
<?php
 session_start();
include_once "config.php";

if (isset($_POST['submit'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $image = mysqli_real_escape_string($conn, $_POST['image']);
    $departement = mysqli_real_escape_string($conn, $_POST['departement']);
    $intro = mysqli_real_escape_string($conn, $_POST['intro']);


/*$email = $_POST['email'];
$phone = $_POST['phone'];
$image = $_POST['image'];
$departement = $_POST['departement'];
$intro = $_POST['intro'];*/

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));



    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }

    // Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }
  
  // Check file size
  if ($_FILES["image"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }
  
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }
  
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }

   

    
      // update database
      $query = "UPDATE physician SET 
              email = '$email',
              phone = '$phone',
              image = '$target_file',
              specialist = '$departement',
              info = '$intro'
              WHERE phyId = '{$_SESSION['phyId']}'";

      if (mysqli_query($conn, $query)) {
        print "account verify successfully!";
        header("location: ../dashboard.php");

        
    }else {
        print "got problem";

    }
}
?>




