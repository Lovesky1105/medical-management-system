<?php
    session_start();
    include_once "config.php";
    $medicineId =  $_POST['medicineId'];
    $medName =  $_POST['medicineName'];
    $efficacy =  $_POST['efficacy'];
    $impNotes =  $_POST['impNotes'];
    $category =  $_POST['category'];
    $agreement = "pending";
    
    if(!empty($medName) && !empty($efficacy) && !empty($impNotes) && !empty($category)){
        
                        
            $update_query = "UPDATE medicine SET 
            medicineName = '$medName',
            efficacy = '$efficacy',
            impNotes = '$impNotes',
            category = '$category',
            agreement = '$agreement'
            WHERE medicineId = '$medicineId'";
            if(mysqli_query($conn, $update_query)){
                    $_SESSION['status'] = "Edit Successfully";
                    header("Location: ../updateStockForm.php");
                }else{
                    $_SESSION['status'] = '<p style="color:red;">Could not update the data because :<br/>' .mysqli_error($conn).
                    '.</p><p>the query being run was : '.$update_query.'</p>';
                    header("Location: ../updateStockForm.php");
                }
                    
        
    }else{
        $_SESSION['status'] = "All input fields are required!";
        header("Location: ../updateStockForm.php");
    }
?>






