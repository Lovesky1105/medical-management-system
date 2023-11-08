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
    if(!empty($name) && !empty($email) && !empty($password) && !empty($phone) && !empty($nric)){
        if (is_numeric($phone) && is_numeric($nric)) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $password)) {
                $_SESSION['status'] = "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
                header("Location: ../registerForm.php");
            } else {
                
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){
                $_SESSION['status'] = "$email - This email already exist!";
                header("Location: ../registerForm.php");
                exit(0);
            }else{

                // Storingthe cipher method
                $ciphering = "AES-128-CTR";
                // Using OpenSSl Encryption method
                $iv_length = openssl_cipher_iv_length($ciphering);
                $options = 0;
                // Non-NULL Initialization Vector for encryption
                $encryption_iv = '1234567891011121';
                // Storing the encryption key
                $encryption_key = "GrandClinic123";
                // Using openssl_encrypt() function to encrypt the data
                $encryption = openssl_encrypt($nric, $ciphering, $encryption_key, $options, $encryption_iv);

                    $status = "Active now";
                    $agreement = "approve";
                    $encrypt_pass = md5($password);
                    $insert_query = mysqli_query($conn, "INSERT INTO users (id, name, email, password, phone, address, nric, gender, 
                    accessLVL, status, agreement, reset_token)
                    VALUES (0, '{$name}', '{$email}', '{$encrypt_pass}', '{$phone}', '{$address}', '{$encryption}', '{$gender}', 
                    '{$access_lvl}', '{$status}', '{$agreement}', NULL)");
                    if($insert_query){
                        $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                        if(mysqli_num_rows($select_sql2) > 0){
                            $result = mysqli_fetch_assoc($select_sql2);
                            $_SESSION['id'] = $result['id'];
                            echo "success";
                            header("location: ../index.php");
                        }else{
                            $_SESSION['status'] = "This email address not Exist!";
                            header("Location: ../registerForm.php");
                            exit(0);
                        }
                        }else{
                            $_SESSION['status'] = '<p style="color:red;">Could not insert the data because :<br/>' .mysqli_error($conn).
                            '.</p><p>the query being run was : '.$insert_query.'</p>';
                            header("Location: ../registerForm.php");
                            exit(0);
                        }
                    }
                }//close pasword checker
        }else{
            $_SESSION['status'] = "$email is not a valid email!";
            header("Location: ../registerForm.php");
            exit(0);
        }
    }else{
        $_SESSION['status'] = "phone or IC is not a number!";
        header("Location: ../registerForm.php");
        exit(0);
    }
    }else{
        $_SESSION['status'] = "All input fields are required!";
        header("Location: ../registerForm.php");
        exit(0);
    }

    mysqli_close($conn);
?>
