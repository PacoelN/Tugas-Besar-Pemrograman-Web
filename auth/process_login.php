<?php
session_start();

$users = array(
    'john' => 'password123',
    'jane' => 'hello456',
    'fadhil' => 'fadhil123',
    'pascal' => 'pascal123'
);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];


    if (array_key_exists($username, $users)) {
        if ($users[$username] === $password) {
            $_SESSION['username'] = $username;
            $_SESSION['logged_in'] = true;
            header("Location: ../index.php"); // Ubah ini sesuai dengan lokasi yang Anda inginkan
            exit();
        } else {
            $_SESSION['login_error'] = "Invalid password";
            header("Location: login.php"); // Redirect kembali ke halaman login
            exit();
        }
    } else {
        $_SESSION['login_error'] = "User not found";
        header("Location: login.php"); // Redirect kembali ke halaman login
        exit();
    }
}
