<?php
include_once "config.php";



    $agreement = "pending";
    $appointmentId = $_POST['appointmentId'];
 //$appointmentId = mysqli_real_escape_string($conn, $_POST['appointmentId']);

 

$query="SELECT * FROM appointment WHERE appointmentId = '{$appointmentId}' AND status = '{$agreement}'";

if (isset($_POST['submitted'])) {
   
    
      // update database
      $query = "UPDATE appointment SET 
              status = 'approve' 
              WHERE appointmentId = '$appointmentId' "
              ;

      if (mysqli_query($conn, $query)) {
        print "appointment approve successfully!";
        header("location: ../viewAppointment.php");

        
    }else {
        print "got problem";

    }
}


?>





