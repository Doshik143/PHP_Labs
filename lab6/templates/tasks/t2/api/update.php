<?php
global $conn;
require_once 'config.php';

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->id) && !empty($data->title) && !empty($data->content)) {
    $query = "UPDATE notes SET title = :title, content = :content WHERE id = :id";
    $stmt = $conn->prepare($query);

    $stmt->bindParam(':title', $data->title);
    $stmt->bindParam(':content', $data->content);
    $stmt->bindParam(':id', $data->id);

    if ($stmt->execute()) {
        http_response_code(200);
        echo json_encode(["message" => "Note updated successfully."]);
    } else {
        http_response_code(503);
        echo json_encode(["message" => "Unable to update note."]);
    }
} else {
    http_response_code(400);
    echo json_encode(["message" => "Unable to update note. Data is incomplete."]);
}