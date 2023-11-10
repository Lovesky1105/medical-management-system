<?php
    include_once "config.php";
    $slot = $_POST['slot'];
    $time = $_POST['time'];
    if(!empty($slot) && !empty($time) ){

        $insert_query = mysqli_query($conn, "INSERT INTO timeslot (timeslotId, slot, time)
        VALUES (0, '{$slot}', '{$time}')");
        if($insert_query){
            
                echo "success";
                header("location: ../adminDashboard.php");
            
        }else{
            echo "Something went wrong. Please try again!";
        }
    }else{
        echo "All input fields are required!";
    }
?>
