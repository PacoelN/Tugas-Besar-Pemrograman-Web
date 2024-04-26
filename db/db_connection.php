<?php
$dbHost = 'localhost';
$username = "admin";
$password = "admin123";
$dbName = "userDB";

$conn = mysqli_connect($dbHost, $username, $password, $dbName);

if (!$conn) {
    die("Connection Failed" . mysqli_connect_error());
}

mysqli_close($conn);
