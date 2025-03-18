<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoginForm</title>
    <link rel="stylesheet" href="/templates/styles/login_style.css">
</head>
<body>
<?php if (isset($_SESSION['user_id'])): ?>
    <div class="welcome-container">
        <h1>Вітаємо, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <div class="actions">
            <a href="edit_profile.php" class="button">Редагувати профіль</a>
            <a href="logout.php" class="button">Вийти</a>
            <a href="delete_profile.php" class="button delete">Видалити профіль</a>
        </div>
    </div>
<?php else: ?>
    <div class="login-container">
        <h1>Sign In</h1>
        <form action="login.php" method="post">
            <div class="input-group">
                <input type="text" name="username" required>
                <label>Username</label>
            </div>
            <div class="input-group">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <button type="submit">Login</button>
        </form>
        <p class="register-link">Don't have an account? <a href="register.php">Click here!</a></p>
    </div>
<?php endif; ?>
</body>
</html>