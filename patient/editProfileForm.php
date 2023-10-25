<?php 
  session_start();
  include_once "backend/config.php";
  include_once "../header.php"; 
  include_once "navBar.php"; 
  if(!isset($_SESSION['id'])){
    header("location: loginForm.php");
  }
?>


<html>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

 
  <div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        
        <h1 class="font-weight-normal">Profile</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Edit Profile</h1>

      <?php
      $id = $_SESSION['id'];
      
      ?>
      <form class="main-form" action="backend/editProfile.php" method="post">
        <div class="row mt-5 ">

        <input type="hidden" name="id" value="<?php echo $id; ?>">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <p>Name : </p>
            <input type="text" name="name" class="form-control">
          </div>

          <div class="col-12 py-2 wow fadeInRight" data-wow-delay="300ms">
          <p>E-mail : </p>
          <input type="email" name="email" class="form-control">
          </div>

          <div class="col-12 py-2 wow fadeInRight" data-wow-delay="300ms">
          <p>Phone : </p>
          <input type="text" name="phone" class="form-control">
          </div>

          <div class="col-12 py-2 wow fadeInRight" data-wow-delay="300ms">
          <p>address : </p>
          <input type="text" name="address" class="form-control">
          </div>

        </div>

        <button type="submit" name="submit" class="btn btn-primary mt-3 wow zoomIn">Edit</button>
      </form>
      <?php
      
      ?>
    </div>
  </div> 



<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/google-maps.js"></script>

<script src="../assets/js/theme.js"></script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIA_zqjFMsJM_sxP9-6Pde5vVCTyJmUHM&callback=initMap"></script>
  
</body>
</html>

