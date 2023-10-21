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
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){
                echo "$email - This email already exist!";
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
                    $insert_query = mysqli_query($conn, "INSERT INTO users (id, name, email, password, phone, address, nric, gender, accessLVL, status, agreement)
                    VALUES (0, '{$name}', '{$email}', '{$encrypt_pass}', '{$phone}', '{$address}', '{$encryption}', '{$gender}', '{$access_lvl}', '{$status}', '{$agreement}')");
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
                            print'<p style="color:red;">Could not retrieve the data because :<br/>' .mysqli_error($conn).
                        '.</p><p>the query being run was : '.$insert_query.'</p>';
                        }
                    }
        }else{
            echo "$email is not a valid email!";
        }
    }else{
        echo "All input fields are required!";
    }

    mysqli_close($conn);
?>
