<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Підключення до бази даних
    $conn = new mysqli('localhost', 'root', '', 'lab5');
    if ($conn->connect_error) {
        die("Помилка підключення: " . $conn->connect_error);
    }

    // Видалення користувача
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $_SESSION['user_id']);

    if ($stmt->execute()) {
        session_destroy();
        echo "<p class='success'>Профіль успішно видалено. <a href='index.php'>На головну</a></p>";
    } else {
        echo "<p class='error'>Помилка: " . $stmt->error . "</p>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeleteProfile</title>
    <link rel="stylesheet" href="/templates/styles/delete_style.css"> <!-- Підключення CSS-файлу -->
</head>
<body>
<div class="delete-profile-container">
    <h1>Deleting A Profile</h1>
    <form action="delete_profile.php" method="post">
        <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete your profile?')">Delete</button>
    </form>
</div>
</body>
</html>