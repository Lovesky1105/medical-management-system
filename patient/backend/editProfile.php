<?php
session_start();
if(!isset($_SESSION['id'])){
    header("location: loginForm.php");
  }
include_once "config.php";

   if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    if(!empty($name) && !empty($email) && !empty($address) && !empty($phone)){  
      if (is_numeric($phone)) {
      if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
        if(mysqli_num_rows($sql) > 0){
            $_SESSION['status'] = "$email - This email already exist!";
            header("Location: ../profile.php");
            exit(0);
        }else{

      $edit_query=" UPDATE users SET
      name = '$name',
      email = '$email',
      address = '$address',
      phone = '$phone'
      WHERE id ='$id'";
      if(mysqli_query($conn, $edit_query)){
        $_SESSION['status'] = 'Edit Successfully'; 
        header("Location: ../profile.php");
      }else{
      $_SESSION['status'] ='<p style="color:red;">Could not retrieve the data because :<br/>' .mysqli_error($conn).
                        '.</p><p>the query being run was : '.$edit_query.'</p>';
    }
    }
  }else{
    $_SESSION['status'] = "$email is not a valid email!";
    header("Location: ../profile.php");
    exit(0);}
  }else{
    $_SESSION['status'] = "phone input is not a number!";
    header("Location: ../profile.php");
    exit(0);
}
    
    
  }else{
    $_SESSION['status'] =  "All input fields are required!";
    header("location: ../profile.php");
  }
   }
    mysqli_close($conn);
      
    ?>