<?php
include_once "config.php";



    $agreement = "pending";
    $medicineId = $_POST['medicineId'];
 //$appointmentId = mysqli_real_escape_string($conn, $_POST['appointmentId']);

 

$query="SELECT * FROM medicine WHERE medicineId = '{$medicineId}' AND status = '{$agreement}'";

if (isset($_POST['approve'])) {
   
    
      // update database
      $query = "UPDATE appointment SET 
              agreement = 'approve' 
              WHERE medicineId = '$medicineId' "
              ;

      if (mysqli_query($conn, $query)) {
        print "Medicine approve successfully!";
        header("location: ../approveMedsForm.php");

        
    }else {
        print "got problem";

    }
}

if (isset($_POST['reject'])) {
   
    
    // update database
    $query = "UPDATE medicine SET 
            agreement = 'reject' 
            WHERE medicineId = '$medicineId' "
            ;

    if (mysqli_query($conn, $query)) {
      print "Medicine approve successfully!";
      header("location: ../approveMedsForm.php");

      
  }else {
      print "got problem";

  }
}


?>





