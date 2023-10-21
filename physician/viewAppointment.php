<?php
session_start();
if(!isset($_SESSION['phyId'])){
  header("location: phyLoginForm.php");
}
include_once "phyBackend/config.php";
include_once "header.php"; 
include_once "sidebar.php"; 

?>

<body>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Appointment List Pending to approve</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Blank</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          
            <?php
                $query="SELECT * FROM appointment WHERE phyId='".$_SESSION['phyId']."' AND status ='pending' ";
                
                
                if($r = mysqli_query($conn, $query ) ) {
                
                    while ($row=mysqli_fetch_array($r)){
                    
                        echo '<div class="card">';
                        echo '<div class="card-body">';

                        echo '<form action="phyBackend/approveAppointment.php" method="POST">';
                        $appointmentId = $row['appointmentId'];
                        echo "<input type='hidden' name='appointmentId' value='{$appointmentId}'>";
                        print "<p>Patient ID: {$row['id']}</p>";
                        print "<p>Patient Name: {$row['patientName']}</p>";

                         
                        $method = "AES-256-CBC";
                        $key = "secret";
                        
                        if (isset($row['patientNRIC'])) {
                            $encryption = $row['patientNRIC'];
              
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
                                echo "Patient NRIC: ******-**-" . substr($decryption,8);
                            }
                        } else {
                            // Handle the case where NRIC is not set in the database
                            echo "NRIC data is missing.";
                        }
                      

                        print "<p>Patient Gender: {$row['patientGender']}</p>";
                        print "<p>Patient Email: {$row['patientEmail']}</p>";
                        print "<p>Patient Phone: {$row['patientPhone']}</p>";
                        print "<p>date : {$row['date']}</p>";
                        print "<p>slot : {$row['slot']}</p>";
                        print "<p>Message : {$row['msg']}</p>";
                        
                        echo' <select name="agreement" id="agreement" >
                            <option value="approve">Approve</option>
                            <option value="reject">Reject</option>
                        </select>';
                
                        print" <button type='submit' name='submitted' >
                        Submit
                        </button>";

                        echo '</form>';
                        echo '</div>';
                        echo '</div>';
                        
                            }
                        
                        
                    }else{
                        print'<p style="color:red;">Could not retrieve the data because :<br/>' .mysqli_error($conn).
                        '.</p><p>the query being run was : '.$query.'</p>';
                    }
                
                    mysqli_close($conn);
                
                ?>
              
            

        </div>

       
      </div>
    </section>

  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>