<?php
session_start();
include_once "config.php";
    $agreement = "pending";
    $appointmentId = $_POST['appointmentId'];
    $status = $_POST['agreement'];

$query="SELECT * FROM appointment WHERE appointmentId = '{$appointmentId}' AND status = '{$agreement}'";

if (isset($_POST['submitted'])) {
   
      $query = "UPDATE appointment SET 
              status = '$status' 
              WHERE appointmentId = '$appointmentId'";

      if (mysqli_query($conn, $query)) {
        $_SESSION['status'] = "appointment {$status} successfully!";
        header("location: ../viewAppointment.php");

        
    }else {
        $_SESSION['status'] = '<p style="color:red;">Could not update the data because :<br/>' .mysqli_error($conn).
                    '.</p><p>the query being run was : '.$query.'</p>';

    }
}


?>





