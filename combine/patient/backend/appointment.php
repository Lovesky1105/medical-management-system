<?php
session_start();
include_once "config.php";

$id = $_SESSION['id'];
$date = $_POST['date'];
$slot = $_POST['slot'];
$phyId = $_POST['phyId'];
$msg = $_POST['message'];
$status = "pending";

$sql = mysqli_query($conn, "SELECT * FROM users WHERE id = '{$id}'");

if ($sql) {
    $row = mysqli_fetch_assoc($sql); // Fetch data from the query
    $patientName = $row["name"];
    $patientNRIC = $row['nric'];
    $patientGender = $row['gender'];
    $patientEmail = $row['email'];
    $patientPhone = $row['phone'];

    if (!empty($date) && !empty($slot) && !empty($phyId)) {
        $query = mysqli_query($conn, "INSERT INTO appointment (appointmentid, id, patientName, patientNRIC, patientGender, patientEmail, patientPhone, date, slot, phyId, msg, status)
        VALUES (0, '{$id}','{$patientName}','{$patientNRIC}','{$patientGender}','{$patientEmail}','{$patientPhone}', '{$date}', '{$slot}', '{$phyId}', '{$msg}', '{$status}')");

        echo '<script>alert("Successfully make an appointment!")</script>';
        header("location: ../index.php");
    } else {
        echo "All input fields are required!";
    }
} else {
    // Handle the case when the query doesn't return data.
    echo "User data not found";
}
?>