<?php
global $conn;
require_once 'config.php';
require_once 'auth.php';

$data = json_decode(file_get_contents("php://input"));
$user_id = getCurrentUserId();

$query = "INSERT INTO notes (title, content, user_id) VALUES (?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->execute([$data->title, $data->content, $user_id]);

http_response_code(201);
echo json_encode(["message" => "Note created successfully."]);

if (!isLoggedIn()) {
    http_response_code(401);
    die(json_encode(["error" => "Для додавання нотаток увійдіть у систему"]));
}

if (empty($data->title) || empty($data->content)) {
    http_response_code(400);
    die(json_encode(["error" => "Заголовок і текст нотатки обов'язкові"]));
}