<title>company_dbTable</title>
<link rel="stylesheet" href="/templates/styles/table_style.css">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "company_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, position, salary FROM employees";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Name</th><th>Position</th><th>Salary</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["position"]."</td><td>".$row["salary"]."</td><td><a href='edit_form.php?id=".$row["id"]."'>Edit</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>

<form action="insert.php" method="post">
    <button type="submit">Додати запис</button>
</form>

<form action="delete.php" method="post">
    <input type="number" name="id" placeholder="Введіть ID запису" required>
    <button type="submit">Вилучити запис</button>
</form>

<form action="kilkEmployee.php" method="post">
    <button type="submit">Переглянути кількість працівників на посадах</button>
</form>