<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($login === 'Admin' && $password === 'password') {
        $_SESSION['authenticated'] = true;
        $_SESSION['username'] = $login;
    } else {
        $error = "Невірний логін або пароль!";
    }
}
$authenticated = $_SESSION['authenticated'] ?? false;
$username = $_SESSION['username'] ?? '';

if ($authenticated) {
    include('welcome.php');
} else {

include('../../parts/tasksParts/header2.php');
include('../../parts/tasksParts/main2.php');
include('../../parts/footer.php');
}