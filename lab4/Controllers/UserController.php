<?php
namespace Controllers;
use Models\UserModel;
/**
 * Керує логікою, пов'язаною з користувачем.
 */
class UserController {
    /**
     * Виводить інформацію про користувача.
     */
    public function showUserInfo() {
        $userModel = new UserModel();
        $userInfo = $userModel->getUserInfo();
        echo $userInfo . "<br>";
    }
    public function displayMessage() {
        echo "<br>UserController_Done✔<br>";
    }
}