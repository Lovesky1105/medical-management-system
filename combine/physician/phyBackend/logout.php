<?php
    session_start();
    if(isset($_SESSION['phyId'])){
        include_once "config.php";
        $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
        if(isset($logout_id)){
            $status = "Offline now";
            $sql = mysqli_query($conn, "UPDATE physician SET status = '{$status}' WHERE phyId ={$_GET['logout_id']}");
            if($sql){
                session_unset();
                session_destroy();
                header("location: ../phyLoginForm.php");
            }
        }else{
            header("location: ../dashboard.php");
        }
    }else{  
        header("location: ../phyLoginForm.php");
    }
?>