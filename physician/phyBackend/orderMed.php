<?php
    session_start();
    include_once "config.php";
    $medicineId =  $_POST['medicineId'];
    $medicineName =  $_POST['medicineName'];
    $orderAmount =  $_POST['orderAmount'];
    $currentDate = date('Y-m-d');
    
    $status ="pending";

    
    if(!empty($medicineId) && !empty($orderAmount) && !empty($medicineName)){

                        
                        $insert_query = mysqli_query($conn, "INSERT INTO orders 
                        (orderId, medicineId, medicineName, orderDate, receiveDate, orderAmount, status)
                        VALUES (0, '{$medicineId}', '{$medicineName}', '{$currentDate}', NULL, '{$orderAmount}', '{$status}')");
                        if($insert_query){
                                header("location: ../updateStockForm.php");
                                echo '<script>alert("Added successfully")</script>';
                                
                            }else{
                            echo "Something went wrong. Please try again!";
                            }
                    
        
    }else{
        echo "All input fields are required!";
    }
?>





