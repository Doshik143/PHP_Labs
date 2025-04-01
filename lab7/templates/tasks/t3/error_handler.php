<link rel="stylesheet" href="/templates/styles/style.css">
<?php
require __DIR__ . '/../t6/traffic_logger.php';
ob_start();
function handleFatalError() {
    $error = error_get_last();

    if ($error !== null && $error['type'] === E_ERROR) {
        ob_clean();

        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
        header('Content-Type: text/html; charset=utf-8');
        date_default_timezone_set('Europe/Kyiv');
        $timeFixed = date('H:i', time() + 3600);
        echo '<!DOCTYPE html>
        <html lang="uk">
        <head>
            <title>500_ServerError</title>
            <style>
                body { font-family: Arial, sans-serif; text-align: center;  }
                h1 { color: #d9534f; }
                .info { background: #f9f9f9; padding: 20px; margin: 20px auto; max-width: 500px; }
            </style>
        </head>
        <body>
            <h1>500 Помилка сервера</h1>
            <div class="info">
                <p>Вибачте, сталася критична помилка.</p>
                <p>Спробуйте оновити сторінку або повернутися пізніше.</p>
                <p><strong>Проблема буде вирішена до ' . $timeFixed . '</strong></p>
            </div>
        </body>
        </html>';
        exit();
    }
}
register_shutdown_function('handleFatalError');
//========================================
echo '<title>Welcome!</title>';
echo "<h1>Ласкаво просимо на сайт!</h1>";
echo "<p>Це головна сторінка.</p>";
//someFunction();
$message = "Усе працює коректно!";
echo "<p>$message</p>";
//========================================
header($_SERVER['SERVER_PROTOCOL'] . ' 200 OK', true, 200);
ob_end_flush();