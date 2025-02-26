<?php
include('../../parts/tasksParts/header1_5.php');
function generatePassword($length = 12) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_+=<>?';
    $password = '';
    $charactersLength = strlen($characters);
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, $charactersLength - 1)];
    }
    return $password;
}
function isStrongPassword($password) {
    return preg_match('/[A-Z]/', $password) &&  // принаймні одна велика літера
        preg_match('/[a-z]/', $password) &&  // принаймні одна мала літера
        preg_match('/[0-9]/', $password) &&  // принаймні одна цифра
        preg_match('/[!@#$%^&*()\-_=+<>?]/', $password) &&  // принаймні один спецсимвол
        strlen($password) >= 8;  // мінімальна довжина 8 символів
}
$generatedPassword = "";
$isStrong = "";
$userPassword = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['password_length'])) {
        $passwordLength = (int)$_POST['password_length'];
        $generatedPassword = generatePassword($passwordLength);
    }
    if (!empty($_POST['user_password'])) {
        $userPassword = $_POST['user_password'];
        $isStrong = isStrongPassword($userPassword) ? "✅ Міцний пароль" : "❌ Слабкий пароль";
    }
}
include('../../parts/tasksParts/main1_5.php');
include('../../parts/footer.php');