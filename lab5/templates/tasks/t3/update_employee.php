<title>EmployeeUpdate!</title>
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
$name = $_POST['name'];
$position = $_POST['position'];
$salary = $_POST['salary'];

$sql = "UPDATE employees SET name='$name', position='$position', salary='$salary' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "<h3>Employee updated successfully</h3>";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();

header("Location: index.php");
?>
<h4><a href="index.php">Повернутися до таблиці</a></h4>