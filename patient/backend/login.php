<?php 
    session_start();
    include_once "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $access_lvl = "Patient";
    $agreement = "approve";
    if(!empty($email) && !empty($password)){
        $sql = mysqli_query($conn, "SELECT * FROM users 
        WHERE email = '{$email}' AND accessLVL = '{$access_lvl}' AND agreement = '{$agreement}' ");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            $user_pass = md5($password);
            $enc_pass = $row['password'];
            if($user_pass === $enc_pass){
                $status = "Active now";
                $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE id = {$row['id']}");
               
                if($sql2){
                    $_SESSION['id'] = $row['id'];
                    header("location: ../index.php");
                     
                }else{
                    $_SESSION['status'] = '<p style="color:red;">Could not update the data because :<br/>' .mysqli_error($conn).
                    '.</p><p>the query being run was : '.$sql2.'</p>';
                    header("Location: ../loginForm.php");
                    exit(0);
                }
            }else{
                $_SESSION['status'] =  "Email or Password is Incorrect!";
                header("Location: ../loginForm.php");
                exit(0);
            }
        }else{
            $_SESSION['status'] = "$email - This email not Exist!";
            header("Location: ../loginForm.php");
            exit(0);
        }
    }else{
        $_SESSION['status'] =  "All input fields are required!";
        header("Location: ../loginForm.php");
        exit(0);
    }
?>


