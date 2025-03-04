<form method="post">
    <div class="container">
        <div class="card">
            <a class="login">Create Folder</a>
            <div class="inputBox">
                <input type="text" id="login" name="login" required="required">
                <span class="user">Username</span>
            </div>
            <div class="inputBox">
                <input type="password" id="password" name="password" required="required">
                <span>Password</span>
            </div>
            <button class="enter" type="submit">Create</button>
        </div>
    </div>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];

    if (!file_exists($login)) {
        mkdir($login, 0777, true);

        mkdir("$login/video");
        mkdir("$login/music");
        mkdir("$login/photo");

        file_put_contents("$login/video/video1.mp4", "");
        file_put_contents("$login/music/music1.mp3", "");
        file_put_contents("$login/photo/photo1.jpg", "");

        echo "<p>Папка '$login' та підпапки успішно створені.</p>";
    } else {
        echo "<p style='color: red;'>Помилка: Папка з іменем '$login' вже існує.</p>";
    }
}
?>
<br>
<a href="/templates/tasks/t5/delete.php">
    <button type="button" class="button">
        <span class="button__text">Delete</span>
        <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="512" viewBox="0 0 512 512" height="512" class="svg"><title></title><path style="fill:none;stroke:#323232;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px" d="M112,112l20,320c.95,18.49,14.4,32,32,32H348c17.67,0,30.87-13.51,32-32l20-320"></path><line y2="112" y1="112" x2="432" x1="80" style="stroke:#323232;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px"></line><path style="fill:none;stroke:#323232;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px" d="M192,112V72h0a23.93,23.93,0,0,1,24-24h80a23.93,23.93,0,0,1,24,24h0v40"></path><line y2="400" y1="176" x2="256" x1="256" style="fill:none;stroke:#323232;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line><line y2="400" y1="176" x2="192" x1="184" style="fill:none;stroke:#323232;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line><line y2="400" y1="176" x2="320" x1="328" style="fill:none;stroke:#323232;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line></svg></span>
    </button>
</a>