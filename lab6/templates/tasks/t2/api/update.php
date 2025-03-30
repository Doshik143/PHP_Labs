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

if (empty($data->id) || empty($data->title) || empty($data->content)) {
    http_response_code(400);
    die(json_encode(["error" => "Недостатньо даних"]));
}

$user_id = getCurrentUserId();

$checkQuery = "SELECT id FROM notes WHERE id = ? AND user_id = ?";
$checkStmt = $conn->prepare($checkQuery);
$checkStmt->execute([$data->id, $user_id]);

if ($checkStmt->rowCount() === 0) {
    http_response_code(403);
    die(json_encode(["error" => "Ця нотатка вам не належить"]));
}

$updateQuery = "UPDATE notes SET title = ?, content = ?, updated_at = CURRENT_TIMESTAMP WHERE id = ?";
$updateStmt = $conn->prepare($updateQuery);

if ($updateStmt->execute([$data->title, $data->content, $data->id])) {
    echo json_encode(["success" => true, "message" => "Нотатку оновлено"]);
} else {
    http_response_code(500);
    echo json_encode(["error" => "Помилка при оновленні"]);
}