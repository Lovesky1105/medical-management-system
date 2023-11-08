<?php
session_start();
include_once "config.php";

if (isset($_POST['submitted'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $adminId = $_POST['adminId'];
    $agreement = $_POST['agreement'];

      // update database
      $query = "UPDATE physician SET 
              agreement = '$agreement',
              adminId = '$adminId'
              WHERE email = '$email' 
              AND name = '$name'";

      if (mysqli_query($conn, $query)) {
        $_SESSION['status'] = "account verify successfully!";
        header("location: ../approveAccount.php");
        
    }else {
        $_SESSION['status'] = '<p style="color:red;">Could not update the data because :<br/>' .mysqli_error($conn).
                    '.</p><p>the query being run was : '.$query.'</p>';
        header("location: ../approveAccount.php");

    }
}
?>