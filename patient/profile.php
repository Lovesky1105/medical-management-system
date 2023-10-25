<?php 
  session_start();
  include_once "backend/config.php";
  include_once "../header.php"; 
  include_once "navBar.php"; 
  if(!isset($_SESSION['id'])){
    header("location: loginForm.php");
  }
?>


<html>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

 
  <div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        
        <h1 class="font-weight-normal">Profile</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <?php
                $query="SELECT * FROM users WHERE id='".$_SESSION['id']."' ";
                //$query2="SELECT phone FROM users WHERE id='".$_SESSION['id']."' ";
                //$query3="SELECT RIGHT(phone, 4) FROM users WHERE id='".$_SESSION['id']."' ";
                
                
                if($r = mysqli_query($conn, $query ) ) {
                
                    while ($row=mysqli_fetch_array($r)){
                    
                      ?>

  <div class="page-section">
    <div class="container">
        
      <h1 class="text-center wow fadeInUp">Account Detail</h1>
        <div class="row mb-3">

        <form action="editProfileForm.php" mathod="post">
          <div class="col-sm-6 py-2 wow fadeInLeft">
            
            <p>Name: <?php echo "{$row['name']}"; ?></p>
          </div>

          <div class="col-sm-6 py-2 wow fadeInRight">
          <?php 
          $method = "AES-256-CBC";
          $key = "secret";
          
          if (isset($row['nric'])) {
              $encryption = $row['nric'];

              // Storingthe cipher method
              $ciphering = "AES-128-CTR";

              // Using OpenSSl Encryption method
              $iv_length = openssl_cipher_iv_length($ciphering);
              $options = 0;

              // Storing the encryption key
              $decryption_key = "GrandClinic123";

              $decryption_iv = '1234567891011121';
          
              
              // Using openssl_decrypt() function to decrypt the data
              $decryption = openssl_decrypt($encryption, $ciphering, $decryption_key, $options, $decryption_iv);
          
              if ($decryption === false) {
                  // Handle decryption error
                  echo "Decryption failed: " . openssl_error_string();
              } else {
                  // Display the decrypted value
                  echo "NRIC: ******-**-" . substr($decryption,8);
              }
          } else {
              // Handle the case where NRIC is not set in the database
              echo "NRIC data is missing.";
          }
        ?>
          
          </div>

          <div class="col-sm-6 py-2 wow fadeInLeft">
            <p>email: <?php echo "{$row['email']}"; ?></p>
          </div>
          
          <div class="col-sm-6 py-2 wow fadeInRight">
            <?php $phNo = substr($row['phone'], 5); ?>
            <p>Contact Number: ***-***<?php echo "{$phNo}"; ?></p>
        </div>

            <?php
            print" <button type='submit' name='submit' value ='submit' class='btn btn-light wow zoomIn' >Edit Profile</button>";
            print" <button class='btn btn-light wow zoomIn' role='button'><a href='backend/logout.php?logout_id= {$row['id']}' class='logout'>Logout</a></button>";
            ?>
        </form>
        </div>
    </div>
  </div>
  

  <?php           
    }
    }else{
        print'<p style="color:red;">Could not retrieve the data because :<br/>' .mysqli_error($conn).
        '.</p><p>the query being run was : '.$query.'</p>';
    }
  ?>

                <div class="page-section">
                <div class="container">
                <h1 class="text-center wow fadeInUp">Appointment History</h1>


    <?php
        $query2="SELECT * FROM appointment 
        WHERE id='".$_SESSION['id']."' 
        ORDER BY date DESC";

        if($r = mysqli_query($conn, $query2 ) ) {
            
            while ($row=mysqli_fetch_array($r)){
            //$phyId = "{$row['phyId']}";
            $phyId = $row['phyId'];

            $query3 = "SELECT * FROM physician WHERE phyId = '$phyId' ";
          
        if ($result = mysqli_query($conn, $query3)) {
            while ($physician = mysqli_fetch_array($result)) {
                $phyName = $physician['name']; // Get the physician name from query3
            }
            mysqli_free_result($result);
        } else {
            echo "Error in query3: " . mysqli_error($conn);
        }
        
                    
          echo '<div class="row mb-3">';
          echo '<div class="col-sm-6 py-2 wow fadeInLeft">';
          echo "Appointment ID:  {$row["appointmentId"]} </p>";
          echo '</div>';

          echo '<div class="col-sm-6 py-2 wow fadeInRight">';
          echo "<p>Patient Name: {$row["patientName"]}</p>";
          echo '</div>';

          echo '<div class="col-sm-6 py-2 wow fadeInLeft">';
          echo "<p>Appointment Date: {$row["date"]}</p>";
          echo '</div>';
          
          echo '<div class="col-sm-6 py-2 wow fadeInRight">';
          echo "<p>Appointment Slot: {$row["slot"]}";
          echo '</div>';

          echo '<div class="col-sm-6 py-2 wow fadeInLeft">';
          echo "<p>Doctor Name: {$phyName}</p>";
          echo '</div>';

          echo '<div class="col-sm-6 py-2 wow fadeInRight">';
          echo "<p>Appointment Status: {$row["status"]}</p>";
          echo '</div>';

          echo '</div>';//end row        
          }        
            }else{
                print'<p style="color:red;">Could not retrieve the data because :<br/>' .mysqli_error($conn).
                '.</p><p>the query being run was : '.$query2.'</p>';
            }
            mysqli_free_result($r);
            mysqli_close($conn);
            
      echo '</div>'; // end container
      echo '</div>';
      ?>


<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/google-maps.js"></script>

<script src="../assets/js/theme.js"></script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIA_zqjFMsJM_sxP9-6Pde5vVCTyJmUHM&callback=initMap"></script>
  
</body>
</html>

