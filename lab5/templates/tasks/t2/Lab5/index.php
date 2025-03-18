<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tovTable</title>
    <link rel="stylesheet" href="/templates/styles/table_style.css">
</head>
<body>
<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=lab5;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<p class='message'>Підключення до бази даних успішне!</p>";
} catch (PDOException $e) {
    echo "<p class='message error'>Помилка підключення: " . $e->getMessage() . "</p>";
}
?>

<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=lab5;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM tov";
    $result = $pdo->query($sql);

    echo '<div class="table-container">';
    echo "<table>";
    echo "<tr><th>ID</th><th>Назва</th><th>Вартість</th><th>Кількість</th><th>Дата</th></tr>";
    foreach ($result as $row) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['cost'] . "</td>";
        echo "<td>" . $row['kol'] . "</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo '</div>';
} catch (PDOException $e) {
    echo "<p class='message error'>Помилка: " . $e->getMessage() . "</p>";
}
?>

<form action="insert.php" method="post">
    <button type="submit">Додати запис</button>
</form>

<form action="delete.php" method="post">
    <input type="number" name="id" placeholder="Введіть ID запису" required>
    <button type="submit">Вилучити запис</button>
</form>
</body>
</html>