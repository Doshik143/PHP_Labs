<title>Log_IP_Address</title>
<link rel="stylesheet" href="/templates/styles/style.css">
<?php
require __DIR__ . '/../t6/traffic_logger.php';
$limit = 5;
$logFile = 'requests.log';
$currentTime = time();

$clientIP = $_SERVER['REMOTE_ADDR'] ?? 'невідомий';

ob_start();

function cleanOldEntries($logFile, $currentTime) {
    if (!file_exists($logFile)) {
        return;
    }

    $lines = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if ($lines === false) {
        return;
    }

    $updatedLines = [];
    foreach ($lines as $line) {
        list($ip, $timestamp) = explode('|', $line, 2);
        if ($currentTime - intval($timestamp) <= 60) {
            $updatedLines[] = $line;
        }
    }

    file_put_contents($logFile, implode(PHP_EOL, $updatedLines) . PHP_EOL);
}

function countRecentRequests($logFile, $clientIP, $currentTime) {
    if (!file_exists($logFile)) {
        return 0;
    }

    $count = 0;
    $lines = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if ($lines === false) {
        return 0;
    }

    foreach ($lines as $line) {
        list($ip, $timestamp) = explode('|', $line, 2);
        if ($ip === $clientIP && $currentTime - intval($timestamp) <= 60) {
            $count++;
        }
    }

    return $count;
}

cleanOldEntries($logFile, $currentTime);

file_put_contents($logFile, "$clientIP|$currentTime" . PHP_EOL, FILE_APPEND);

$requestCount = countRecentRequests($logFile, $clientIP, $currentTime);

if ($requestCount > $limit) {
    ob_end_clean();

    header('HTTP/1.1 429 Too Many Requests');
    header('Retry-After: 60');

    echo "Error 429: Забагато запитів. Будь ласка, спробуйте пізніше.";
    exit;
}

header('HTTP/1.1 200 OK');
echo "Ласкаво просимо! Це ваш запит №" . $requestCount . " за останню хвилину.";

ob_end_flush();