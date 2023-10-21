<?php
include_once "backend/config.php";
include_once "../header.php"; 
include_once "navBar.php";

?>

<html>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  

  <div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">Contact</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Get in Touch</h1>

      <form class="contact-form mt-5" action="contact.php" method="post">
        <div class="row mb-3">
          <div class="col-sm-6 py-2 wow fadeInLeft">
            <label for="fullName">Name</label>
            <input type="text" id="fullName" name="name" class="form-control" placeholder="Full name..">
          </div>
          <div class="col-sm-6 py-2 wow fadeInRight">
            <label for="emailAddress">Email</label>
            <input type="text" id="emailAddress" name="email" class="form-control" placeholder="Email address..">
          </div>
          <div class="col-12 py-2 wow fadeInUp">
            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" class="form-control" placeholder="Enter subject..">
          </div>
          <div class="col-12 py-2 wow fadeInUp">
            <label for="message">Message</label>
            <textarea id="message" name="message" class="form-control" rows="8" placeholder="Enter Message.."></textarea>
          </div>
        </div>
        <button type="submit" name="submit" class="btn btn-primary wow zoomIn">Send Message</button>

        <?php 
  use PHPMailer\PHPMailer\PHPMailer;

	require_once 'phpmailer/src/Exception.php';
	require_once 'phpmailer/src/PHPMailer.php';
	require_once 'phpmailer/src/SMTP.php';

	$mail = new PHPMailer(true);
	$alert ='';

    if (isset($_POST['submit'])) {
        $name = ($_POST['name']);
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $okay = true;

      if (empty($name) && empty($email) && empty($subject) && empty($message)) {
			echo "Please fill out all the field.<br/><br/>";
			$okay = false;
		  }

      else {
        if (empty($name)) {
          echo "First Name is required.<br/><br/>";
          $okay = false;
        }

        else if (ctype_alpha(str_replace(' ', '', $name)) == false) {
          echo "Only letters and spaces are allowed in Name field.<br/><br/>";
          $okay = false;
        }

        if (empty($email)) {
          echo "Email is required.<br/><br/>";	
          $okay = false;		
        }
              
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          echo "Invalid E-mail address.<br/><br/>";
          $okay = false;
        }

        if (empty($subject)) {
          echo "Subject is required.";
          $okay = false;
        }

        if (empty($message)) {
          echo "Message is required.";
          $okay = false;
        }
      }

      if ($okay) {
        echo "Your message has been sent successfully.";

        try{
          $mail->isSMTP();
          $mail->Host = 'smtp.gmail.com';
          $mail->SMTPAuth = true;
          $mail->Username = 'kahxiang2705@gmail.com'; // Gmail address which you want to use as SMTP server
          $mail->Password = 'mxckfnbhsifoaftd'; // Gmail address Password
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
          $mail->Port = '587';

          $mail->setFrom('kahxiang2705@gmail.com'); // Gmail address which you used as SMTP server
          $mail->addAddress('kahxiang2705@gmail.com', 'zack gan'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

          $mail->isHTML(true);
          $mail->Subject = $subject;
          $mail->Body = 'Dear <b>zack gan</b>, <br /><br />' .$name.' <br /><br />'.$email.
          '<br /><br />' .$message. '<br /><br />Sincerely, <br />' .$name.'';

          $mail->send();
          $alert = '<div class="alert-success">
                <span>Message Sent! Thank you for contacting us.</span>
              </div>';
        }

        catch (Exception $e){
          $alert = '<div class="alert-error">
                <span>'.$e->getMessage().'</span>
              </div>';
        }
      }
    }
?>
      </form>


    </div>
  </div>



<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/google-maps.js"></script>

<script src="../assets/js/theme.js"></script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIA_zqjFMsJM_sxP9-6Pde5vVCTyJmUHM&callback=initMap"></script>
  
</body>
</html>