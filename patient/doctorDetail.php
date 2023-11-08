<?php 
  session_start();
  include_once "backend/config.php";
  include_once "../header.php"; 
  include_once "navBar.php";
  //if(isset($_SESSION['id'])){
    //header("location: index.php");
 // }
?>


<html>
    <style>
        .profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
        </style>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>



  <div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Doctors</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">Our Doctors</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <div class="page-section bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <?php
          if (isset($_POST['submit'])) {
            $phyId = $_POST['phyId'];

          $query="SELECT * FROM physician WHERE phyId = '$phyId'"; 
          if($r = mysqli_query($conn, $query ) ) {
              while ($row=mysqli_fetch_array($r)){
                  
                echo ' <div class="row">';
                echo '<div class="col-md-4">';
                echo '<div class="profile-img">';
                print "<img src='../physician/phyBackend/{$row['image']}'/>";
                echo '</div>';
                echo '</div>';
                  
                echo '<div class="col-md-6">';
                echo '<div class="profile-head">';
                echo '<h5>';   
                echo "Name :{$row['name']}";      
                echo '</h5>';  
                echo '<h6>';  
                echo " Specialist : {$row['specialist']}";  
                echo '</h6>';   
                echo "Location : <p>{$row['address']}</p>";
                echo "About Me : <p>{$row['info']}</p>";
                echo "Email : <p>{$row['email']}</p>";
                echo '</div>'; 
                echo '</div>';
                }
              }else{
                  print'<p style="color:red;">Could not retrieve the data because :<br/>' .mysqli_error($conn).
                  '.</p><p>the query being run was : '.$query.'</p>';
              }
           }
              mysqli_close($conn);
          
          ?>

        </div>
      </div>
    </div> <!-- .container -->
  </div> <!-- .page-section -->


<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>
  
</body>
</html>