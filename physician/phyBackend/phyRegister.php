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
        if (is_numeric($phone) && is_numeric($nric)) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $password)) {
                $_SESSION['status'] = "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
                header("Location: ../phyRegisterForm.php");
            } else{
            $sql = mysqli_query($conn, "SELECT * FROM physician WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){
                echo "$email - This email already exist!";
            }else{
                        $status = "Active now";
                        $agreement = "Pending";
                        $encrypt_pass = md5($password);
                        $insert_query = mysqli_query($conn, "INSERT INTO physician (phyId, name, nric, email, password, phone, address, gender, accessLVL, status, adminId, agreement, specialist, image, info, reset_token)
                        VALUES (0, '{$name}', '{$nric}', '{$email}', '{$encrypt_pass}', '{$phone}', NULL,  '{$gender}', '{$access_lvl}', '{$status}',  NULL,'{$agreement}', NULL, NULL, NULL, NULL)");
                        if($insert_query){
                            $select_sql2 = mysqli_query($conn, "SELECT * FROM physician WHERE email = '{$email}'");
                            if(mysqli_num_rows($select_sql2) > 0){
                                $result = mysqli_fetch_assoc($select_sql2);
                                //$_SESSION['phyId'] = $result['phyId'];
                                echo "success";
                                header("location: ../waitingApprove.html");
                            }else{
                                header("location: ../loginEmailError.html");
                            }
                        }else{
                            echo "Something went wrong. Please try again!";
                        }
                    }
                }//close check password
                
        }else{
            header("location: ../loginEmailError.html");
        }
    }else{
        header("Location: ../loginPasswordError.html");
    }
    }else{
        header("location: ../inputError.html");
    }
?>
