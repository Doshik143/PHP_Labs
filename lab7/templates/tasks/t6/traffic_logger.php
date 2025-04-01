<?php
global $pdo;
require 'db_connect.php';

$ip = $_SERVER['REMOTE_ADDR'];
$time = date('Y-m-d H:i:s');
$url = $_SERVER['REQUEST_URI'];
$status = http_response_code();
error_log("Запит: $url | Статус: $status");

$stmt = $pdo->prepare("INSERT INTO traffic (ip, time, url, status) VALUES (?, ?, ?, ?)");
if (!$stmt->execute([$ip, $time, $url, $status])) {
    print_r($stmt->errorInfo());
}