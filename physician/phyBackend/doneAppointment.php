<?php
session_start();
if(!isset($_SESSION['phyId'])){
    header("location: phyLoginForm.php");
  }
include_once "config.php";
$status = "done";

   if(isset($_POST['done'])){
    $appointmentId = $_POST['appointmentId'];
      $done_query=" UPDATE appointment SET
      status = '$status'
      WHERE appointmentId ='$appointmentId'";
      if(mysqli_query($conn, $done_query)){
        echo '<script>alert("Edit Successfully")</script>'; 
        header("Location: ../appointmentList.php");
    }else{
        print'<p style="color:red;">Could not retrieve the data because :<br/>' .mysqli_error($conn).
                        '.</p><p>the query being run was : '.$done_query.'</p>';
    }
    }
    mysqli_close($conn);
      
    ?>