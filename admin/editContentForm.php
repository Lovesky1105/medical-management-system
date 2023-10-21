<?php
session_start();
if(!isset($_SESSION['adminId'])){
  header("location: adminLoginForm.php");
}
include_once "adminBackend/config.php";
include_once "header.php"; 
include_once "sidebar.php"; 


?>

<html>
<body>
<main id="main" class="main">

<div class="pagetitle">
  <h1>Content Editor</h1>
</div><!-- End Page Title -->

<section class="section">
<div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit AboutUs page</h5>

              <!-- Horizontal Form -->
              <form action="adminBackend/timeController.php" method="post" class="row g-3">

              <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                    <label for="floatingName">Title</label>
                  </div>
                </div>
                
                <div class="col-12">
                  <div class="form-floating">
                    <textarea class="form-control" name="content" placeholder="Content" id="Content" style="height: 100px;"></textarea>
                    <label for="floatingTextarea">Content</label>
                  </div>
                </div>
                
                
                <div class="text-center">
                  <button type="submit" name="submit" class="btn btn-primary">Update</button>
                </div>
              </form><!-- End Horizontal Form -->

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

  