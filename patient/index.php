<?php
include_once "backend/config.php";
include_once "../header.php"; 
include_once "navBar.php";

?>

<html>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>


  <div class="page-hero bg-image overlay-dark" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="hero-section">
      <div class="container text-center wow zoomIn">
        <span class="subhead">Let's make your life happier</span>
        <h1 class="display-4">Healthy Living</h1>
        <a href="date.php" class="btn btn-primary">Let's Consult</a>
      </div>
    </div>
  </div>


  <div class="bg-light">
    <div class="page-section py-3 mt-md-n5 custom-index">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-4 py-3 py-md-0">
            <div class="card-service wow fadeInUp">
              <div class="circle-shape bg-secondary text-white">
                <span class="mai-chatbubbles-outline"></span>
              </div>
              <p><span>Appointment</span> Meet Doctor </p>
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card-service wow fadeInUp">
              <div class="circle-shape bg-primary text-white">
                <span class="mai-shield-checkmark"></span>
              </div>
              <p><span>Grand</span>-Health Protection</p>
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card-service wow fadeInUp">
              <div class="circle-shape bg-accent text-white">
                <span class="mai-basket"></span>
              </div>
              <p><span>Grand</span>-Health Pharmacy</p>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .page-section -->

    <div class="page-section pb-0">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 py-3 wow fadeInUp">
            <h1>Welcome to Your Grand <br> Clinic</h1>
            <p class="text-grey mb-4">
              This website can help you to make appointment with the doctor you choose, and it also help you to know more about our doctor.
              You can visit to the <b> Doctor </b> page and click on the appointment button if you want to make an appointment. Before you 
              make an appointment, Please Login to your account. If you don't have account you can register for free. To know more our clinic 
              information, Please visit to the <b>About us </b>Page. To know your account information and appointment status and history, 
              Please visit to <b> profile </b> page. Need more information? please visit <b> Contact us </b> page
            </p>
            <a href="about.php" class="btn btn-primary">Learn More</a>
          </div>
          <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
            <div class="img-place custom-img-1">
              <img src="../assets/img/bg-doctor.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .bg-light -->
  </div> <!-- .bg-light -->

  <div class="page-section">
    <div class="container">
      <h1 class="text-center mb-5 wow fadeInUp">Our Doctors</h1>

      <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
        <?php
          $query="SELECT * FROM physician WHERE accessLvl ='Doctor' AND agreement ='approve'"; 
          if($r = mysqli_query($conn, $query ) ) {
          
              while ($row=mysqli_fetch_array($r)){
                  echo '<div class="item">';
                  echo '<div class="card-doctor">';
                  echo ' <div class="header">';
                  print "<img src='../physician/phyBackend/{$row['image']}'/>";
                  echo '</div>';//close header
                  
                  echo '<div class="body">';
                  print "<p class='text-xl mb-0'>{$row['name']}</p>";
                  print "<span class='text-sm text-grey'>{$row['specialist']}</span>";
                  echo '</div>';//close body
                  echo '</div>';// close card doctor
                  echo '</div>';//close row
                  }
                  
              }else{
                  print'<p style="color:red;">Could not retrieve the data because :<br/>' .mysqli_error($conn).
                  '.</p><p>the query being run was : '.$query.'</p>';
              }
          
              mysqli_close($conn);
          
          ?>

      </div>
    </div>
  </div>





<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>
  
</body>
</html>