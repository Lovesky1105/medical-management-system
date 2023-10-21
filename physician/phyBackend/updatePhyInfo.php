
<?php
 session_start();
include_once "config.php";

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $departement = mysqli_real_escape_string($conn, $_POST['departement']);
    $intro = mysqli_real_escape_string($conn, $_POST['intro']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
      $image = mysqli_real_escape_string($conn, $_FILES['image']['name']);
      $target_dir = "uploads/";
      $target_file = $target_dir . basename($_FILES["image"]["name"]);

      // Rest of your code to handle file upload and database update...
  } else {
      echo "Image upload failed or was not provided.";
  }



 if(!empty($email) && !empty($phone) && !empty($departement) && !empty($intro)  && !empty($address)){
    
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
              address = '$address',
              image = '$target_file',
              info = '$intro',
              specialist = '$departement'
              WHERE phyId = '{$_SESSION['phyId']}'";

      if (mysqli_query($conn, $query)) {
        print "update successfully!";
        header("location: ../dashboard.php");

        
    }else {
        print'<p style="color:red;">Could not retrieve the data because :<br/>' .mysqli_error($conn).
                    '.</p><p>the query being run was : '.$query.'</p>';

    }
  
  }else{
    echo "All input fields are required!";
  }

}

?>




