<title>Task3[Namespaces]</title>
<link rel="stylesheet" href="/templates/styles/style.css">
<?php
include 'templates/parts/menu.php';

use Controllers\UserController;
use Views\UserView;

require_once 'autoload.php';

$userController = new UserController();
$userController->showUserInfo();

$userView = new UserView();
$userView->renderUserInfo("↑USER SAY↑");