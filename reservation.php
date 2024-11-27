<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $sid = $_POST['sid'];
    $reservation_start = $_POST['reservation_start'];
    $reservation_end = $_POST['reservation_end'];
    $status = $_POST['status'];

    $sql = "INSERT INTO Reservations (`user_id`, `s_id`, `reservation_start`, `reservation_end`, `status`) VALUES ('$user_id', '$space_id', '$reservation_start', '$reservation_end', '$status')";
    mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $result = mysqli_query($conn, "SELECT * FROM Reservations");
    $reservations = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($reservations);
}

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $reservation_id = $_PUT['reservation_id'];
    $user_id = $_PUT['user_id'];
    $sid = $_PUT['sid'];
    $reservation_start = $_PUT['reservation_start'];
    $reservation_end = $_PUT['reservation_end'];
    $status = $_PUT['status'];

    $sql = "UPDATE Reservations SET user_id='$user_id', space_id='$sid', reservation_start='$reservation_start', reservation_end='$reservation_end', status='$status' WHERE reservation_id='$reservation_id'";
    mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $reservation_id = $_DELETE['reservation_id'];

    $sql = "DELETE FROM Reservations WHERE reservation_id='$reservation_id'";
    mysqli_query($conn, $sql);
}
?>