<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task3[WorkWithForm]</title>
    <link rel="stylesheet" href="/templates/styles/styleTasks.css">
</head>
<body>
<?php include 'templates/parts/menu.php'; ?>
<?php
?>
<div class="customCheckBoxHolder">
    <input class="customCheckBoxInput" id="cCB1" type="checkbox" >
    <label class="customCheckBoxWrapper" for="cCB1" onclick="window.open('/templates/tasks/t3/index.php', '_blank');">
        <div class="customCheckBox">
            <div class="inner">Open Form</div>
        </div>
    </label>
</div>
</body>
</html>