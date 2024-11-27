<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $license_plate = $_POST['license_plate'];
    $vehicle_type = $_POST['vehicle_type'];
    $color = $_POST['color'];

    $sql = "INSERT INTO Vehicles (`user_id`, `license_plate`, `vehicle_type`, color) VALUES ('$user_id', '$license_plate', '$vehicle_type', '$color')";
    mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $result = mysqli_query($conn, "SELECT * FROM Vehicles");
    $vehicles = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($vehicles);
}

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $vehicle_id = $_PUT['vehicle_id'];
    $user_id = $_PUT['user_id'];
    $license_plate = $_PUT['license_plate'];
    $vehicle_type = $_PUT['vehicle_type'];
    $color = $_PUT['color'];

    $sql = "UPDATE Vehicles SET user_id='$user_id', license_plate='$license_plate', vehicle_type='$vehicle_type', color='$color' WHERE vehicle_id='$vehicle_id'";
    mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $vehicle_id = $_DELETE['vehicle_id'];

    $sql = "DELETE FROM Vehicles WHERE vehicle_id='$vehicle_id'";
    mysqli_query($conn, $sql);
}
?>