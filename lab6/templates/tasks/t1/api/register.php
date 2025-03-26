<?php
global $conn;
require_once 'config.php';

$data = json_decode(file_get_contents("php://input"));

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["error" => "Method not allowed"]);
    exit();
}

if (empty($data->name) || empty($data->email) || empty($data->password)) {
    echo json_encode(["error" => "All fields are required"]);
    exit();
}

if (strlen($data->password) < 6) {
    echo json_encode(["error" => "Password must be at least 6 characters long"]);
    exit();
}

$stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
$stmt->execute([$data->email]);
if ($stmt->rowCount() > 0) {
    echo json_encode(["error" => "Email already exists"]);
    exit();
}

$hashedPassword = password_hash($data->password, PASSWORD_DEFAULT);
$stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
$stmt->execute([$data->name, $data->email, $hashedPassword]);

echo json_encode(["success" => "User registered successfully"]);