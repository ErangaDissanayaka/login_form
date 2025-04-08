<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "login_db";

$conn = mysqli_connect($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("connection_failed" .$conn->connect_error);
}

?>