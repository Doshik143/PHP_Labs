<?php
global $conn;
require_once 'config.php';

$query = "SELECT id, title, content, created_at, updated_at FROM notes ORDER BY updated_at DESC";
$stmt = $conn->prepare($query);
$stmt->execute();

$notes = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($notes);