<title>EditInformationAboutEmployee</title>
<link rel="stylesheet" href="/templates/styles/edit_info_style.css">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "company_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];

$sql = "SELECT id, name, position, salary FROM employees WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $position = $row['position'];
    $salary = $row['salary'];
} else {
    echo "Employee not found";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
</head>
<body>
<form action="update_employee.php" method="post">
    <h2>Edit Employee</h2>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    Name: <input type="text" name="name" value="<?php echo $name; ?>"><br>
    Position: <input type="text" name="position" value="<?php echo $position; ?>"><br>
    Salary: <input type="text" name="salary" value="<?php echo $salary; ?>"><br>
    <input type="submit" value="Update Employee">
    <h4><a href="index.php">Повернутися до таблиці</a></h4>
</form>
</body>
</html>