<?php
global $conn;
require_once 'config.php';

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->id)) {
    $query = "DELETE FROM notes WHERE id = :id";
    $stmt = $conn->prepare($query);

    $stmt->bindParam(':id', $data->id);

    if ($stmt->execute()) {
        http_response_code(200);
        echo json_encode(["message" => "Note deleted successfully."]);
    } else {
        http_response_code(503);
        echo json_encode(["message" => "Unable to delete note."]);
    }
} else {
    http_response_code(400);
    echo json_encode(["message" => "Unable to delete note. ID is missing."]);
}