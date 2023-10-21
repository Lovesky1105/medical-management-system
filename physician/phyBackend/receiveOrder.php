<?php
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
                    WHERE medicineId = '$medicineId' "
                    ;
                    if (mysqli_query($conn, $update)){
                    header("location: ../orderList.php");
                    }else{
                        print "cannot update new amount in medicine table";
                    }
                }
    }else {
        print "got problem";

    }
}

if (isset($_POST['cancel'])) {
   
    // update database
    $cancel_query = "UPDATE orders SET 
            status = 'cancel' 
            WHERE orderId = '$orderId' "
            ;

    if (mysqli_query($conn, $cancel_query)) {
      header("location: ../orderList.php");
  }else {
      print "got problem";

  }
}

mysqli_close($conn);
?>





