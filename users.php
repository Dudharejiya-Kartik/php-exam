<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $user_type = $_POST['user_type'];

    $sql = "INSERT INTO Users (`username`, `password`, `email`, `phone_number`, `user_type`) VALUES ('$username', '$password', '$email', '$phone_number', '$user_type')";
    mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $result = mysqli_query($conn, "SELECT * FROM Users");
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($users);
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $user_id = $_PUT['user_id'];
    $username = $_PUT['username'];
    $email = $_PUT['email'];
    $phone_number = $_PUT['phone_number'];
    $user_type = $_PUT['user_type'];

    $sql = "UPDATE Users SET username='$username', email='$email', phone_number='$phone_number', user_type='$user_type' WHERE user_id='$user_id'";
    mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $user_id = $_DELETE['user_id'];

    $sql = "DELETE FROM Users WHERE user_id='$user_id'";
    mysqli_query($conn, $sql);
}
?>