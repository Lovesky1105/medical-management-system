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
                        
                        $insert_query = mysqli_query($conn, "INSERT INTO medicine (medicineId, medicineName, efficacy, impNotes, amount, category, agreement)
                        VALUES (0, '{$medName}', '{$efficacy}', '{$impNotes}', '{$amount}', '{$category}', '{$agreement}')");
                        if($insert_query){
                                header("location: ../addMedsForm.php");
                                echo '<script>alert("Added successfully")</script>';
                            }else{
                            echo "Something went wrong. Please try again!";
                            }
                    
        
    }else{
        echo "All input fields are required!";
    }
?>






