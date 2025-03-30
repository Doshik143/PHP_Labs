<?php
global $conn;
require_once 'auth.php';

$data = json_decode(file_get_contents("php://input"));

error_log("Login attempt: " . print_r($data, true));

if (empty($data->username) || empty($data->password)) {
    http_response_code(400);
    die(json_encode(["error" => "Будь ласка, заповніть всі поля"]));
}

error_log("Querying user: " . $data->username);
$stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
$stmt->execute([$data->username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    error_log("User not found: " . $data->username);
    http_response_code(401);
    die(json_encode(["error" => "Користувача не знайдено"]));
}

error_log("Found user: " . print_r($user, true));

if (!password_verify($data->password, $user['password'])) {
    error_log("Password verification failed for user: " . $data->username);
    http_response_code(401);
    die(json_encode(["error" => "Невірний пароль"]));
}

$_SESSION['user_id'] = $user['id'];
error_log("Login successful for user ID: " . $user['id']);

echo json_encode(["success" => true]);