<?php
    session_start();
    include_once "config.php";
    
    $medName =  $_POST['medName'];
    $amount =  $_POST['amount'];
    $efficacy =  $_POST['efficacy'];
    $impNotes =  $_POST['impNotes'];
    $category =  $_POST['category'];
    $agreement = "pending";
    
    if(!empty($medName) && !empty($amount) && !empty($efficacy) && !empty($impNotes) && !empty($category)){
        if(is_numeric($amount)){
        $insert_query = mysqli_query($conn, "INSERT INTO medicine (medicineId, phyId, medicineName, 
        efficacy, impNotes, amount, category, agreement)
        VALUES (0, NULL, '{$medName}', '{$efficacy}', '{$impNotes}', 
        '{$amount}', '{$category}', '{$agreement}')");
        if($insert_query){
                header("location: ../addMedsForm.php");
                $_SESSION['status'] ='Added successfully waiting for approve';
            }else{
                header("location: ../addMedsForm.php");
                $_SESSION['status'] = '<p style="color:red;">Could not update the data because :<br/>' .mysqli_error($conn).
                '.</p><p>the query being run was : '.$insert_query.'</p>';
            }
        }else{
            header("location: ../addMedsForm.php");
        $_SESSION['status'] = "amount input are not number!";
        }
    }else{
        header("location: ../addMedsForm.php");
        $_SESSION['status'] = "All input fields are required!";
    }
?>






