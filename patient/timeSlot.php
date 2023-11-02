<?php
    session_start();
    include_once "backend/config.php";
    include_once "../header.php"; 
    include_once "navBar.php"; 
    if(!isset($_SESSION['id'])){
      header("location: loginForm.php");
    }
    

    $phyId = $_POST['phyId'];
    $date = $_POST['date'];
    
    if(!empty($date) && !empty($phyId)){

        
           // $sql = "SELECT * FROM appointment WHERE phyId = '{$phyId}' AND date = '{$date}'";
            $sql = "SELECT * FROM timeslot WHERE slot NOT IN (SELECT slot FROM appointment WHERE phyId = '{$phyId}' AND date = '{$date}')";
            
        
    
?>


<?php
$agreement = "approve";
?>

<html>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>



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

      <form class="main-form" action="backend/appointment.php" method="post">
        <div class="row mt-5 ">

        <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
          <select name="slot" id="slot" class="custom-select">
          <?php
            if($r = mysqli_query($conn, $sql ) ) {
                            
              while ($row=mysqli_fetch_array($r)){
                //$slotBooked = $row["slot"];
                echo "<option value='{$row['slot']}'>  {$row['time']}</option>";
              }
              

            }else{
            print'<p style="color:red;">Could not retrieve the data because :<br/>' .mysqli_error($conn).
            '.</p><p>the query being run was : '.$query.'</p>';
            }

          ?>
            </select>
          </div>

          <input type="hidden" id="phyId" name="phyId" value="<?php echo $phyId; ?>">
          <input type="hidden" id="date" name="date" value="<?php echo $date; ?>">

          <?php
          }else{
            echo "All input fields are required!";
        }
          ?>


          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="message" id="message" class="form-control" rows="6" placeholder="You can leave some comment over here.."></textarea>
          </div>

          <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
          <label class="form-check-label" for="invalidCheck">
            Agree to <a href="tac.php">terms and conditions</a>
          </label>
          <div class="invalid-feedback">
            You must agree before submitting.
          </div>
        </div>
          
        </div>

        <button type="submit" name="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
      </form>
    </div>
  </div> 


<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>
  
</body>
</html>