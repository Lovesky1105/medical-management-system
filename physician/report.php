<?php
session_start();
if(!isset($_SESSION['phyId'])){
  header("location: phyLoginForm.php");
}
include_once "phyBackend/config.php";
include_once "header.php"; 
include_once "sidebar.php"; 

$currentMonth = date('m');
$currentDate = date('Y-m-d');
//if (isset($_POST['submit'])) {
  //$medicineId =  $_POST['medicineId'];

  $maxUse_query = "SELECT SUM(medtransaction.amountSold) AS sumAmount, 
                  medicine.medicineName ,medicine.medicineId 
                  FROM medtransaction 
                  LEFT JOIN medicine ON  medtransaction.medicineId = medicine.medicineId
                  WHERE MONTH(date) = $currentMonth 
                  GROUP BY medicineId";
                  //AND medtransaction.medicineId = '{$medicineId}'
                  
                  /*GROUP BY medtransaction.medicineId";*/

$medicineId= array();
$medicineName= array();
$sumAmount = array();
$avgAmount = array();
$difDate = array();
$avgDifDate = array();
$safetyStock = array();
$rop = array();

echo '<form action="report.php" method="post">';
?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Search Meds</h1>
    </div><!-- End Page Title -->

    <section class="section">
      

<!--responsive card-->

      <!--start here to run sum(MAX) amount sold query-->
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
            <h5 class="card-title">Result of medicine max monthly usage</h5>
                <?php
                    if($r = mysqli_query($conn, $maxUse_query ) ) {
                
                      while ($row=mysqli_fetch_array($r)){
                        echo '<div class="row">'; 

                        
                        echo '<div class="col-lg-3 col-md-4 label">Medicine Name</div>';
                        echo '<div class="col-lg-3 col-md-8"> ';
                        print "{$row['medicineName']}";
                        //$medicineName = "{$row['medicineName']}";
                        //$medicineName[] = array('medicineName' => $medicineName);
                        $medicineName[] = $row['medicineName'];

                        //$medicineId = "{$row['medicineId']}";
                        $medicineId[] = $row['medicineId'];

                        echo '</div>';
                        

                        
                        echo '<div class="col-lg-3 col-md-4 label">total amount sold in the month</div>';
                        echo '<div class="col-lg-3 col-md-8"> ';
                        print "{$row['sumAmount']}";
                        //$sumAmount = "{$row['sumAmount']}";
                        //$sumAmount[] = array('maxAmount' => $sumAmount);
                        $sumAmount[] = $row['sumAmount'];
                        echo '</div>';
                        

                        echo '</div>';
                      }

                      
                   }
                    
                ?>
                
            </div>
          </div>
        </div>
      </div><!--end row-->


      <!--start here to run average amount sold query-->
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
            <h5 class="card-title">Result of medicine average monthly usage</h5>
                <?php
                $avgUse_query = "SELECT ROUND((SUM(medtransaction.amountSold) / COUNT(medtransaction.amountSold)), 0) AS avgAmount, 
                                medicine.medicineName 
                                FROM medtransaction 
                                LEFT JOIN medicine ON  medtransaction.medicineId = medicine.medicineId
                                WHERE MONTH(date) = $currentMonth 
                                GROUP BY medtransaction.medicineId";
                                  //AND medtransaction.medicineId = '{$medicineId}'
                    if($r = mysqli_query($conn, $avgUse_query ) ) {
                
                      while ($row=mysqli_fetch_array($r)){
                        echo '<div class="row">'; 

                        
                        echo '<div class="col-lg-3 col-md-4 label">Medicine Name</div>';
                        echo '<div class="col-lg-3 col-md-8"> ';
                        print "{$row['medicineName']}";
                        echo '</div>';
                        

                        
                        echo '<div class="col-lg-3 col-md-4 label">average amount sold in the month</div>';
                        echo '<div class="col-lg-3 col-md-8"> ';
                        print "{$row['avgAmount']}";
                        //$avgAmount = "{$row['avgAmount']}";
                        //$avgAmount[] = array('maxReachTime' => $avgAmount);
                        $avgAmount[] = $row['avgAmount'];
                        echo '</div>';
                        

                        echo '</div>';
                      }

                      
                   }
                    
                ?>
                
            </div>
          </div>
        </div>
      </div><!--end row-->

      <!--start here to run MAX reach time of the month query-->
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
            <h5 class="card-title">Result of medicine max reach day</h5>
                <?php
               $maxDate_query = "SELECT MAX(DATEDIFF(receiveDate, orderDate)) AS difDate, 
               medicineName, medicineId
               FROM orders 
               WHERE MONTH(orderDate) = $currentMonth 
               GROUP BY medicineId";
               //AND medicineId = '{$medicineId}'
                    if($r = mysqli_query($conn, $maxDate_query ) ) {
                
                      while ($row=mysqli_fetch_array($r)){
                        echo '<div class="row">'; 

                        
                        echo '<div class="col-lg-3 col-md-4 label">Medicine Name</div>';
                        echo '<div class="col-lg-3 col-md-8"> ';
                        print "{$row['medicineName']}";
                        echo '</div>';
                        

                        
                        echo '<div class="col-lg-3 col-md-4 label">max date to reach </div>';
                        echo '<div class="col-lg-3 col-md-8"> ';
                        print "{$row['difDate']}";
                        //$difDate = "{$row['difDate']}";
                        //$difDate[] = array('maxReachTime' => $difDate);
                        $difDate[] = $row['difDate'];
                        echo '</div>';
                        

                        echo '</div>';
                      }

                      
                   }
                    
                ?>
                
            </div>
          </div>
        </div>
      </div><!--end row-->


      <!--start here to run average reach time of the month query-->
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
            <h5 class="card-title">Result of medicine average reach day</h5>
                <?php
               $avgDate_query = "SELECT ROUND(AVG(DATEDIFF(receiveDate, orderDate)),0) AS avgDifDate, medicineName, medicineId
                                  FROM orders 
                                  WHERE MONTH(orderDate) = $currentMonth 
                                  GROUP BY medicineId";
                                  //AND medicineId = '{$medicineId}'
                    if($r = mysqli_query($conn, $avgDate_query ) ) {
                
                      while ($row=mysqli_fetch_array($r)){
                        echo '<div class="row">'; 

                        
                        echo '<div class="col-lg-3 col-md-4 label">Medicine Name</div>';
                        echo '<div class="col-lg-3 col-md-8"> ';
                        print "{$row['medicineName']}";
                        echo '</div>';
                        

                        
                        echo '<div class="col-lg-3 col-md-4 label">average date to reach </div>';
                        echo '<div class="col-lg-3 col-md-8"> ';
                        print "{$row['avgDifDate']}";
                        //$avgDifDate = "{$row['avgDifDate']}";
                        //$avgDifDate[] = array('avgReachTime' => $avgDifDate);
                        $avgDifDate[] = $row['avgDifDate'];
                        echo '</div>';
                        

                        echo '</div>';
                      }

                      
                   }
                   
                
           echo "</div>"; 
           echo "</div>"; 
           echo "</div>"; 
echo '<button type="submit" name="submit" class="btn btn-primary w-100">Generate Report</button>';
        echo "</form>";
                    
                ?>
       <?php
        /*$count_query = "SELECT COUNT(medicineId) AS totalRow 
        FROM medicine ";
        echo '<form action="phyBackend/reportGenerate.php" method="post">';
      if($r = mysqli_query($conn, $count_query ) ) {
                      
        while ($row=mysqli_fetch_array($r)){
          
        echo '<form action="phyBackend/reportGenerate.php" method="post">';
        echo "<input type='hidden' name='medicineId' value='{$medicineId}'>";
        echo "<input type='hidden' name='medicineName' value='{$medicineName}'>";
        echo "<input type='hidden' name='sumAmount' value=' {$sumAmount}'>";
        echo "<input type='hidden' name='avgAmount' value=' {$avgAmount} '>";
        echo "<input type='hidden' name='difDate' value='{$difDate}'>";
        echo "<input type='hidden' name='avgDifDate' value='{$avgDifDate}'>";
        echo '<button type="submit" name="submit" class="btn btn-primary w-100">Generate Report</button>';
        echo "</form>";
        }
      }*/


      if(isset($_POST["submit"])){
      for ($i = 0; $i < count($medicineId); $i++) {
        $safetyStock[$i] = ($sumAmount[$i] * $difDate[$i]) - ($avgAmount[$i]*$avgDifDate[$i]);
        $rop[$i] = ($avgAmount[$i] * $difDate[$i])+ $safetyStock[$i];
        $insert_query = mysqli_query($conn, "INSERT INTO report 
                        (reportId, medicineId, medicineName, dateGenerate, maxAmount, avgAmount, maxReachTime, avgReachTime, safetyStock, reorderPoint)
                        VALUES (0, '{$medicineId[$i]}', '{$medicineName[$i]}', '{$currentDate}', '{$sumAmount[$i]}', '{$avgAmount[$i]}', 
                        '{$difDate[$i]}', '{$avgDifDate[$i]}', '{$safetyStock[$i]}', '{$rop[$i]}')");

          }//close for
            if($insert_query){
              echo '<script>alert("Added successfully")</script>';
            }else{
            echo "Something went wrong. Please try again!";
            }
        
        
      }  //close if
       ?>
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
//}
    mysqli_close($conn);
?>



