<?php
session_start();
if(!isset($_SESSION['phyId'])){
  header("location: phyLoginForm.php");
}
include_once "phyBackend/config.php";
include_once "header.php"; 
include_once "sidebar.php"; 
?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add New Medicine</h1>
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
              <h5 class="card-title">Add Medicine Form</h5>
              <form class="main-form" action="phyBackend/addMed.php" method="post">
        <div class="row mt-5 ">

        
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <input type="text" name="medName" class="form-control" placeholder="Medicine Name ">
          </div>

          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
          <input type="text" name="amount" class="form-control" placeholder="amount">
          </div>

          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="efficacy" id="efficacy" class="form-control" rows="6" placeholder="Medical Efficacy"></textarea>
          </div>

          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="impNotes" id="impNotes" class="form-control" rows="6" placeholder="Important notes of medicine"></textarea>
          </div>
          
            <div class="col-sm-10" class="col-12 py-2 ">
              <select name="category" class="form-select" aria-label="Default select example">
                <option selected> Open this to select medicine category</option>
                <option value="type 1">type 1 </option>
                <option value="type 2">type 2 </option>
                <option value="type 3">type 3 </option>
                <option value="type 4">type 4 </option>
                <option value="type 5">type 5 </option>
              </select>
            </div>
        </div>

        <button type="submit" name="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
      </form>
            </div>
          </div>

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

</body>

</html>