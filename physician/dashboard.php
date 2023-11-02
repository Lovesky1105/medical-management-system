<?php
session_start();
if(!isset($_SESSION['phyId'])){
  header("location: phyLoginForm.php");
}
include_once "phyBackend/config.php";
include_once "header.php"; 
include_once "sidebar.php";


$currentMonth = date('m');

?>

<html>
<body>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                

                <div class="card-body">
                  <h5 class="card-title">Meds Sales </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      $currentDate = date('Y-m-d');
                      $status = "sold";
                      $sql = mysqli_query($conn, "SELECT SUM(amountSold) AS total FROM medTransaction WHERE date = '{$currentDate}' AND status = '{$status}'");
                      ?>
                      <h6>
                        <?php
                        if($sql){
                          $row = mysqli_fetch_assoc($sql);
                            echo "{$row['total']}"; 
                        }else{
                          print "there is some error";
                        }
                         ?>
                         </h6>
                      

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                

                <div class="card-body">
                  <h5 class="card-title">Total Client</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                    <?php
                      $sql = mysqli_query($conn, "SELECT COUNT(*) AS patientTotal FROM users WHERE agreement='approve' ");
                      ?>
                      <h6>
                        <?php
                        if($sql){
                          $row = mysqli_fetch_assoc($sql);
                            echo "{$row['patientTotal']}"; 
                        }else{
                          print "there is some error";
                        }
                         ?>
                         </h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Appointment <span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                    <?php
                      $currentDate = date('Y-m-d');
                      $sql = mysqli_query($conn, "SELECT COUNT(*) AS bookTotal FROM appointment WHERE date = '{$currentDate}'");
                      ?>
                      <h6>
                        <?php
                        if($sql){
                          $row = mysqli_fetch_assoc($sql);
                            echo "{$row['bookTotal']}"; 
                        }else{
                          print "there is some error";
                        }
                         ?>
                         </h6>
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->


            <div class="col-12">
            <div class="card">
            <div class="card-body">
              <h5 class="card-title">Pie Chart</h5>

              <!-- Pie Chart -->
              <div id="pieChart" style="min-height: 400px;" class="echart"></div>
              <?php
              $currentMonth = date('m');
              $query = "SELECT category, SUM(amountSold) AS total_amount 
                        FROM medtransaction 
                        WHERE MONTH(date) = '{$currentMonth}' 
                        GROUP BY category";
                

               
                if($r = mysqli_query($conn, $query ) ) {
                  $data = array(); 
                  while ($row=mysqli_fetch_array($r)){
                    
                    $category = "{$row['category']}";
                    $amount = "{$row['total_amount']}";

                    $data[] = array('value' => $amount, 'name' => $category);

              ?>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
        const pieChart = echarts.init(document.querySelector("#pieChart"));
        pieChart.setOption({
            title: {
                text: 'usage of medicine sort with category',
                subtext: 'it will show the top sales of medicine type ',
                left: 'center'
            },
            tooltip: {
                trigger: 'item'
            },
            legend: {
                orient: 'vertical',
                left: 'left'
            },
            series: [
                {
                    name: 'Access From',
                    type: 'pie',
                    radius: '50%',
                    data: <?php echo json_encode($data); ?> // Pass the data array as JSON
                }
            ],
            emphasis: {
                itemStyle: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                }
            }
        });
    });
</script>
              <?php
                }
              }
              ?>
              <!-- End Pie Chart -->

            </div>
          </div>
          </div><!-- End Reports -->

          <div class="col-12">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Bar Chart</h5>

       <!-- Bar Chart -->
       <div id="barChart" style="min-height: 400px;" class="echart"></div>

      <?php
      $currentYear = date('Y');
      $query = "SELECT COUNT(appointmentId) AS total_appointment, MONTH(date) AS resultMonth
                FROM appointment 
                WHERE YEAR(date) = YEAR(CURRENT_DATE) AND status = 'done'
                GROUP BY resultMonth";

      if ($result = mysqli_query($conn, $query)) {
        $resultMonths = [];
        $totalAppointments = [];

        while ($row = mysqli_fetch_array($result)) {
          $resultMonth = $row['resultMonth'];
          $total_appointment = $row['total_appointment'];
          $resultMonths[] = $resultMonth;
          $totalAppointments[] = $total_appointment;

        
          ?>
        
      <script>
        document.addEventListener("DOMContentLoaded", () => {
          var resultMonths = <?php echo json_encode($resultMonths); ?>;
          var totalAppointments = <?php echo json_encode($totalAppointments); ?>;
          var barChart = echarts.init(document.querySelector("#barChart"));
          
          barChart.setOption({
            title: {
                text: 'Appointment Done in this year',
                subtext: 'This bar chart represent the amount of appointment done  ',
                left: 'center'
            },
            xAxis: {
              type: 'category',
              data: resultMonths,
              name: 'Month',
            },
            yAxis: {
              type: 'value',
              name: 'Number of Appointments',
            },
            series: [{
              data: totalAppointments,
              type: 'bar',
              label: {
          show: true, // Show data labels on the bars
          position: 'top' // Position of data labels
        }
            }]
          });
        });
      </script>
      <?php
      }
      }
      
      ?>

<!-- End Bar Chart -->
      <!-- End Bar Chart -->
    </div>
  </div>
  
</div>


            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">
                <div class="card-body pb-0">
                  <h5 class="card-title">Top Selling <span>| This month</span></h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Medicine Name</th>
                        <th scope="col">Amount sold</th>
                        <th scope="col">category</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                        <?php
                        $sum_query = "SELECT m.medicineName, m.category, t.total_amount
                        FROM medicine AS m
                        LEFT JOIN (
                            SELECT medicineId, SUM(amountSold) AS total_amount
                            FROM medtransaction
                            WHERE MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE())
                            GROUP BY medicineId
                        ) AS t ON m.medicineId = t.medicineId
                        WHERE m.agreement = 'approve' 
                        ORDER BY t.total_amount DESC";
                        if($r = mysqli_query($conn, $sum_query ) ) {
                
                          while ($row=mysqli_fetch_array($r)){
                            echo "<tr>";
                            echo "<td class='text-primary fw-bold'>{$row['medicineName']}</td>";
                            echo "<td class='fw-bold'>{$row['total_amount']}</td>";
                            echo "<td>{$row['category']}</td>";
                            echo "</tr>";
                          }
                        }
                        

                        ?>
                        
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Current Medicine Order -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Current Medicine Order <span>| Today</span></h5>

              <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">Medicine Name</th>
                        <th scope="col">Order Date</th>
                        <th scope="col">Order Amount</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      
                        <?php
                        //compare current amount and safety stock
                        $order_query = "SELECT orderId, medicineName, orderDate, orderAmount 
                        FROM orders
                        WHERE status='pending'";
                        if($r = mysqli_query($conn, $order_query ) ) {
                
                          while ($row=mysqli_fetch_array($r)){
                            echo "<tr>";
                            echo "<td class='text-primary fw-bold'>{$row['orderId']}</td>";
                            echo "<td class='fw-bold'>{$row['medicineName']}</td>";

                            echo "<td>{$row['orderDate']}</td>";
                            echo "<td>{$row['orderAmount']}</td>";
                            echo "</tr>";
                          }
                        }
                        

                        ?>
                        
                    </tbody>
                  </table>


            </div>
          </div><!-- Current Medicine Order -->

          <!-- Low Amount Medicine Type -->
          <div class="card">
           

            <div class="card-body pb-0">
              <h5 class="card-title">Low Amount Medicine Type </h5>

              <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Medicine Name</th>
                        <th scope="col">current Amount</th>
                        <th scope="col">Safety Stock</th>
                        <th scope="col">Reorder Point</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                        <?php
                        //compare current amount and safety stock
                        $safety_query = "SELECT m.medicineName, m.amount, r.safetyStock, r.reorderPoint
                        FROM medicine AS m
                        LEFT JOIN report AS r ON m.medicineId = r.medicineId
                        WHERE MONTH(r.dateGenerate) = $currentMonth AND r.safetyStock > m.amount
                        GROUP BY m.medicineId";
                        if($r = mysqli_query($conn, $safety_query ) ) {
                
                          while ($row=mysqli_fetch_array($r)){
                            echo "<tr>";
                            echo "<td class='text-primary fw-bold'>{$row['medicineName']}</td>";
                            echo "<td class='fw-bold'>{$row['amount']}</td>";

                            echo "<td>{$row['safetyStock']}</td>";
                            echo "<td>{$row['reorderPoint']}</td>";
                            echo "</tr>";
                          }
                        }
                        

                        ?>
                        
                    </tbody>
                  </table>



            </div>
          </div><!-- Low Amount Medicine Type -->




        </div><!-- End Right side columns -->

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
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>


