<title>Task4[AutoConnectClassesWithNamespaces]</title>
<link rel="stylesheet" href="/templates/styles/style.css">
<?php
include 'templates/parts/menu.php';

require_once 'autoload.php';

use Controllers\UserController;
use Models\UserModel;
use Views\UserView;

$userController = new UserController();
$userController->showUserInfo();
$userController->displayMessage();

$userModel = new UserModel();
$userModel->displayMessage();

$userView = new UserView();
$userView->renderUserInfo("★USER INFORMATION★");
$userView->displayMessage();