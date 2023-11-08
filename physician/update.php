<?php
session_start();
include_once "phyBackend/config.php";
include_once "header.php"; 
include_once "sidebar.php"; 

if(!isset($_SESSION['phyId'])){
    header("location: ../phyLoginForm.php");
  }
?>

  <body>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Medicine Detail</h1>
      
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-body pt-3">
              <div class="tab-content pt-2">
                  <h5 class="card-title">Update Stock</h5>
                  <?php
                    if (isset($_POST['confirm'])) {
                      
                        $medicineId =  $_POST['medicineId'];
                        $phyId = $_POST['phyId'];
                        $category = $_POST['category'];
                        $query="SELECT * FROM medicine WHERE medicineId='{$medicineId}' "; 
                        $sold = mysqli_real_escape_string($conn, $_POST['sold']);
                        if(!empty($sold)){
                        if(is_numeric($sold)){
                            $result = mysqli_query($conn, $query);
                            if ($result) {
                            // Fetch data from the result
                            $row = mysqli_fetch_assoc($result);
                                if ($row) {
                                    
                                    $quantity = $row['amount'];
                                    
                                    $newQuantity = $quantity - $sold;

                                    $sql="UPDATE medicine SET 
                                    amount = '$newQuantity'
                                    WHERE medicineId = '{$medicineId}'";

                                    if (mysqli_query($conn, $sql)) {
                                      echo  "update successfully!";
                                      echo "<br/>";
                                      echo '<button class="btn btn-outline-success" ><a href="updateStockForm.php">Back</a></button>';
                                      $currentDate = date('Y-m-d');
                                      $status = "sold";
                                      $insert_query = mysqli_query($conn, "INSERT INTO medtransaction (transId, medicineId, 
                                      phyId, category, date, amountSold, oriAmount, newAmount, status)
                                      VALUES (0, '{$medicineId}', '{$phyId}','{$category}', 
                                      '{$currentDate}', '{$sold}' , '{$quantity}' , '{$newQuantity}', '{$status}')");
                                      
                                    }else {
                                      echo '<p style="color:red;">Could not retrieve the data because :<br/>' .mysqli_error($conn).
                                                  '.</p><p>the query being run was : '.$sql.'</p>';
                                                  
                                }
                            }else{
                              echo'<p style="color:red;">Could not retrieve the data because :<br/>' .mysqli_error($conn).
                                '.</p><p>the query being run was : '.$query.'</p>';
                                
                            }
                            }// close if result
                        }else{
                          echo "Please fill in number. Only numner are acceptable";
                        }//close if empty
                      }else{
                        echo "Please fill in all field";
                      
                      }

                    }//close if comfirm

                    mysqli_close($conn);
                  
                ?>
                </div>
                </div>
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
