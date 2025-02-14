<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task7[WorkWithCycle]</title>
    <link rel="stylesheet" href="../styles/t7_style.css">
</head>
<body>
    <?php include 'menu.php'; ?>
    <h3>Оберіть завдання:</h3>
    <div class="customCheckBoxHolder">
        <input class="customCheckBoxInput" id="cCB1" type="checkbox">
        <label class="customCheckBoxWrapper" for="cCB1" onclick="window.location.href='task7/task1.php'">
            <div class="customCheckBox">
                <div class="inner">Task1</div>
            </div>
        </label>
        <input class="customCheckBoxInput" id="cCB2" type="checkbox">
        <label class="customCheckBoxWrapper" for="cCB2" onclick="window.location.href='task7/task2.php'">
            <div class="customCheckBox">
                <div class="inner">Task2</div>
            </div>
        </label>
    </div>
</body>
</html>