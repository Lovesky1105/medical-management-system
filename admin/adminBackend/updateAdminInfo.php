
<?php
 session_start();
include_once "config.php";

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

if(!empty($email) && !empty($phone) && !empty($address)){

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
      $image = mysqli_real_escape_string($conn, $_FILES['image']['name']);
      $target_dir = "uploads/";
      $target_file = $target_dir . basename($_FILES["image"]["name"]);

      // Rest of your code to handle file upload and database update...
 
    
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["image"]["tmp_name"]);
if($check !== false) {
  $_SESSION['status'] = "File is an image - " . $check["mime"] . ".";
  $uploadOk = 1;
  header("location: ../users-profile.php");
} else {
  $_SESSION['status'] = "File is not an image.";
  $uploadOk = 0;
  header("location: ../users-profile.php");
}

    // Check if file already exists
  if (file_exists($target_file)) {
    $_SESSION['status'] = "Sorry, file already exists.";
    $uploadOk = 0;
    header("location: ../users-profile.php");
    }
  
  // Check file size
  if ($_FILES["image"]["size"] > 500000) {
    $_SESSION['status'] = "Sorry, your file is too large.";
    $uploadOk = 0;
    header("location: ../users-profile.php");
  }
  
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    $_SESSION['status'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    header("location: ../users-profile.php");
    $uploadOk = 0;
  }
  
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    
    header("location: ../users-profile.php");
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      $query = "UPDATE admin SET 
              adminEmail = '$email',
              adminPhone = '$phone',
              adminAddress = '$address',
              image = '$target_file'
              WHERE adminId = '{$_SESSION['adminId']}'";

      if (mysqli_query($conn, $query)) {
        $_SESSION['status'] = "update successfully!";
        header("location: ../users-profile.php");

        
    }else {
      $_SESSION['status'] ='<p style="color:red;">Could not retrieve the data because :<br/>' .mysqli_error($conn).
                    '.</p><p>the query being run was : '.$query.'</p>';
                    header("location: ../users-profile.php");

      }
    } else {
      $_SESSION['status'] = "Sorry, there was an error uploading your file.";
      header("location: ../users-profile.php");
    }
  }

  
  }else{
    $_SESSION['status'] = "Image upload failed or was not provided.";
    header("location: ../users-profile.php");
  }



      
  } else {
   
      $_SESSION['status'] = "All input fields are required!";
      header("location: ../users-profile.php");
    
  }

}

?>




