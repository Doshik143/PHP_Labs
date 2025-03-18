<title>NewEmployeeAdded!</title>
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

$name = $_POST['name'];
$position = $_POST['position'];
$salary = $_POST['salary'];

$sql = "INSERT INTO employees (name, position, salary) VALUES ('$name', '$position', '$salary')";

if ($conn->query($sql) === TRUE) {
    echo "<h3>New employee added successfully</h3>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<h4><a href="index.php">Повернутися до таблиці</a></h4>