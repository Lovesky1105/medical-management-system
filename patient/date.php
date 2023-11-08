<?php
session_start();
if(!isset($_SESSION['id'])){
  header("location: loginForm.php");
}
include_once "backend/config.php";
include_once "../header.php"; 
include_once "navBar.php";
$agreement = "approve";

?>


<html>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
  <div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Blog</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">Appointment</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

   <!-- .page-section -->
   <div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Make an Appointment</h1>
      <?php
                    if(isset($_SESSION['status']))
                    {
                        ?>
                        <div class="alert alert-success">
                            <h5>
                                <?= $_SESSION['status']; ?>
                            </h5>
                        </div>
                        <?php
                        unset($_SESSION['status']);
                    }        
                ?>

      <form class="main-form" action="timeSlot.php" method="post">
        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <p>Please select a date that you want to make an appointment</p>
            <input type="date" name="date" class="form-control">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <p>Please select a doctor that you want to make an appointment</p>
          <select name="phyId" id="phyId" class="custom-select">
            <?php
            $query="SELECT * FROM physician WHERE agreement = '{$agreement}' AND accessLvl = 'Doctor'";
            if($r = mysqli_query($conn, $query ) ) {
              while ($row=mysqli_fetch_array($r)){
                print "<option value='{$row['phyId']}'>{$row['name']} / {$row['specialist']}</option>";
              }// close while loop
            }else{
              print'<p style="color:red;">Could not retrieve the data because :<br/>' .mysqli_error($conn).
              '.</p><p>the query being run was : '.$query.'</p>';
            }//close if
            mysqli_close($conn);
            ?>

          </select>
          </div>
        </div>

        <button type="submit" name="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
      </form>
    </div>
  </div> 

  <script type="text/javascript">
    window.onload=function(){
    var today = new Date().toISOString().split('T')[0];
    document.getElementsByName("date")[0].setAttribute('min', today);
    }

      </script> 

<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>
  
</body>
</html>