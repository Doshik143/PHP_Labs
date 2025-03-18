<title>UserNotFind!</title>
<link rel="stylesheet" href="/templates/styles/login_style.css">
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = new mysqli('localhost', 'root', '', 'lab5');
    if ($conn->connect_error) {
        die("Помилка підключення: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $username, $hashed_password);

    if ($stmt->fetch() && password_verify($password, $hashed_password)) {
        $_SESSION['user_id'] = $id;
        $_SESSION['username'] = $username;
        header("Location: index.php");
    } else {
        echo "<h4>Incorrect login or password! <br> <a href=\"index.php\">Continue</a></h4>";
    }

    $stmt->close();
    $conn->close();
}