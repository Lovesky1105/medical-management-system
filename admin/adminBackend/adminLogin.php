<?php 
    session_start();
    include_once "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $access_lvl = "admin";
    $agreement = "approve";
    if(!empty($email) && !empty($password)){
        $sql = mysqli_query($conn, "SELECT * FROM admin WHERE adminEmail = '{$email}' AND 
        accessLVL = '{$access_lvl}'");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            $user_pass = md5($password);
            $enc_pass = $row['adminPassword'];
            if($user_pass === $enc_pass){
                $status = "Active now";
                $sql2 = mysqli_query($conn, "UPDATE admin SET status = '{$status}' WHERE adminId = {$row['adminId']}");
               
                if($sql2){
                    $_SESSION['adminId'] = $row['adminId'];
                    header("location: ../adminDashboard.php");
                    //echo "success";
                     
                }else{
                    $_SESSION['error'] = "Something went wrong. Please try again!";
                    header("location: ../adminLoginForm.php");
                }
            }else{
                $_SESSION['error'] = "Email or Password is Incorrect!";
                header("location: ../adminLoginForm.php");
            }
        }else{
            $_SESSION['error'] = "$email - This email not Exist!";
            header("location: ../adminLoginForm.php");
        }
    }else{
        $_SESSION['error'] = "All input fields are required!";
        header("location: ../adminLoginForm.php");
    }
?>