<?php
session_start();
if(!isset($_SESSION['phyId'])){
  header("location: phyLoginForm.php");
}
include_once "phyBackend/config.php";
include_once "header.php"; 
include_once "sidebar.php"; 
$agreement = "approve";
$status = "sold";

    $currentDate = date("Y/m/d");
    $cleanSearch = $_POST['search'];
    $query = "SELECT mt.transId, mt.medicineId, mt.date, mt.amountSold, mt.oriAmount, mt.newAmount, m.medicineName 
    FROM medtransaction as mt 
    LEFT JOIN medicine AS m ON mt.medicineId = m.medicineId
    WHERE date = '{$currentDate}' AND status = '{$status}'";

    if($cleanSearch != "") {
      $query = $query." AND ((m.medicineName LIKE '%$cleanSearch%') OR (mt.transId LIKE '%$cleanSearch%')) ";
    }

    $search_query = mysqli_query($conn, $query);  

    if(!$search_query) {
        die("Database query failed");
    }else{

?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1> Meds transaction record</h1>
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
            <h5 class="card-title">Search medicine sales record</h5>
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
                      echo '<form action="reason.php" method="post">';
                      echo '<div class="row">'; 
                      echo '<div class="col-lg-2 col-md-8"> ';
                      print "Transaction ID : {$row['transId']}";
                      echo "<input type='hidden' name='transId' value='{$row['transId']}'>";
                      echo '</div>';

                      echo '<div class="col-lg-2 col-md-8"> ';
                      print "Medicine Name : {$row['medicineName']}";
                      echo '</div>';

                      echo '<div class="col-lg-2 col-md-8"> ';
                      print "Transaction Date : {$row['date']}";
                      echo '</div>';

                      echo '<div class="col-lg-2 col-md-8"> ';
                      print "Amount Sold : {$row['amountSold']}";
                      echo "<input type='hidden' name='amountSold' value='{$row['amountSold']}'>";
                      echo '</div>';

                      echo '<div class="col-lg-2 col-md-8"> ';
                      print "Original Amount : {$row['oriAmount']}";
                      echo '</div>';

                      echo '<div class="col-lg-2 col-md-8"> ';
                      print "New Amount : {$row['newAmount']}";
                      echo '</div>';

                      echo '<div class="col-lg-2 col-md-8"> ';
                      echo "<input type='hidden' name='medicineId' value='{$row['medicineId']}'>";
                      echo '<button class="btn btn-outline-danger w-100" type="submit" name="refund">Delete</button>';
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



