<?php
session_start();
    include_once "config.php";
    $adminId = $_SESSION['adminId'];
    $slot = $_POST['slot'];
    $time = $_POST['time'];
    if(!empty($slot) && !empty($time) ){
        $sql = mysqli_query($conn, "SELECT * FROM timeslot WHERE slot = '{$slot}'");
        if(mysqli_num_rows($sql) > 0){
            $_SESSION['status'] = "$slot - This slot already exist!";
            header("Location: ../timeControlForm.php");
            exit(0);
        }else{
        $insert_query = mysqli_query($conn, "INSERT INTO timeslot (timeslotId, adminId, slot, time)
        VALUES (0, '{$adminId}', '{$slot}', '{$time}')");
        if($insert_query){
            
            $_SESSION['status'] = "Time slot added success!";
                header("location: ../timeControlForm.php");
            
        }else{
            $_SESSION['status'] = '<p style="color:red;">Could not retrieve the data because :<br/>' .mysqli_error($conn).
            '.</p><p>the query being run was : '.$insert_query.'</p>';
            header("location: ../timeControlForm.php");

        }
    }
    }else{
        $_SESSION['status'] = "All input fields are required!";
        header("location: ../timeControlForm.php");
    }
?>
