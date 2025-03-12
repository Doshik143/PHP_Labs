<?php
namespace Views;
/**
 * Відповідає за відображення інформації про користувача.
 */
class UserView {
    /**
     * Виводить інформацію про користувача у вигляді HTML.
     *
     * @param string $userInfo Інформація про користувача.
     */
    public function renderUserInfo($userInfo) {
        echo "<h5>$userInfo</h5>";
    }
    public function displayMessage() {
        echo "UserView_Done✔<br>";
    }
}