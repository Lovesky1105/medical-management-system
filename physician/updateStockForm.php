<?php
session_start();
if(!isset($_SESSION['phyId'])){
  header("location: phyLoginForm.php");
}
include_once "phyBackend/config.php";
include_once "header.php"; 
include_once "sidebar.php"; 
$agreement = "approve";

    
    $cleanSearch = $_POST['search'];
    $query = "SELECT * FROM medicine WHERE agreement= '{$agreement}'";

    if($cleanSearch != "") {
      $query = $query." AND ((medicineName LIKE '%$cleanSearch%') OR (category LIKE '%$cleanSearch%')) ";
    }

    $search_query = mysqli_query($conn, $query);  

    if(!$search_query) {
        die("No Result found");
    }else{

?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Search Meds</h1>
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
            <h5 class="card-title">Update Medicine Stock Form</h5>
                <div class="search-bar">
                    <form class="search-form d-flex align-items-center" method="POST" action="#">
                        <input type="text" name="search" placeholder="Search" title="Enter search keyword" value="<?=$cleanSearch?>">
                        <button type="submit"  title="Search"><i class="bi bi-search"></i></button>
                    </form>
                </div><!-- End Search Bar -->
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
                    while($row = mysqli_fetch_assoc($search_query)) {
                      echo '<div class="row">'; 
                      echo '<div class="col-lg-3 col-md-8"> ';
                      print "{$row['medicineName']}";
                      echo '</div>';

                      echo '<div class="col-lg-2 col-md-8"> ';
                      print "{$row['amount']}";
                      echo '</div>';

                      echo '<div class="col-lg-2 col-md-8"> ';
                      echo '<form action="viewMeds.php" method="post">';
                      echo "<input type='hidden' name='medicineId' value='{$row['medicineId']}'>";
                      echo '<button class="btn btn-primary w-100" type="submit" name="view">View</button>';
                      echo '</form>';
                      echo '</div>';

                      echo '<div class="col-lg-2 col-md-8"> ';
                      echo '<form action="updateStock.php" method="post">';
                      echo "<input type='hidden' name='medicineId' value='{$row['medicineId']}'>";
                      echo '<button class="btn btn-primary w-100" type="submit" name="submit">Update</button>';
                      echo '</form>';
                      echo '</div>';

                      echo '<div class="col-lg-2 col-md-8"> ';
                      echo '<form action="orderStock.php" method="post">';
                      echo "<input type='hidden' name='medicineId' value='{$row['medicineId']}'>";
                      echo '<button class="btn btn-primary w-100" type="submit" name="submit">Order</button>';
                      echo '</form>';
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
?>



