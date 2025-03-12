<title>Task2[ClassAutoConnect]</title>
<link rel="stylesheet" href="/templates/styles/style.css">
<?php
include 'templates/parts/menu.php';

require_once 't2/autoload2.php';

$userController = new UserController();
$userController->showUserInfo();

$userView = new UserView();
$userView->renderUserInfo("↑USER MASSAGE↑");