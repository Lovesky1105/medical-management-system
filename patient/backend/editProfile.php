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
      $edit_query=" UPDATE users SET
      name = '$name',
      email = '$email',
      address = '$address',
      phone = '$phone'
      WHERE id ='$id'";
      if(mysqli_query($conn, $edit_query)){
        echo '<script>alert("Edit Successfully")</script>'; 
        header("Location: ../profile.php");
    }else{
        print'<p style="color:red;">Could not retrieve the data because :<br/>' .mysqli_error($conn).
                        '.</p><p>the query being run was : '.$edit_query.'</p>';
    }
    }
    mysqli_close($conn);
      
    ?>