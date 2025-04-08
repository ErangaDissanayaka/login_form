<?php
include 'database.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $username, $email, $password);

if ($stmt->execute()) {
    echo "Signup successful! <a href='login.html'>Login here</a>.";
} else {
    echo "Signup failed: " . $stmt->error;
}
$conn->close();
?>
