<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>FormForDeleteFolder</title>
    <link rel="stylesheet" href="/templates/styles/t5_style.css">
</head>
<body>
<form method="post">
    <div class="container">
        <div class="card">
            <a class="login">Delete Folder</a>
            <div class="inputBox">
                <input type="text" id="login" name="login" required="required">
                <span class="user">Username</span>
            </div>
            <div class="inputBox">
                <input type="password" id="password" name="password" required="required">
                <span>Password</span>
            </div>
            <button class="enter" type="submit">Delete</button>
        </div>
    </div>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];

    if (file_exists($login)) {
        function deleteDirectory($dir) {
            if (!file_exists($dir)) {
                return true;
            }
            if (!is_dir($dir)) {
                return unlink($dir);
            }
            foreach (scandir($dir) as $item) {
                if ($item == '.' || $item == '..') {
                    continue;
                }
                if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
                    return false;
                }
            }
            return rmdir($dir);
        }

        if (deleteDirectory($login)) {
            echo "<p>Папка '$login' успішно видалена.</p>";
        } else {
            echo "<p style='color: red;'>Помилка: Не вдалося видалити папку '$login'.</p>";
        }
    } else {
        echo "<p style='color: red;'>Помилка: Папка з іменем '$login' не існує.</p>";
    }
}
?>

<br>
<a href="/templates/tasks/t5/1.php">
    <button class="button">
        <svg fill="none" height="24" viewBox="0 0 24 24" width="24" class="svg-icon">
            <g
                clip-rule="evenodd"
                fill-rule="evenodd"
                stroke="#056dfa"
                stroke-linecap="round"
                stroke-width="2"
            >
                <path
                    d="m3 7h17c.5523 0 1 .44772 1 1v11c0 .5523-.4477 1-1 1h-16c-.55228 0-1-.4477-1-1z"
                ></path>
                <path
                    d="m3 4.5c0-.27614.22386-.5.5-.5h6.29289c.13261 0 .25981.05268.35351.14645l2.8536 2.85355h-10z"
                ></path>
            </g>
        </svg>
        <span class="lable">Create</span>
    </button>
</a>
</body>
</html>