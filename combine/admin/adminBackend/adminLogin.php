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
                    echo "Something went wrong. Please try again!";
                }
            }else{
                echo "Email or Password is Incorrect!";
            }
        }else{
            echo "$email - This email not Exist!";
        }
    }else{
        echo "All input fields are required!";
    }
?>