<?php
session_start();
if(!isset($_SESSION['phyId'])){
  header("location: phyLoginForm.php");
}
include_once "phyBackend/config.php";
include_once "header.php"; 
include_once "sidebar.php"; 
$agreement = "approve";

if (isset($_POST['edit'])) {
    $medicineId =  $_POST['medicineId'];
?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Meds</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
            <h5 class="card-title">Medicine Information</h5>
                
            </div>
          </div>
        </div>
      </div><!--end row-->

      <!--responsive card-->
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
            <h5 class="card-title">Result</h5>
            <?php
            if(isset($_SESSION['status']))
                    {
                        ?>
                        <div class="alert alert-success">
                            <h5>
                                <?= $_SESSION['status']; ?>
                            </h5>
                        </div>
                        <?php
                        unset($_SESSION['status']);
                    }  
            ?>
            <form action="phyBackend/editMeds.php" method="post" enctype="multipart/form-data">
            <div class="row mt-5 ">
                  <div class="col-12 col-sm-12 ">
                  <div class="col-lg-3 col-md-4 label ">New Medicine Name</div>
                    <input type="text" name="medicineName" class="form-control" placeholder="New Medicine Name">
                    <br/>
                  </div>
                  
                  <div class="col-12 col-sm-12 ">
                  <div class="col-lg-3 col-md-4 label ">Medicine Ediicacy</div>
                    <input type="text" name="efficacy" class="form-control" placeholder="Medicine Ediicacy">
                    <br/>
                  </div>

                  <div class="col-12 col-sm-12 ">
                  <div class="col-lg-3 col-md-4 label ">Important Notes</div>
                    <input type="text" name="impNotes" class="form-control" placeholder="Important Notes">
                    <br/>
                  </div>

                  <div class="col-12 col-sm-12 ">
                  <div class="col-lg-3 col-md-4 label ">Medicine Category</div>
                    <input type="text" name="category" class="form-control" placeholder="Medicine Category">
                    <br/>
                  </div>

                  <input type="hidden" name="medicineId" value="<?php echo "$medicineId";?>">
                  <button type='submit' name='edit' >Edit</button>
              </form>
                
            </div>
          </div>
        </div>
      </div><!--end row-->
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
<?php
}
    mysqli_close($conn);
?>



