<?php
include_once "config.php";

if (isset($_POST['submitted'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $agreement = $_POST['agreement'];

    
      // update database
      $query = "UPDATE physician SET 
              agreement = '$agreement' 
              WHERE email = '$email' 
              AND name = '$name'";

      if (mysqli_query($conn, $query)) {
        print "account verify successfully!";
        header("location: ../approveAccount.php");

        
    }else {
        print "got problem";

    }
}
?>