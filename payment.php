<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reservation_id = $_POST['rid'];
    $amount = $_POST['amount'];
    $payment_date = $_POST['payment_date'];
    $payment_method = $_POST['payment_method'];
    $status = $_POST['status'];

    $sql = "INSERT INTO Payments (`rid`, `amount`, `payment_date`, `payment_method`, `status`) VALUES ('$reservation_id', '$amount', '$payment_date', '$payment_method', '$status')";
    mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $result = mysqli_query($conn, "SELECT * FROM Payments");
    $payments = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($payments);
}

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $payment_id = $_PUT['payment_id'];
    $reservation_id = $_PUT['rid'];
    $amount = $_PUT['amount'];
    $payment_date = $_PUT['payment_date'];
    $payment_method = $_PUT['payment_method'];
    $status = $_PUT['status'];

    $sql = "UPDATE Payments SET reservation_id='$rid', amount='$amount', payment_date='$payment_date', payment_method='$payment_method', status='$status' WHERE payment_id='$payment_id'";
    mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $payment_id = $_DELETE['payment_id'];

    $sql = "DELETE FROM Payments WHERE payment_id='$payment_id'";
    mysqli_query($conn, $sql);
}
?>