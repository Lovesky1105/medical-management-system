<?php
session_start();
include_once "config.php";
    $agreement = "pending";
    $appointmentId = $_POST['appointmentId'];

$query="SELECT * FROM appointment WHERE appointmentId = '{$appointmentId}' AND status = '{$agreement}'";

if (isset($_POST['submitted'])) {
   
      $query = "UPDATE appointment SET 
              status = 'approve' 
              WHERE appointmentId = '$appointmentId'";

      if (mysqli_query($conn, $query)) {
        $_SESSION['status'] = "appointment approve successfully!";
        header("location: ../viewAppointment.php");

        
    }else {
        $_SESSION['status'] = '<p style="color:red;">Could not update the data because :<br/>' .mysqli_error($conn).
                    '.</p><p>the query being run was : '.$query.'</p>';

    }
}


?>





