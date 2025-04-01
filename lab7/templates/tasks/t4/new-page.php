<?php
require_once 'redirect_manager.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>New Page</title>
</head>
<body>
<h1>Ви були перенаправлені</h1>
<p>Параметри: <?php print_r($_GET); ?></p>
<a href="/templates/tasks/t4/">Повернутися</a>
</body>
</html>