<?php
    session_start();
    include_once "config.php";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $medicineId =  $_POST['medicineId']; 
    $medicineName =  $_POST['medicineName'];
    $sumAmount =  $_POST['sumAmount'];
    $avgAmount =  $_POST['avgAmount'];
    $difDate =  $_POST['difDate'];
    $avgDifDate =  $_POST['avgDifDate'];
    $currentDate = date('Y-m-d');
    

    
    if(!empty($medicineId) && !empty($medicineName) && !empty($sumAmount)
    && !empty($avgAmount)&& !empty($difDate)&& !empty($avgDifDate)){

                        $safetyStock = ($sumAmount * $difDate) - ($avgAmount*$avgDifDate);
                        $rop = ($avgAmount * $difDate)+$safetyStock;
                        $insert_query = mysqli_query($conn, "INSERT INTO report 
                        (reportId, medicineId, medicineName, dateGenerate, maxAmount, avgAmount, maxReachTime, avgReachTime, safetyStock, reorderPoint)
                        VALUES (0, '{$medicineId}', '{$medicineName}', '{$currentDate}', '{$sumAmount}', '{$avgAmount}', 
                        '{$difDate}', '{$avgDifDate}', '{$safetyStock}', '{$rop}')");
                            if($insert_query){
                                header("location: ../updateStockForm.php");
                                echo '<script>alert("Added successfully")</script>';
                            }else{
                            echo "Something went wrong. Please try again!";
                            }
                           
        
    }else{
        echo "All input fields are required!";
    }
}
?>






