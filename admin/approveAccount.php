<?php
session_start();
if(!isset($_SESSION['adminId'])){
  header("location: adminLoginForm.php");
}
include_once "adminBackend/config.php";
include_once "header.php"; 
include_once "sidebar.php"; 



$agreement = "pending";
?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Approve Account</h1>
    </div><!-- End Page Title -->

<section class="section">

<?php


$query="SELECT * FROM physician WHERE agreement = '{$agreement}' ";

if($r = mysqli_query($conn, $query ) ) {
                
    while ($row=mysqli_fetch_array($r)){
      echo'<div class="row">';
      echo'<div class="col-lg-12">';
      echo '<div class="card">';
          echo '<div class="card-body">'; 
              echo '<h5 class="card-title">Account Pending to Approve</h5>';
                      
                  echo '<div class="row">'; 
                      echo '<div class="col-lg-3 col-md-8"> ';
                      print "<p>Name: {$row['name']}</p>";
                    echo '</div>';
                     

                      echo '<div class="col-lg-2 col-md-8"> ';
                     
                      print "<p>email: {$row['email']}</p>";
                      echo '</div>';
                      

                      echo '<div class="col-lg-2 col-md-8"> ';
                      
                      $phNo = substr($row['phone'], 5);
                      print "<p>phone: ***-***{$phNo}</p>";
                      echo '</div>';
                      

                      echo '<div class="col-lg-2 col-md-8"> ';
                      $nric = substr($row['nric'], 6);
                      print "<p>NRIC : ******-**-{$nric}</p>";
                      echo '</div>';

                      echo '<div class="col-lg-2 col-md-8"> ';
                      print "<p>Access Level: {$row['accessLvl']}</p>";
                      echo '</div>';
                      

                      echo '<form action="adminBackend/adminApproveAccount.php" method="POST">';
                      echo "<input type='hidden' name='name' value='{$row['name']}'>";
                      echo "<input type='hidden' name='email' value='{$row['email']}'>"; 
        
                      echo' <select name="agreement" id="agreement" >
                        <option value="approve">Approve</option>
                        <option value="reject">Reject</option>
                        </select>';

                      print" <button type='submit' name='submitted' >
                      Submit
                      </button>";

        
        echo '</form>';
        echo '</div>';
        echo '</div>';
       
            }
        
        
    }else{
        print'<p style="color:red;">Could not retrieve the data because :<br/>' .mysqli_error($conn).
        '.</p><p>the query being run was : '.$query.'</p>';
    }

?>
</table>

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