<?php 
  session_start();
  include_once "backend/config.php";
  include_once "../header.php"; 
  if(!isset($_SESSION['id'])){
    header("location: loginForm.php");
  }
?>


<html>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span> +00 123 4455 6666</a>
              <span class="divider">|</span>
              <a href="#"><span class="mai-mail text-primary"></span> mail@example.com</a>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="#"><span class="mai-logo-facebook-f"></span></a>
              <a href="#"><span class="mai-logo-twitter"></span></a>
              <a href="#"><span class="mai-logo-dribbble"></span></a>
              <a href="#"><span class="mai-logo-instagram"></span></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#"><span class="text-primary">One</span>-Health</a>

        <form action="#">
          <div class="input-group input-navbar">
            <div class="input-group-prepend">
              <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username" aria-describedby="icon-addon1">
          </div>
        </form>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="doctors.php">Doctors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="blog.php">News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="#">Login / Register</a>
            </li>
          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>

  <div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">Profile</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <?php
                $query="SELECT * FROM users WHERE id='".$_SESSION['id']."' ";
                //$query2="SELECT phone FROM users WHERE id='".$_SESSION['id']."' ";
                //$query3="SELECT RIGHT(phone, 4) FROM users WHERE id='".$_SESSION['id']."' ";
                
                
                if($r = mysqli_query($conn, $query ) ) {
                
                    while ($row=mysqli_fetch_array($r)){
                    
                      ?>

  <div class="page-section">
    <div class="container">
        
      <h1 class="text-center wow fadeInUp">Account Detail</h1>
        <div class="row mb-3">

          <div class="col-sm-6 py-2 wow fadeInLeft">
            <p>Name: <?php echo "{$row['name']}"; ?></p>
          </div>

          <div class="col-sm-6 py-2 wow fadeInRight">
          <?php $nric = substr($row['nric'], 6); ?>
            <p>NRIC: ******-**-<?php echo "{$nric}"; ?></p>
          </div>

          <div class="col-sm-6 py-2 wow fadeInLeft">
            <p>email: <?php echo "{$row['email']}"; ?></p>
          </div>
          
          <div class="col-sm-6 py-2 wow fadeInRight">
            <?php $phNo = substr($row['phone'], 5); ?>
            <p>Contact Number: ***-***<?php echo "{$phNo}"; ?></p>
        </div>

            <?php
            print" <button class='btn btn-primary wow zoomIn' role='button'><a href='backend/logout.php?logout_id= {$row['id']}' class='logout'>Logout</a></button>";
            ?>
        
        </div>
    </div>
  </div>
  

  <?php
                            }
                    }else{
                        print'<p style="color:red;">Could not retrieve the data because :<br/>' .mysqli_error($conn).
                        '.</p><p>the query being run was : '.$query.'</p>';
                    }
                    ?>

                <div class="page-section">
                <div class="container">
                <h1 class="text-center wow fadeInUp">Appointment History</h1>


            <?php
                $query2="SELECT * FROM appointment WHERE id='".$_SESSION['id']."' ";

                if($r = mysqli_query($conn, $query2 ) ) {
                    
                    while ($row=mysqli_fetch_array($r)){
                    //$phyId = "{$row['phyId']}";
                    $phyId = $row['phyId'];

                    $query3 = "SELECT * FROM physician WHERE phyId = '$phyId' ";
                    //$phyName = "{$row['name']}";

                    //query 3 
                if ($result = mysqli_query($conn, $query3)) {
                    while ($physician = mysqli_fetch_array($result)) {
                        $phyName = $physician['name']; // Get the physician name from query3
                    }
                    mysqli_free_result($result);
                } else {
                    echo "Error in query3: " . mysqli_error($conn);
                }// end query 3 
        
                    echo '<div class="row mb-3">';

                    echo '<div class="col-sm-6 py-2 wow fadeInLeft">';
                    echo "Appointment ID:  {$row["appointmentId"]} </p>";
                    echo '</div>';

                    echo '<div class="col-sm-6 py-2 wow fadeInRight">';
                    echo "<p>Patient Name: {$row["patientName"]}</p>";
                    echo '</div>';

                    echo '<div class="col-sm-6 py-2 wow fadeInLeft">';
                    echo "<p>Appointment Date: {$row["date"]}</p>";
                    echo '</div>';
                    
                    echo '<div class="col-sm-6 py-2 wow fadeInRight">';
                    echo "<p>Appointment Slot: {$row["slot"]}";
                    echo '</div>';

                    echo '<div class="col-sm-6 py-2 wow fadeInLeft">';
                    echo "<p>Doctor Name: {$phyName}</p>";
                    echo '</div>';

                    echo '<div class="col-sm-6 py-2 wow fadeInRight">';
                    echo "<p>Appointment Status: {$row["status"]}</p>";
                    echo '</div>';

                    echo '</div>';

                    echo '</div>';
                    echo '</div>';

                         }        
                            }else{
                                print'<p style="color:red;">Could not retrieve the data because :<br/>' .mysqli_error($conn).
                                '.</p><p>the query being run was : '.$query2.'</p>';
                            }
                        mysqli_free_result($r);
                            mysqli_close($conn);
                
                ?>

 

  <footer class="page-footer">
    <div class="container">
      <div class="row px-md-3">
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Company</h5>
          <ul class="footer-menu">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Career</a></li>
            <li><a href="#">Editorial Team</a></li>
            <li><a href="#">Protection</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>More</h5>
          <ul class="footer-menu">
            <li><a href="#">Terms & Condition</a></li>
            <li><a href="#">Privacy</a></li>
            <li><a href="#">Advertise</a></li>
            <li><a href="#">Join as Doctors</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Our partner</h5>
          <ul class="footer-menu">
            <li><a href="#">One-Fitness</a></li>
            <li><a href="#">One-Drugs</a></li>
            <li><a href="#">One-Live</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Contact</h5>
          <p class="footer-link mt-2">351 Willow Street Franklin, MA 02038</p>
          <a href="#" class="footer-link">701-573-7582</a>
          <a href="#" class="footer-link">healthcare@temporary.net</a>

          <h5 class="mt-3">Social Media</h5>
          <div class="footer-sosmed mt-3">
            <a href="#" target="_blank"><span class="mai-logo-facebook-f"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-twitter"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-google-plus-g"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-instagram"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-linkedin"></span></a>
          </div>
        </div>
      </div>

      <hr>

      <p id="copyright">Copyright &copy; 2020 <a href="https://macodeid.com/" target="_blank">MACode ID</a>. All right reserved</p>
    </div>
  </footer>

<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/google-maps.js"></script>

<script src="../assets/js/theme.js"></script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIA_zqjFMsJM_sxP9-6Pde5vVCTyJmUHM&callback=initMap"></script>
  
</body>
</html>

