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
    <section class="form signup">
      <header>Grand Clinic</header>
      <form action="phyBackend/phyRegister.php" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>

        <p>Welcome to Grand Clinic family new physician!</p>
        <p>Please fill in the form and submit.</p>
        <p>Once your account has been approve, you only can login.</p>
          <div class="field input">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" required>
          </div>

          <div class="field input">
            <label>NRIC Number </label>
            <input type="text" name="nric" placeholder="NRIC" required>
          </div>

        <div class="field input">
            <label>Phone Number</label>
            <input type="text" name="phone" placeholder="Phone number" required>
          </div>

        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Email Address" required>
        </div>

        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Password" required>
          <i class="fas fa-eye"></i>
        </div>

        <div class="field input">
          <label>Gender</label>
            <select name="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>

        <div class="field input">
          <label>Gender</label>
            <select name="access_lvl">
                <option value="doctor">Doctor</option>
                <option value="nurse">Nurse</option>
            </select>
        </div>
        
        <div class="field button">
          <input type="submit" name="submit" value="submit">
        </div>
      </form>
      <div class="link">Already signed up? <a href="phyLoginForm.php">Login now</a></div>
    </section>
  </div>

  <!--<script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>-->

  </div>
</body>
</html>
