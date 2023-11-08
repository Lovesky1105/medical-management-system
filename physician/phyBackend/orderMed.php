<?php
    session_start();
    include_once "config.php";
    $phyId = $_POST['phyId'];
    $medicineId =  $_POST['medicineId'];
    $medicineName =  $_POST['medicineName'];
    $orderAmount =  $_POST['orderAmount'];
    $currentDate = date('Y-m-d');
    
    $status ="pending";

    
    if(!empty($medicineId) && !empty($orderAmount) && !empty($medicineName)){
        if(is_numeric($orderAmount)){
                        $insert_query = mysqli_query($conn, "INSERT INTO orders 
                        (orderId, medicineId, phyId, medicineName, orderDate, receiveDate, orderAmount, status)
                        VALUES (0, '{$medicineId}', '{$phyId}', '{$medicineName}', '{$currentDate}', NULL, '{$orderAmount}', '{$status}')");
                        if($insert_query){
                                header("location: ../updateStockForm.php");
                                $_SESSION['status'] = 'Order place successfully';
                                
                            }else{
                                $_SESSION['status'] ='<p style="color:red;">Could not retrieve the data because :<br/>' .mysqli_error($conn).
                    '.</p><p>the query being run was : '.$insert_query.'</p>';
                    header("location: ../updateStockForm.php");
                            }
      }else{
        header("location: ../updateStockForm.php");
        $_SESSION['status'] = 'Only number are acceptable';
      }             
        
    }else{
        $_SESSION['status'] =  "All input fields are required!";
        header("location: ../updateStockForm.php");
    }
?>






