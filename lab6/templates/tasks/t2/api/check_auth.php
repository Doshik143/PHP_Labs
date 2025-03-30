<?php
global $conn;
require_once 'auth.php';

error_log("Current session: " . print_r($_SESSION, true));

if (isLoggedIn()) {
    $stmt = $conn->prepare("SELECT username FROM users WHERE id = ?");
    $stmt->execute([getCurrentUserId()]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode([
        'authenticated' => true,
        'username' => $user['username'],
        'user_id' => getCurrentUserId()
    ]);
} else {
    echo json_encode(['authenticated' => false]);
}