<?php
session_start();
include_once "config.php";
    $agreement = "pending";
    $orderId = $_POST['orderId'];
    $medicineId = $_POST['medicineId'];
    $orderAmount = $_POST['orderAmount'];
    $receiveDate = date('Y-m-d');
   

    $query="SELECT * FROM orders WHERE orderId = '{$orderId}'";

if (isset($_POST['receive'])) {

      // update database
    $update_query = "UPDATE orders SET 
            status = 'receive' ,
            receiveDate = '$receiveDate'
            WHERE orderId = '$orderId' "
            ;

      if (mysqli_query($conn, $update_query)) {
        $query2="SELECT * FROM medicine WHERE medicineId = '{$medicineId}'";
        $result = mysqli_query($conn, $query2);
        $row = mysqli_fetch_assoc($result);
        //$oriAmount =  "'{$row['amount']}'";
        $oriAmount = (float) $row['amount'];
        $newAmount = $oriAmount + (float) $orderAmount;

            $newAmount = $oriAmount + $orderAmount;
                if (mysqli_query($conn, $query2)){
                    $update = "UPDATE medicine SET 
                    amount = '{$newAmount}' 
                    WHERE medicineId = '$medicineId' ";
                    if (mysqli_query($conn, $update)){
                    $_SESSION['status'] = "Item Receive successfully!";
                    header("location: ../orderList.php");
                    }else{
                        $_SESSION['status'] = '<p style="color:red;">Could not update the data because :<br/>' .mysqli_error($conn).
                        '.</p><p>the query being run was : '.$update.'</p>';
                        header("location: ../orderList.php");
                    }
                }
    }else {
        $_SESSION['status'] = '<p style="color:red;">Could not update the data because :<br/>' .mysqli_error($conn).
        '.</p><p>the query being run was : '.$update_query.'</p>';
        header("location: ../orderList.php");
    }
}

if (isset($_POST['cancel'])) {
   
    // update database
    $cancel_query = "UPDATE orders SET 
            status = 'cancel' 
            WHERE orderId = '$orderId' "
            ;

    if (mysqli_query($conn, $cancel_query)) {
        $_SESSION['status'] = "Order cancel successfully!";
      header("location: ../orderList.php");
  }else {
    $_SESSION['status'] = '<p style="color:red;">Could not update the data because :<br/>' .mysqli_error($conn).
    '.</p><p>the query being run was : '.$cancel_query.'</p>';
    header("location: ../orderList.php");

  }
}

mysqli_close($conn);
?>





