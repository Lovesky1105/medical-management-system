<?php
session_start();
if(!isset($_SESSION['adminId'])){
  header("location: adminLoginForm.php");
}
include_once "adminBackend/config.php";
include_once "header.php"; 
include_once "sidebar.php"; 

if(isset($_POST['delete'])){
    $timeslotID =  $_POST['timeslotID'];
    $delete = mysqli_query($conn,"DELETE FROM timeslot WHERE timeslotID ='{$timeslotID}'");

    if ($delete) {
        echo '<script>alert("Delete Successfully !")</script>'; 

        
      }else {
        print'<p style="color:red;">Could not retrieve the data because :<br/>' .mysqli_error($conn).
                    '.</p><p>the query being run was : '.$sql.'</p>';


  }
}
?>

<html>
<body>
<main id="main" class="main">

<div class="pagetitle">
  <h1>Time Slot Controller</h1>
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

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Time Slot</h5>

              <!-- Horizontal Form -->
              <form action="adminBackend/timeController.php" method="post">
                <div class="row mb-3">
                  <label for="slotName" class="col-sm-2 col-form-label">Slot Name</label>
                  <div class="col-sm-10">
                  <input type="text" name="slot" placeholder="slot name" id="slotName">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="time" class="col-sm-2 col-form-label">Time</label>
                  <div class="col-sm-10">
                  <input type="time" name="time" placeholder="Please enter the time e.g. hh:mm:ss" id="time">
                  </div>
                </div>
                
                <div class="text-center">
                  <button type="submit" name="submit" class="btn btn-primary">Add</button>
                </div>
              </form><!-- End Horizontal Form -->

            </div>
          </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Current Time Slot</h5>

              <?php
              $query = "SELECT * FROM timeslot"; 

              if($r = mysqli_query($conn, $query ) ) {
                
                while ($row=mysqli_fetch_array($r)){
              
                  echo '<div class="row">';

                  echo '<div class="col-lg-2 col-md-12 label ">Slot :</div>';
                  echo '<div class="col-lg-2 col-md-12"> ';
                  print "{$row['slot']}";
                  echo '</div>';

                  echo '<div class="col-lg-2 col-md-12 label ">Time :</div>';
                  echo '<div class="col-lg-2 col-md-12"> ';
                  print "{$row['time']}";
                  echo '</div>';

                  echo '<div class="col-lg-2 col-md-12"> ';
                  echo '<form action="timeControlForm.php" method="post">';
                  echo "<input type='hidden' name='timeslotID' value='{$row['timeslotID']}'>";
                  print" <button class='btn btn-outline-danger' type='submit' name='delete' >
                      DELETE
                      </button>";
                  echo '</form>';
                  echo '</div>';


                  echo '</div>';
                  echo '<br>';
                }
              }
              
              ?>

            </div>
          </div>
        </div>
    </div>

</section>



<?php
mysqli_close($conn);
?>

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

  