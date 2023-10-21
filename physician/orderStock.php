<?php
session_start();
if(!isset($_SESSION['phyId'])){
    header("location: phyLoginForm.php");
  }
include_once "phyBackend/config.php";
include_once "header.php"; 
include_once "sidebar.php"; 

  if (isset($_POST['submit'])) {
    $medicineId =  $_POST['medicineId'];

    $query = "SELECT * FROM medicine WHERE medicineId = '{$medicineId}'"; 


?>

<html>

<body>



  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Medicine Detail (Order)</h1>
      
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        

        <div class="col-xl-12">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              
              <div class="tab-content pt-2">

                  <h5 class="card-title">Medicine Details</h5>

                  <?php
                  if($r = mysqli_query($conn, $query ) ) {
                
                    while ($row=mysqli_fetch_array($r)){
                  
                      echo '<div class="row">';
                      echo '<div class="col-lg-3 col-md-4 label ">Name</div>';
                      echo '<div class="col-lg-8 col-md-12"> ';
                      print "{$row['medicineName']}";
                      $medicineName = "{$row['medicineName']}";
                      echo '</div>';
                      echo '</div>';

                      echo '<div class="row">';
                      echo '<div class="col-lg-3 col-md-4 label ">Current Amount</div>';
                      echo '<div class="col-lg-8 col-md-12"> ';
                      print "{$row['amount']}";
                      echo '</div>';
                      echo '</div>';

                      echo '<div class="row">';
                      echo '<div class="col-lg-3 col-md-4 label ">Category</div>';
                      echo '<div class="col-lg-8 col-md-12"> ';
                      print "{$row['category']}";
                      echo '</div>';
                      echo '</div>';

                      echo '<div class="row">';
                      echo '<div class="col-lg-3 col-md-4 label ">Medicine efficacy</div>';
                      echo '<div class="col-lg-8 col-md-12"> ';
                      print "{$row['efficacy']}";
                      echo '</div>';
                      echo '</div>';

                      echo '<div class="row">';
                      echo '<div class="col-lg-3 col-md-4 label ">Important notes</div>';
                      echo '<div class="col-lg-8 col-md-12"> ';
                      print "{$row['impNotes']}";
                      echo '</div>';
                      echo '</div>';

                      echo '</div>';
                      echo '</div>';
                      echo '</div>';

                  
                    }
                  
                  }
                        
                        
                }else{
                    print'<p style="color:red;">Could not retrieve the data because :<br/>' .mysqli_error($conn).
                    '.</p><p>the query being run was : '.$query.'</p>';
                }
            ?>
             
            

            <form action="phyBackend/orderMed.php" method="post" enctype="multipart/form-data">
            <div class="row mt-5 ">
                  <div class="col-12 col-sm-6 ">
                  <div class="col-lg-3 col-md-4 label ">amount of sold</div>
                    <input type="text" name="orderAmount" class="form-control" placeholder="amount of sold">
                  </div>
                  <input type="hidden" name="medicineId" value="<?php echo "$medicineId";?>">
                  <input type="hidden" name="medicineName" value="<?php echo "$medicineName";?>">
                  <button type='submit' name='confirm' >
                        confirm
                        </button>
              </form>
                </div>
                </div>

                <?php
            mysqli_close($conn);
            ?>
              </div><!-- End Bordered Tabs -->

            </div>
          </div>

    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

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

