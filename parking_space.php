<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $level_id = $_POST['lid'];
    $space_number = $_POST['space_number'];
    $is_occupied = $_POST['is_occupied'];

    $sql = "INSERT INTO ParkingSpaces (`lid`, `space_number`, `is_occupied`) VALUES ('$lid', '$space_number', '$is_occupied')";
    mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $result = mysqli_query($conn, "SELECT * FROM ParkingSpaces");
    $spaces = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($spaces);
}

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $space_id = $_PUT['sid'];
    $level_id = $_PUT['lid'];
    $space_number = $_PUT['space_number'];
    $is_occupied = $_PUT['is_occupied'];

    $sql = "UPDATE ParkingSpaces SET level_id='$level_id', space_number='$space_number', is_occupied='$is_occupied' WHERE space_id='$sid'";
    mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $space_id = $_DELETE['sid'];

    $sql = "DELETE FROM ParkingSpaces WHERE space_id='$sid'";
    mysqli_query($conn, $sql);
}
?>