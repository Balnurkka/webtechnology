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
    $message = $_POST['message'];

    $sql = "INSERT INTO comments (name, email, message, created_at) VALUES ('$name', '$email', '$message', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "Данные успешно добавлены!";
    } else {
        echo "Ошибка: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
