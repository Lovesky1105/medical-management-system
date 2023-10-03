<?php
    session_start();
    include_once "config.php";
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $nric = mysqli_real_escape_string($conn, $_POST['nric']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $access_lvl = "Patient";
    if(!empty($name) && !empty($email) && !empty($password) && !empty($phone)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){
                echo "$email - This email already exist!";
            }else{
                        $status = "Active now";
                        $agreement = "approve";
                        $encrypt_pass = md5($password);
                        $insert_query = mysqli_query($conn, "INSERT INTO users (id, name, email, password, phone, address, nric, gender, accessLVL, status, agreement)
                        VALUES (0, '{$name}', '{$email}', '{$encrypt_pass}', '{$phone}', '{$address}', '{$nric}', '{$gender}', '{$access_lvl}', '{$status}', '{$agreement}')");
                        if($insert_query){
                            $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                            if(mysqli_num_rows($select_sql2) > 0){
                                $result = mysqli_fetch_assoc($select_sql2);
                                $_SESSION['id'] = $result['id'];
                                echo "success";
                                header("location: ../index.php");
                            }else{
                                echo "This email address not Exist!";
                            }
                        }else{
                            echo "Something went wrong. Please try again!";
                        }
                    }
        }else{
            echo "$email is not a valid email!";
        }
    }else{
        echo "All input fields are required!";
    }
?>
