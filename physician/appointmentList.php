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
      <h1>Approved Appointment List</h1>
      
    </div><!-- End Page Title -->

    <section class="section">
    <?php
        if(isset($_SESSION['status']))
        {
            ?>
            <div class="alert alert-primary">
                <h5>
                    <?= $_SESSION['status']; ?>
                </h5>
            </div>
            <?php
            unset($_SESSION['status']);
        }        
      ?>
      <div class="row">
        <div class="col-lg-12">

          
            <?php
                $query="SELECT * FROM appointment WHERE phyId='".$_SESSION['phyId']."' AND status ='approve' ORDER BY date DESC ";
                
                
                if($r = mysqli_query($conn, $query ) ) {
                
                    while ($row=mysqli_fetch_array($r)){
                    
                        echo '<div class="card">';
                        echo '<div class="card-body">';

                        echo '<form action="phyBackend/doneAppointment.php" method="POST">';
                        $appointmentId = "{$row['appointmentId']}";
                        echo "<input type='hidden' name='appointmentId' value='{$appointmentId}'>";
                        print "<p>Patient ID: {$row['id']}</p>";
                        print "<p>Patient Name: {$row['patientName']}</p>";
                        print "<p>Patient Gender: {$row['patientGender']}</p>";
                        print "<p>Patient Email: {$row['patientEmail']}</p>";
                        print "<p>Patient Phone: {$row['patientPhone']}</p>";
                        print "<p>date : {$row['date']}</p>";
                        print "<p>slot : {$row['slot']}</p>";
                        print "<p>Message : {$row['msg']}</p>";
                        echo '<button class="btn btn-success w-100" type="submit" name="done">Done</button>';
                        echo '</form>';
                        echo '</div>';
                        echo '</div>';
                        
                            }
                        
                        
                    }else{
                        print'<p style="color:red;">Could not retrieve the data because :<br/>' .mysqli_error($conn).
                        '.</p><p>the query being run was : '.$query.'</p>';
                    }
                
                   
                
                ?>
        </div>
      </div>
    </section>

  

  </main><!-- End #main -->


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

  <?php
   mysqli_close($conn);
  ?>
</body>

</html>