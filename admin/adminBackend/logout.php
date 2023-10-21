<?php
    session_start();
    if(isset($_SESSION['adminId'])){
        include_once "config.php";
        $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
        if(isset($logout_id)){
            $status = "Offline now";
            $sql = mysqli_query($conn, "UPDATE admin SET status = '{$status}' WHERE adminId ={$_GET['logout_id']}");
            if($sql){
                session_unset();
                session_destroy();
                header("location: ../adminLoginForm.php");
            }
        }else{
            header("location: ../adminDashboard.php");
        }
    }else{  
        header("location: ../adminLoginForm.php");
    }
?>