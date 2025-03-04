<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task3[WorkWithFiles]</title>
    <link rel="stylesheet" href="/templates/styles/styleTasks.css">
</head>
<body>
<?php include 'templates/parts/menu.php'; ?>
<h3>Оберіть завдання:</h3>
<div class="customCheckBoxHolder">
    <input class="customCheckBoxInput" id="cCB1" type="checkbox">
    <label class="customCheckBoxWrapper" for="cCB1" onclick="window.open('/templates/tasks/t3/1.php', '_blank');">
        <div class="customCheckBox">
            <div class="inner">1</div>
        </div>
    </label>
    <input class="customCheckBoxInput" id="cCB2" type="checkbox">
    <label class="customCheckBoxWrapper" for="cCB2" onclick="window.open('/templates/tasks/t3/2.php', '_blank');">
        <div class="customCheckBox">
            <div class="inner">2</div>
        </div>
    </label>
    <input class="customCheckBoxInput" id="cCB3" type="checkbox">
    <label class="customCheckBoxWrapper" for="cCB3" onclick="window.open('/templates/tasks/t3/3.php', '_blank');">
        <div class="customCheckBox">
            <div class="inner">3</div>
        </div>
    </label>
</div>
</body>
</html>