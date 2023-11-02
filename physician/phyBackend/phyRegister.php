<?php
    session_start();
    include_once "config.php";
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $nric = mysqli_real_escape_string($conn, $_POST['nric']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $access_lvl = mysqli_real_escape_string($conn, $_POST['access_lvl']);
    if(!empty($name) && !empty($email) && !empty($password) && !empty($phone)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $sql = mysqli_query($conn, "SELECT * FROM physician WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){
                echo "$email - This email already exist!";
            }else{
                        $status = "Active now";
                        $agreement = "Pending";
                        $encrypt_pass = md5($password);
                        $insert_query = mysqli_query($conn, "INSERT INTO physician (phyId, name, nric, email, password, phone, address, gender, accessLVL, status, agreement, specialist, image, info, reset_token)
                        VALUES (0, '{$name}', '{$nric}', '{$email}', '{$encrypt_pass}', '{$phone}', NULL,  '{$gender}', '{$access_lvl}', '{$status}', '{$agreement}', NULL, NULL, NULL, NULL)");
                        if($insert_query){
                            $select_sql2 = mysqli_query($conn, "SELECT * FROM physician WHERE email = '{$email}'");
                            if(mysqli_num_rows($select_sql2) > 0){
                                $result = mysqli_fetch_assoc($select_sql2);
                                //$_SESSION['phyId'] = $result['phyId'];
                                echo "success";
                                header("location: ../waitingApprove.html");
                            }else{
                                header("location: ../loginEmailError.php");
                            }
                        }else{
                            echo "Something went wrong. Please try again!";
                        }
                    }
        }else{
            header("location: ../loginEmailError.php");
        }
    }else{
        header("location: ../inputError.html");
    }
?>
