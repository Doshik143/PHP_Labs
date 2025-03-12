<?php
if (!isset($_GET['task'])) {
    include('templates/parts/header.php');
    include('templates/main.php');
} else {
    $task = $_GET['task'];
    $path = 'templates/tasks/' . $task . '.php';

    if (file_exists($path)) {
        include($path);
    } else {
        include('templates/error404.php');
    }
}
include('templates/parts/footer.php');