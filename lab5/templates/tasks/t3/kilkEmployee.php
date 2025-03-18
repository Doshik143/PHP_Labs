<title>kilkEmployee+AverageSalary</title>
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

$sql = "SELECT AVG(salary) as avg_salary FROM employees";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo "<h3>Average Salary: " . $row['avg_salary'] . "</h3><br>";

$sql = "SELECT position, COUNT(*) as count FROM employees GROUP BY position";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Position</th><th>Count</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["position"]."</td><td>".$row["count"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
<h4><a href="index.php">Повернутися до таблиці</a></h4>