<?php
namespace Models;
/**
 * Відповідає за роботу з даними користувача.
 */
class UserModel {
    /**
     * Повертає інформацію про користувача.
     *
     * @return string Інформація про користувача.
     */
    public function getUserInfo() {
        return "Hello! I`m User:)";
    }
    public function displayMessage() {
        echo "<br>UserModel_Done✔<br>";
    }
}