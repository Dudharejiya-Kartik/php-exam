<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $level_number = $_POST['level_number'];
    $total_spaces = $_POST['total_spaces'];
    $available_spaces = $_POST['available_spaces'];
    $location_description = $_POST['location_description'];

    $sql = "INSERT INTO ParkingLevels (`level_number`, `total_spaces`, `available_spaces`, `location_description`) VALUES ('$level_number', '$total_spaces', '$available_spaces', '$location_description')";
    mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $result = mysqli_query($conn, "SELECT * FROM ParkingLevels");
    $levels = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($levels);
}

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $level_id = $_PUT['lid'];
    $level_number = $_PUT['level_number'];
    $total_spaces = $_PUT['total_spaces'];
    $available_spaces = $_PUT['available_spaces'];
    $location_description = $_PUT['location_description'];

    $sql = "UPDATE ParkingLevels SET level_number='$level_number', total_spaces='$total_spaces', available_spaces='$available_spaces', location_description='$location_description' WHERE level_id='$lid'";
    mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $level_id = $_DELETE['lid'];

    $sql = "DELETE FROM ParkingLevels WHERE level_id='$lid'";
    mysqli_query($conn, $sql);
}
?>