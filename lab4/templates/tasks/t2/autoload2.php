<?php
spl_autoload_register(/**
 * @throws Exception
 */ function ($className) {
    $classMap = [
        'UserController' => 'Controllers/UserController.php',
        'UserModel' => 'Models/UserModel.php',
        'UserView' => 'Views/UserView.php',
    ];

    if (isset($classMap[$className])) {
        $filePath = __DIR__ . '/' . $classMap[$className];

        if (file_exists($filePath)) {
            require_once $filePath;
            return;
        }
    }
    throw new Exception("Помилка: клас '$className' не знайдено.");
});