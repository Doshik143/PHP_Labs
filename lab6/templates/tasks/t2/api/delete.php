<?php
global $conn;
require_once 'config.php';
require_once 'auth.php';

header("Content-Type: application/json");

if (!isLoggedIn()) {
    http_response_code(401);
    die(json_encode(["error" => "Необхідно авторизуватися"]));
}

$data = json_decode(file_get_contents("php://input"));

if (empty($data->id)) {
    http_response_code(400);
    die(json_encode(["error" => "Не вказано ID нотатки"]));
}

$user_id = getCurrentUserId();

$checkQuery = "SELECT id FROM notes WHERE id = ? AND user_id = ?";
$checkStmt = $conn->prepare($checkQuery);
$checkStmt->execute([$data->id, $user_id]);

if ($checkStmt->rowCount() === 0) {
    http_response_code(403);
    die(json_encode(["error" => "Ця нотатка вам не належить"]));
}

$deleteQuery = "DELETE FROM notes WHERE id = ?";
$deleteStmt = $conn->prepare($deleteQuery);

if ($deleteStmt->execute([$data->id])) {
    echo json_encode(["success" => true, "message" => "Нотатку видалено"]);
} else {
    http_response_code(500);
    echo json_encode(["error" => "Помилка при видаленні"]);
}