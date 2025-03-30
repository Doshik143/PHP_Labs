<?php
global $conn;
require_once 'config.php';
require_once 'auth.php';

$isLoggedIn = isLoggedIn();
$userId = $isLoggedIn ? getCurrentUserId() : null;

$query = "SELECT id, title, content, created_at, updated_at, 
          CASE WHEN user_id = ? THEN 1 ELSE 0 END as is_owner
          FROM notes 
          ORDER BY updated_at DESC";

$stmt = $conn->prepare($query);
$stmt->execute([$userId]);

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));