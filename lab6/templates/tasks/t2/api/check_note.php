<?php
global $conn;
require_once 'config.php';
require_once 'auth.php';

header("Content-Type: application/json");

if (!isLoggedIn()) {
    die(json_encode(["isOwner" => false]));
}

$data = json_decode(file_get_contents("php://input"));

$stmt = $conn->prepare("SELECT id FROM notes WHERE id = ? AND user_id = ?");
$stmt->execute([$data->id, getCurrentUserId()]);

echo json_encode(["isOwner" => $stmt->rowCount() > 0]);