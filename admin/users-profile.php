<?php
session_start();
if(!isset($_SESSION['adminId'])){
  header("location: adminLoginForm.php");
}
include_once "adminBackend/config.php";
include_once "header.php"; 
include_once "sidebar.php"; 

$query="SELECT * FROM admin WHERE adminId='".$_SESSION['adminId']."' "; 

if($r = mysqli_query($conn, $query ) ) {
                
  while ($row=mysqli_fetch_array($r)){

    $image = $row["image"];
    $imageURL = "./adminBackend" . $filename;


?>

<html>

<body>



  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <?php
            print "<img src='adminBackend/{$row['image']}' class='rounded-circle'/>";
            ?>
            
              <h2><?php print "Name: {$row['adminName']}";?></h2>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <!--<li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>-->

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Name</div>
                    <div class="col-lg-9 col-md-8"><?php print "{$row['adminName']}";?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8"><?php print "{$row['adminAddress']}";?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8"><?php
                    $phNo = substr($row['adminPhone'], 5);
                    print " ***-***{$phNo}";
                    ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?php print "{$row['adminEmail']}";?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-9 col-md-8">
                    <button class="btn btn-light mt-3 wow zoomIn"><a href="adminBackend/logout.php?logout_id= <?php
                    echo "{$row['adminId']}";
                    ?>" class='logout'>Sign Out</a></button>
                   
                    </div>
                  </div>
                  
                  <?php
                  }
                        
                        
                }else{
                    print'<p style="color:red;">Could not retrieve the data because :<br/>' .mysqli_error($conn).
                    '.</p><p>the query being run was : '.$query.'</p>';
                }
            
                mysqli_close($conn);
            
            ?>
                  

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form class="main-form" action="adminBackend/updateAdminInfo.php" method="post" enctype="multipart/form-data">

                <?php
                  if(isset($_SESSION['status']))
                          {
                              ?>
                              <div class="alert alert-primary">
                                  <h5>
                                      <?= $_SESSION['status']; ?>
                                  </h5>
                              </div>
                              <?php
                              unset($_SESSION['status']);
                          }  
                  ?>
                
                  <div class="row mt-5 ">
                  <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <input type="text" name="email" class="form-control" placeholder="New Email">
                  </div>

                  <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                    <input type="text" name="phone" class="form-control" placeholder="New Contact Number">
                  </div>

                  <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                  <input type="file" name="image" id="image" class="form-control" placeholder="Upload new image here.. ">
                  </div>

                  <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <textarea name="address" id="address" class="form-control" rows="6" placeholder="address"></textarea>
                  </div>

                  
                </div>
                
                <button type="submit" name="submit" class="btn btn-primary mt-3 wow zoomIn" value="submit">Submit Request</button>
              </form>

                  
                </div>

               

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->


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