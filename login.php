<?php
session_start();
$conn = new mysqli("localhost", "root", "", "login_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT id, password FROM users WHERE email=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($user = $result->fetch_assoc()) {
    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: dashboard.html");
        exit();
    } else {
        echo "Incorrect password. Try again. <a href='login.html'>Login here</a>.";
    }
} else {
    echo "User not found.";
}
$conn->close();
?>
