<?php
include('parts/header_display.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = htmlspecialchars($_POST['login']);
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $gender = htmlspecialchars($_POST['gender']);
    $city = htmlspecialchars($_POST['city']);
    $games = $_POST['games'] ?? [];
    $about = htmlspecialchars($_POST['about']);

    $passwords_match = ($password === $password_confirm);

    $_SESSION['login'] = $login;
    $_SESSION['passwords_match'] = $passwords_match;
    $_SESSION['gender'] = $gender;
    $_SESSION['city'] = $city;
    $_SESSION['games'] = $games;
    $_SESSION['about'] = $about;

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $photo_name = $_FILES['photo']['name'];
        $photo_tmp_name = $_FILES['photo']['tmp_name'];
        $photo_size = $_FILES['photo']['size'];
        $photo_type = $_FILES['photo']['type'];

        $upload_dir = 'uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }
        $photo_path = $upload_dir . basename($photo_name);
        move_uploaded_file($photo_tmp_name, $photo_path);
        $_SESSION['photo_path'] = $photo_path;
    } else {
        $_SESSION['photo_path'] = 'Файл не був завантажений.';
    }
} else {
    header('Location: /templates/tasks/t3/index.php');
    exit();
}
include('parts/main_display.php');
include('../../parts/footer.php');