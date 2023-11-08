<?php
session_start();
if(!isset($_SESSION['phyId'])){
  header("location: phyLoginForm.php");
}
include_once "phyBackend/config.php";
include_once "header.php"; 
include_once "sidebar.php"; 
$agreement = "approve";

if (isset($_POST['view'])) {

    $medicineId =  $_POST['medicineId'];
    $query = "SELECT * FROM medicine WHERE agreement= '{$agreement}' AND medicineId = '{$medicineId}' ";
    $view_query = mysqli_query($conn, $query);  

    if(!$view_query) {
        die("Database query failed");
    }else{

?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>View Meds</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <!--responsive card-->
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
            <h5 class="card-title">Result</h5>
                <?php
                    while($row = mysqli_fetch_assoc($view_query)) {
                      echo '<div class="row">'; 

                      echo '<div class="col-lg-12 col-md-8"> ';
                      print "Medicine ID: {$row['medicineId']}";
                      echo "<br/>";
                      echo "<br/>";
                      echo '</div>';

                      echo '<div class="col-lg-12 col-md-8"> ';
                      print "Medicine Name: {$row['medicineName']}";
                      echo "<br/>";
                      echo "<br/>";
                      echo '</div>';

                      echo '<div class="col-lg-12 col-md-8"> ';
                      print "Apporve By: {$row['phyId']}";
                      echo "<br/>";
                      echo "<br/>";
                      echo '</div>';

                      echo '<div class="col-lg-12 col-md-8"> ';
                      print "Medicine Efficacy: {$row['efficacy']}";
                      echo "<br/>";
                      echo "<br/>";
                      echo '</div>';

                      echo '<div class="col-lg-12 col-md-8"> ';
                      print "Medicine Important Notes: {$row['impNotes']}";
                      echo "<br/>";
                      echo "<br/>";
                      echo '</div>';

                      echo '<div class="col-lg-12 col-md-8"> ';
                      print "Medicine Amount: {$row['amount']}";
                      echo "<br/>";
                      echo "<br/>";
                      echo '</div>';

                      echo '<div class="col-lg-12 col-md-8"> ';
                      print "Medicine Category: {$row['category']}";
                      echo "<br/>";
                      echo "<br/>";
                      echo '</div>';
                      
                      echo '<div class="col-lg-12 col-md-8"> ';
                      print "Agreement: {$row['agreement']}";
                      echo "<br/>";
                      echo "<br/>";
                      echo '</div>';

                      echo '<div class="col-lg-2 col-md-8"> ';
                      echo "<form action='editMedsForm.php' method='post'>";
                      echo "<input type='hidden' name='medicineId' value='{$row['medicineId']}'> ";
                      echo '<button class="btn btn-primary w-100" type="submit" name="edit">Edit</button>';
                      echo '</form>';
                      echo "<br/>";
                      echo "<br/>";
                      echo '</div>';
                      

                      echo '</div>';
                      }
                    }
                ?>
                
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
    mysqli_close($conn);

  }else{
    header("location: updateStockForm.php");
  } 
    
?>



