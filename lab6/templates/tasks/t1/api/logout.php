<?php
require_once 'config.php';

session_start();
session_unset();
session_destroy();

echo json_encode(["success" => "Logged out successfully"]);