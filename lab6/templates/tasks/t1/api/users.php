<?php
global $conn;
require_once 'config.php';

header("Content-Type: application/json; charset=UTF-8");

try {
    session_start();
    if (!isset($_SESSION['user_id'])) {
        throw new Exception("Not authorized");
    }

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            $stmt = $conn->query("SELECT id, name, email, created_at FROM users");
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($users, JSON_UNESCAPED_UNICODE);
            break;

        case 'DELETE':
            $input = json_decode(file_get_contents("php://input"), true);
            if (empty($input['id'])) {
                throw new Exception("User ID is required");
            }

            $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
            $stmt->execute([$input['id']]);
            echo json_encode(["success" => "User deleted successfully"]);
            break;

        case 'PUT':
            $input = json_decode(file_get_contents("php://input"), true);
            if (empty($input['id']) || empty($input['name']) || empty($input['email'])) {
                throw new Exception("All fields are required");
            }

            $stmt = $conn->prepare("SELECT id FROM users WHERE email = ? AND id != ?");
            $stmt->execute([$input['email'], $input['id']]);
            if ($stmt->rowCount() > 0) {
                throw new Exception("Email already exists");
            }

            $stmt = $conn->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
            $stmt->execute([$input['name'], $input['email'], $input['id']]);
            echo json_encode(["success" => "User updated successfully"]);
            break;

        default:
            throw new Exception("Method not allowed");
    }
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(["error" => $e->getMessage()]);
}