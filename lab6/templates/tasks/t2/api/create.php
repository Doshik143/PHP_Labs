<?php
global $conn;
require_once 'config.php';

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->title) && !empty($data->content)) {
    $query = "INSERT INTO notes (title, content) VALUES (:title, :content)";
    $stmt = $conn->prepare($query);

    $stmt->bindParam(':title', $data->title);
    $stmt->bindParam(':content', $data->content);

    if ($stmt->execute()) {
        http_response_code(201);
        echo json_encode(["message" => "Note created successfully."]);
    } else {
        http_response_code(503);
        echo json_encode(["message" => "Unable to create note."]);
    }
} else {
    http_response_code(400);
    echo json_encode(["message" => "Unable to create note. Data is incomplete."]);
}