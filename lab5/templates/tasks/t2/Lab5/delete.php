<title>TovDeleted</title>
<link rel="stylesheet" href="/templates/styles/style.css">
<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=lab5;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = $_POST['id'];
    $sql = "DELETE FROM tov WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    echo "<h2>Запис успішно видалено!</h2>";
} catch (PDOException $e) {
    echo "Помилка: " . $e->getMessage();
}
?>
<h4><a href="index.php">Повернутися до таблиці</a></h4>