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
        http_response_code(404);
        header("HTTP/1.1 404 Not Found");

        include('templates/error404.php');
    }
}
require __DIR__ . '/templates/tasks/t6/traffic_logger.php';
include('templates/parts/footer.php');