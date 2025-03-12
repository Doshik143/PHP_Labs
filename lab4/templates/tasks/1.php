<title>Task1[ClassOrganization]</title>
<link rel="stylesheet" href="/templates/styles/style.css">
<?php
include 'templates/parts/menu.php';

require_once 't1/Models/UserModel.php';
require_once 't1/Controllers/UserController.php';
require_once 't1/Views/UserView.php';

$userController = new UserController();
$userController->showUserInfo();

$userView = new UserView();
$userView->renderUserInfo("↑Information about user↑");