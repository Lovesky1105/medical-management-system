<?php
session_start();
include_once "config.php";
    $phyId = $_SESSION['phyId'];
    $agreement = "pending";
    $medicineId = $_POST['medicineId'];
 //$appointmentId = mysqli_real_escape_string($conn, $_POST['appointmentId']);

$query="SELECT * FROM medicine WHERE medicineId = '{$medicineId}' AND status = '{$agreement}'";

if (isset($_POST['approve'])) {
    
      // update database
      $update_query = "UPDATE medicine SET 
              agreement = 'approve',
              phyId = '$phyId'
              WHERE medicineId = '$medicineId'";

      if (mysqli_query($conn, $update_query)) {
        $_SESSION['status'] = 'Medicine approve successfully!'; 
        header("location: ../approveMedsForm.php");
    }else {
        $_SESSION['status'] = '<p style="color:red;">Could not update the data because :<br/>' .mysqli_error($conn).
                    '.</p><p>the query being run was : '.$update_query.'</p>';
        header("location: ../approveMedsForm.php");
    }
}

if (isset($_POST['reject'])) {
    // update database
    $update_query = "UPDATE medicine SET 
            agreement = 'reject' 
            WHERE medicineId = '$medicineId'";

    if (mysqli_query($conn, $update_query)) {
        $_SESSION['status'] =  'Medicine reject successfully!'; 
      header("location: ../approveMedsForm.php");

      
  }else {
    $_SESSION['status'] = '<p style="color:red;">Could not update the data because :<br/>' .mysqli_error($conn).
    '.</p><p>the query being run was : '.$update_query.'</p>';
header("location: ../approveMedsForm.php");
  }
}
?>





