<?php
include_once "phyBackend/config.php";
use PHPMailer\PHPMailer\PHPMailer;
require_once 'phpmailer/src/Exception.php';
require_once 'phpmailer/src/PHPMailer.php';
require_once 'phpmailer/src/SMTP.php';

function send_password_reset( $get_email, $token){
    $mail = new PHPMailer(true);
    $mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'kahxiang2705@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'mxckfnbhsifoaftd'; // Gmail address Password
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
	$mail->Port = '587';

	$mail->setFrom('kahxiang2705@gmail.com', 'Grand Clinic'); // Gmail address which you used as SMTP server
	$mail->addAddress($get_email); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

	$mail->isHTML(true);
	$mail->Subject = 'Reset Password';
	
    $email_template = "<p>Click the following link to reset your password: </p>
                        <a href='http://localhost/fyp/combine/physician/reset-password-form.php?token=$token&email=$get_email'>Click Me</a>";

    $mail->Body = $email_template;
    $mail->send();
}

session_start();
if(isset($_POST['password_reset'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $token = md5(rand());

    $check_email = "SELECT email FROM physician WHERE email='$email' LIMIT 1";
    $check_email_run = mysqli_query($conn, $check_email);
    $row = mysqli_fetch_array($check_email_run);

    if ($row) {
        $get_email = $row['email'];
        $update_token = "UPDATE physician SET reset_token='$token' WHERE email='$get_email' LIMIT 1";
        $update_token_run = mysqli_query($conn, $update_token);

        if ($update_token_run) {
            // Assuming send_password_reset() is a valid function that sends reset instructions.
            send_password_reset( $get_email, $token);
            $_SESSION['status'] = "Password reset instructions sent to your email.";
            header("Location: phyLoginForm.php");
            exit(0);
        } else {
            $_SESSION['status'] = "Error updating reset token.";
            header("Location: reset-password-form.php");
            exit(0);
        }
    } else {
        $_SESSION['status'] = "No Email Found";
        header("Location: forgot-password.php");
        exit(0);
    }
}



?>