<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $birthdate = $_POST['birthdate'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];

    $conn = new mysqli('localhost', 'root', '', 'lab5');
    if ($conn->connect_error) {
        die("Помилка підключення: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "<p class='error'>Користувач з таким логіном або email вже існує!</p>";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (username, password, email, fullname, phone, birthdate, address, gender) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $username, $password, $email, $fullname, $phone, $birthdate, $address, $gender);

        if ($stmt->execute()) {
            echo "<p class='success'>Реєстрація успішна! <a href='index.php'>Увійти</a></p>";
        } else {
            echo "<p class='error'>Помилка: " . $stmt->error . "</p>";
        }
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RegisterForm</title>
    <link rel="stylesheet" href="/templates/styles/register_style.css">
</head>
<body>
<div class="register-container">
    <h1>Registration</h1>
    <form action="register.php" method="post">
        <div class="input-group">
            <input type="text" name="username" required>
            <label>Username</label>
        </div>
        <div class="input-group">
            <input type="password" name="password" required>
            <label>Password</label>
        </div>
        <div class="input-group">
            <input type="email" name="email" required>
            <label>Email</label>
        </div>
        <div class="input-group">
            <input type="text" name="fullname">
            <label>FullName</label>
        </div>
        <div class="input-group">
            <input type="text" name="phone">
            <label>Phone</label>
        </div>
        <div class="input-group">
            <input type="date" name="birthdate">
            <label>Birth</label>
        </div>
        <div class="input-group">
            <textarea name="address"></textarea>
            <label>Address</label>
        </div>
        <div class="input-group">
            <label>↓ I`m ↓</label>
            <br>
            <select name="gender">
                <option value="male">Man</option>
                <option value="female">Woman</option>
            </select>
        </div>
        <button type="submit">Register</button>
        <p class="register-link">Do you have an account? <a href="index.php">Click here!</a></p>
    </form>
</div>
</body>
</html>