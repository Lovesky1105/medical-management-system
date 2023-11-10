<?php 
  session_start();
  include_once "phyBackend/config.php";
  if(isset($_SESSION['phyId'])){
    header("location: dashboard.php");
  }
?>


<body>
<div class="body">
  <div class="wrapper">
    <section class="form login">
      <header>Grand Clinic</header>
      <form action="phyBackend/phyLogin.php" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>

        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>

        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter your password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Login">
        </div>
      </form>
      <div class="link">Not yet signed up? <a href="phyRegisterForm.php">Signup now</a></div>
    </section>
  </div>
  
  
  <!--<script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login.js"></script>-->

  </div>
</body>
</html>
