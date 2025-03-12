<?php
class UserController
{
    public function showUserInfo() {
        $userModel = new UserModel();
        $userInfo = $userModel->getUserInfo();
        echo $userInfo;
    }
}