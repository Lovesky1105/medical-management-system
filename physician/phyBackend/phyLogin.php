<?php 
    session_start();
    include_once "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $agreement = "approve";
    if(!empty($email) && !empty($password)){
        $sql = mysqli_query($conn, "SELECT * FROM physician WHERE email = '{$email}'  
         AND agreement = '{$agreement}' ");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            $user_pass = md5($password);
            $enc_pass = $row['password'];
            if($user_pass === $enc_pass){
                $status = "Active now";
                $sql2 = mysqli_query($conn, "UPDATE physician SET status = '{$status}' WHERE phyId = {$row['phyId']}");
               
                if($sql2){
                    $_SESSION['phyId'] = $row['phyId'];
                    header("location: ../dashboard.php");
                    //echo "success";
                     
                }else{
                    echo "Something went wrong. Please try again!";
                }
            }else{
                header("location: ../loginError.html");
            }
        }else{
            header("location: ../loginEmailError.html");
        }
    }else{
        header("location: ../inputError.html");
    }
?>