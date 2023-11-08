<?php
session_start();
if(!isset($_SESSION['phyId'])){
  header("location: phyLoginForm.php");
}
include_once "phyBackend/config.php";
include_once "header.php"; 
include_once "sidebar.php"; 

  if (isset($_POST['refund'])) {
    $medicineId =  $_POST['medicineId'];
    $transId =  $_POST['transId'];
    $amountSold =  $_POST['amountSold'];

    $query = "SELECT * FROM medtransaction WHERE transId = '{$transId}'"; 


?>

<html>

<body>



  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Delete transaction reason</h1>
      
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        

        <div class="col-xl-12">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              
              <div class="tab-content pt-2">

                  <h5 class="card-title">Transaction Details</h5>

                  <?php
                  if($r = mysqli_query($conn, $query ) ) {
                
                    while ($row=mysqli_fetch_array($r)){
                  
                      echo '<div class="row">';
                      echo '<div class="col-lg-3 col-md-4 label ">Transaction Id : </div>';
                      echo '<div class="col-lg-8 col-md-12"> ';
                      print "{$row['transId']}";
                      echo '</div>';
                      echo '</div>';

                      echo '<div class="row">';
                      echo '<div class="col-lg-3 col-md-4 label ">Amount : </div>';
                      echo '<div class="col-lg-8 col-md-12"> ';
                      print "{$row['amountSold']}";
                      echo '</div>';
                      echo '</div>';

                      echo '<div class="row">';
                      echo '<div class="col-lg-3 col-md-4 label ">Date : </div>';
                      echo '<div class="col-lg-8 col-md-12"> ';
                      print "{$row['date']}";
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
             
            

            <form action="refund.php" method="post" enctype="multipart/form-data">
            <div class="row mt-5 ">
                  <div class="col-12 col-sm-6 ">
                  <div class="col-lg-3 col-md-4 label ">Reason</div>
                    <input type="text" name="reason" class="form-control" rows="6" placeholder="Reason of delete transaction" required>
                  </div>
                  

                  <input type="hidden" name="medicineId" value="<?php echo "$medicineId";?>">
                  <input type="hidden" name="transId" value="<?php echo "$transId";?>">
                  <input type="hidden" name="amountSold" value="<?php echo "$amountSold";?>">
                  
             
                </div>
                </div>
                <button type='submit' name='confirm' >
                        confirm
                        </button>
                </form>
                <?php
            mysqli_close($conn);
            ?>
              </div><!-- End Bordered Tabs -->

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

