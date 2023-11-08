<?php
session_start();
include_once "backend/config.php";

if (isset($_POST['password_update'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $new_password = mysqli_real_escape_string($conn, $_POST['newPassword']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirmPassword']);

    $token = mysqli_real_escape_string($conn, $_POST['password_token']);

    if (!empty($token)) {

        if (!empty($new_password) && !empty($confirm_password)) {
            
            // Checking Token is valid or not
            $check_token = "SELECT reset_token FROM users WHERE reset_token='$token' LIMIT 1";
            $check_token_run = mysqli_query($conn, $check_token);

            if (mysqli_num_rows($check_token_run) > 0) {
                if ($new_password == $confirm_password) {
                    if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $new_password)) {
                $_SESSION['status'] = "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
                header("Location: reset-password-form.php?token=$token&email=$email");
            } else {
                    // Hash the new password before storing it
                    $hashed_password = md5($new_password);

                    $update_password = "UPDATE users SET password='$hashed_password' WHERE reset_token='$token' LIMIT 1";
                    $update_password_run = mysqli_query($conn, $update_password);

                    if ($update_password_run) {
                        // Update the token before redirecting
                        $new_token = md5(rand()) . "token change"; // Generate a new token here
                        $update_to_new_token = "UPDATE users SET reset_token='$new_token' WHERE reset_token='$token' LIMIT 1";
                        $update_to_new_token_run = mysqli_query($conn, $update_to_new_token);

                        header("Location: loginForm.php");
                        exit(0);
                    } else {
                        $_SESSION['status'] = "There is an error. Your password was not updated!";
                        header("Location: reset-password-form.php?token=$token&email=$email");
                        exit(0);
                    }
                }//close check password

                } else {
                    $_SESSION['status'] = "Password and Confirm Password do not match";
                    header("Location: reset-password-form.php?token=$token&email=$email");
                    exit(0);
                }

            } else {
                $_SESSION['status'] = "Invalid token";
                header("Location: reset-password-form.php?token=$token&email=$email");
                exit(0);
            }

        } else {
            $_SESSION['status'] = "Please fill in all the fields";
            header("Location: reset-password-form.php?token=$token&email=$email");
            exit(0);
        }
    

    } else {
        $_SESSION['status'] = "No Token Available";
        header("Location: getEmail.php");
        exit(0);
    }
}
?>