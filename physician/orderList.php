<?php
session_start();

if(!isset($_SESSION['phyId'])){
    header("location: phyLoginForm.php");
  }
include_once "phyBackend/config.php";
include_once "header.php"; 
include_once "sidebar.php"; 
?>
<body>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Order List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Blank</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          
            <?php
                $query="SELECT * FROM orders WHERE status ='pending' ";
                
                
                if($r = mysqli_query($conn, $query ) ) {
                
                    while ($row=mysqli_fetch_array($r)){
                    
                        echo '<div class="card">';
                        echo '<div class="card-body">';

                        echo '<form action="phyBackend/receiveOrder.php" method="POST">';
                        echo "<input type='hidden' name='orderId' value='{$row['orderId']}'>";
                        echo "<input type='hidden' name='medicineId' value='{$row['medicineId']}'>";
                        echo "<input type='hidden' name='orderAmount' value='{$row['orderAmount']}'>";
                        print "<p>Medicine ID: {$row['medicineId']}</p>";
                        print "<p>Medicine Name: {$row['medicineName']}</p>";
                        print "<p>Order Date: {$row['orderDate']}</p>";
                        print "<p>Order Amount: {$row['orderAmount']}</p>";
                        echo '<button class="btn btn-primary w-100" type="submit" name="receive">Receive</button>';
                        echo '<br>';
                        echo '<br>';
                        echo '<button class="btn btn-primary w-100" type="submit" name="cancel">Cancel</button>';
                        echo '</form>';
                        echo '</div>';
                        echo '</div>';
                        
                            }
                        
                        
                    }else{
                        print'<p style="color:red;">Could not retrieve the data because :<br/>' .mysqli_error($conn).
                        '.</p><p>the query being run was : '.$query.'</p>';
                    }
                
                    mysqli_close($conn);
                
                ?>
              
            

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