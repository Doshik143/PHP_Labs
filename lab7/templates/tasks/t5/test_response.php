<?php
require_once 'Response.php';
use t5\Response;
require __DIR__ . '/../t6/traffic_logger.php';
$response = new Response();
$response->setStatus(200);
$response->addHeader("Content-Type: text/plain");
$response->send("Тестова відповідь");