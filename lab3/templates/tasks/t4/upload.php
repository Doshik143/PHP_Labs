<title>ImgUploaded!</title>
<link rel="stylesheet" href="/templates/styles/style.css">
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $uploadDirectory = 'uploads/';
    if (!file_exists('uploads')) {
        mkdir('uploads', 0777, true);
    }
    $uploadFile = $uploadDirectory . basename($_FILES['image']['name']);

    $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($imageFileType, $allowedTypes)) {
        die("Вибачте, дозволені лише файли типу JPG, JPEG, PNG та GIF.");
    }

    if (file_exists($uploadFile)) {
        die("Вибачте, файл вже існує.");
    }

    if ($_FILES['image']['size'] > 5000000) {
        die("Вибачте, ваш файл занадто великий.");
    }

    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
        echo "Файл " . htmlspecialchars(basename($_FILES['image']['name'])) . " був успішно завантажений.";
    } else {
        echo "Вибачте, сталася помилка при завантаженні вашого файлу.";
    }
} else {
    echo "Вибачте, ваш файл не був завантажений.";
}