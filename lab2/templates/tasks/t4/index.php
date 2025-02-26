<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CalculateForm</title>
    <link rel="stylesheet" href="/templates/styles/t3_style.css">
</head>
<body>
    <h1>Калькулятор функцій</h1>
    <form action="calculate.php" method="post">
        <label for="x">x</label>
        <input type="text" name="x" id="x" required>
        <br><br>
        <label for="y">y</label>
        <input type="text" name="y" id="y">
        <br><br>
        <input type="submit" value="=">
    </form>
</body>
</html>