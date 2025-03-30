<?php
require_once 'auth.php';

$data = json_decode(file_get_contents("php://input"));

if (empty($data->username) || empty($data->password)) {
    http_response_code(400);
    die(json_encode(["error" => "Будь ласка, заповніть всі поля"]));
}

if (strlen($data->password) < 6) {
    http_response_code(400);
    die(json_encode(["error" => "Пароль повинен містити щонайменше 6 символів"]));
}

try {
    if (register($data->username, $data->password)) {
        echo json_encode(["success" => true]);
    } else {
        http_response_code(400);
        echo json_encode(["error" => "Registration failed"]);
    }
} catch (PDOException $e) {
    http_response_code(400);
    echo json_encode(["error" => "Username already exists"]);
}