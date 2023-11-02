<?php
session_start();
if(!isset($_SESSION['phyId'])){
  header("location: phyLoginForm.php");
}
include_once "phyBackend/config.php";
include_once "header.php"; 
include_once "sidebar.php"; 
$agreement = "pending";
$phyId = $_SESSION['phyId'];

$sql = "SELECT phyId, accessLvl FROM physician WHERE phyId = $phyId AND accessLvl = 'doctor'";
$r = mysqli_query($conn, $sql );

if($r && mysqli_num_rows($r) > 0){

    
    $cleanSearch = $_POST['search'];
    $query = mysqli_query($conn, "SELECT * FROM medicine WHERE agreement= '{$agreement}'");  
    
    if(!$query) {
        die("Database query failed");
    }

?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Approve Medicine</h1>
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

      <!--responsive card-->
      <?php
        while($row = mysqli_fetch_assoc($query)) {
        echo '<div class="row">';
            echo '<div class="col-lg-12">';

            echo '<div class="card">';
                echo '<div class="card-body">'; 
                    echo '<h5 class="card-title">Result</h5>';
                            
                        echo '<div class="row">'; 
                            echo '<div class="col-lg-3 col-md-8"> ';
                            print "{$row['medicineName']}";
                            echo '</div>';

                            echo '<div class="col-lg-2 col-md-8"> ';
                            print "{$row['amount']}";
                            echo '</div>';

                            echo '<div class="col-lg-2 col-md-8"> ';
                            print "{$row['efficacy']}";
                            echo '</div>';

                            echo '<div class="col-lg-2 col-md-8"> ';
                            print "{$row['impNotes']}";
                            echo '</div>';

                            echo '<div class="col-lg-2 col-md-8"> ';
                            print "{$row['category']}";
                            echo '</div>';


                            echo '<div class="col-lg-2 col-md-8"> ';
                            echo '<form action="phyBackend/approveMeds.php" method="post">';
                            echo "<input type='hidden' name='medicineId' value='{$row['medicineId']}'>";
                            echo '<button class="btn btn-primary w-100" type="submit" name="approve">Approve</button>';
                            echo '</form>';
                            echo '</div>';

                            echo '<div class="col-lg-2 col-md-8"> ';
                            echo '<form action="phyBackend/approveMeds.php" method="post">';
                            echo "<input type='hidden' name='medicineId' value='{$row['medicineId']}'>";
                            echo '<button class="btn btn-primary w-100" type="submit" name="reject">Reject</button>';
                            echo '</form>';
                            echo '</div>';
                        echo '</div>';

                    echo '</div>';
                echo ' </div>';
            echo '</div>'; 
        echo '</div>';//end row
      }
      ?>
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
}else {
  // The user does not have 'doctor' access level
  echo '<main id="main" class="main">';

    echo '<div class="pagetitle">';
      echo '<h1>Approve Medicine Page</h1>';
    echo '</div>';

    echo '<section class="section">';
  echo "You are not a doctor. Access denied!";
  echo '<section>';
}
?>



