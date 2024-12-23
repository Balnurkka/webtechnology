<?php
$servername = "localhost";
$user = "root";
$pass = "mysql";
$dbname = "restaurant_db";

$conn = new mysqli($servername, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $datetime = $_POST['datetime'];
    $guests = $_POST['guests'];
    $message = $_POST['message'];
    $formatted_datetime = DateTime::createFromFormat('d.m.Y H:i', $datetime)->format('Y-m-d H:i:s');

    $sql = "INSERT INTO bookings (name, email, datetime, guests, message) VALUES ('$name', '$email', '$formatted_datetime', '$guests', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Данные успешно добавлены!";
    } else {
        echo "Ошибка: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>