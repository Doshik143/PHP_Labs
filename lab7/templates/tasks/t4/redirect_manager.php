<link rel="stylesheet" href="/templates/styles/style.css">
<?php
ob_start();

$redirects = json_decode(file_get_contents(__DIR__ . "/redirects.json"), true);

$request_uri = str_replace("/templates/tasks/t4", "", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

if (isset($redirects[$request_uri])) {
    $destination = $redirects[$request_uri];

    if ($destination === "/404") {
        http_response_code(404);
        echo "<title>Error404!</title>";
        echo "404 Not Found - Сторінку не знайдено.";
    } else {
        $query_string = $_SERVER['QUERY_STRING'] ? '?' . $_SERVER['QUERY_STRING'] : '';
        header("Location: /templates/tasks/t4" . $destination . $query_string, true, 301);
        exit();
    }
}

ob_end_flush();