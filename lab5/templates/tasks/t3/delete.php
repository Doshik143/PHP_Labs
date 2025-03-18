<title>EmployeeDelete!</title>
<link rel="stylesheet" href="/templates/styles/style.css">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "company_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];

$sql = "DELETE FROM employees WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "<h3>Employee deleted successfully</h3>";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
<h4><a href="index.php">Повернутися до таблиці</a></h4>