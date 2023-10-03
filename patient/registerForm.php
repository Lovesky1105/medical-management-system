<?php 
  session_start();
  include_once "backend/config.php";
  if(isset($_SESSION['id'])){
    header("location: index.php");
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>Grand Clinic</title>

  <link rel="stylesheet" href="../assets/css/maicons.css">

  <link rel="stylesheet" href="../assets/css/bootstrap.css">

  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/css/theme.css">


  
  <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>

  <style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}
body{
  background: #1abc9c;
  /*overflow: hidden;*/
}
::selection{
  background: rgba(26,188,156,0.3);
}
.container{
  max-width: 800px;
  padding: 0 20px;
  margin: 170px auto;
  max-heigth : 1500px;
}
.wrapper{
  width: 100%;
  background: #fff;
  border-radius: 5px;
  box-shadow: 0px 4px 10px 1px rgba(0,0,0,0.1);
}
.wrapper .title{
  height: 90px;
  background: #16a085;
  border-radius: 5px 5px 0 0;
  color: #fff;
  font-size: 30px;
  font-weight: 600;
  display: flex;
  align-items: center;
  justify-content: center;
}
.wrapper form{
  padding: 30px 25px 25px 25px;
}
.wrapper form .row{
  height: 45px;
  margin-bottom: 15px;
  position: relative;
}
.wrapper form .row input{
  height: 100%;
  width: 100%;
  outline: none;
  padding-left: 60px;
  border-radius: 5px;
  border: 1px solid lightgrey;
  font-size: 16px;
  transition: all 0.3s ease;
}
form .row input:focus{
  border-color: #16a085;
  box-shadow: inset 0px 0px 2px 2px rgba(26,188,156,0.25);
}
form .row input::placeholder{
  color: #999;
}
.wrapper form .row i{
  position: absolute;
  width: 47px;
  height: 100%;
  color: #fff;
  font-size: 18px;
  background: #16a085;
  border: 1px solid #16a085;
  border-radius: 5px 0 0 5px;
  display: flex;
  align-items: center;
  justify-content: center;
}
.wrapper form .pass{
  margin: -8px 0 20px 0;
}
.wrapper form .pass a{
  color: #16a085;
  font-size: 17px;
  text-decoration: none;
}
.wrapper form .pass a:hover{
  text-decoration: underline;
}
.wrapper form .button input{
  color: #fff;
  font-size: 20px;
  font-weight: 500;
  padding-left: 0px;
  background: #16a085;
  border: 1px solid #16a085;
  cursor: pointer;
}
form .button input:hover{
  background: #12876f;
}
.wrapper form .signup-link{
  text-align: center;
  margin-top: 20px;
  font-size: 17px;
}
.wrapper form .signup-link a{
  color: #16a085;
  text-decoration: none;
}
form .signup-link a:hover{
  text-decoration: underline;
}

    </style>

</head>

<body>
    
<div class="container">
      <div class="wrapper">
        <div class="title"><span>Grand Clinic Register Form</span></div>
        <form action="backend/register.php" method="POST" enctype="multipart/form-data" autocomplete="off">

          <div class="row">
            <input type="text" name="name" placeholder="Name" required>
          </div>

          <div class="row">
            <input type="text" name="email" placeholder="Email" required>
          </div>

          <div class="row">
            <input type="text" name="phone" placeholder="Phone Number" required>
          </div>

          <div class="row">
            <input type="text" name="address" placeholder="Address" required>
          </div>

          <div class="row">
            <input type="text" name="nric" placeholder="NRIC" required>
          </div>


          <div class="row">
            <select name="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
          

          <div class="row">
            <input type="password" name="password" placeholder="Password" required>
          </div>
          
          <div class="row button">
            <input type="submit" name="submit" value="Register">
          </div>

          <div class="signup-link">Have Account Already? <a href="loginForm.php">SignIn now</a></div>
        </form>
      </div>
    </div>

  <!--<script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>-->

  </div>
</body>
</html>






