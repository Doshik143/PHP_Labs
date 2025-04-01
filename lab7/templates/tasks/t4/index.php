<?php
require_once 'redirect_manager.php';
require __DIR__ . '/../t6/traffic_logger.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Redirect Test</title>
</head>
<body>
<h1>Тестування системи перенаправлень</h1>
<h3>Тестові посилання:</h3>
<ul>
    <li><a href="/templates/tasks/t4/old-page">/old-page (301 на /new-page)</a></li>
    <li><a href="/templates/tasks/t4/deprecated">/deprecated (404 помилка)</a></li>
</ul>
</body>
</html>