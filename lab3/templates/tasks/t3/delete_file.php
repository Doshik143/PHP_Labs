<title>FileDelete!</title>
<link rel="stylesheet" href="/templates/styles/t3_2_style.css">
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $filename = $_POST['filename'];

    if (empty($filename)) {
        die("Будь ласка, введіть ім'я файлу.");
    }

    $allowedDirectory = str_replace('\\', '/', __DIR__ . '/');
    $filepath = str_replace('\\', '/', realpath($allowedDirectory . $filename));

    if ($filepath === false) {
        die("Помилка: файл '$filename' не знайдено.");
    }

    if (!str_starts_with($filepath, $allowedDirectory)) {
        die("Помилка: недозволений шлях до файлу.");
    }

    if (unlink($filepath)) {
        echo "Файл '$filename' успішно видалено.";
    } else {
        echo "Помилка: не вдалося видалити файл '$filename'.";
    }
} else {
    die("Невірний метод запиту.");
}