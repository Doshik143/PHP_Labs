<?php
include('parts/header_index.php');
session_start();
if (isset($_GET['lang'])) {
    $language = $_GET['lang'];
    setcookie("lang", $language, time() + (180 * 24 * 60 * 60));
} elseif (isset($_COOKIE['lang'])) {
    $language = $_COOKIE['lang'];
} else {
    $language = 'ukr';
}
$langText = [
    'ukr' => 'Вибрана мова: Українська.',
    'eng' => 'Selected language: English.'
];
include('parts/main_index.php');
include('../../parts/footer.php');