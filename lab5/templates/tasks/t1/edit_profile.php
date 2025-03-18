<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $birthdate = $_POST['birthdate'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];

    $conn = new mysqli('localhost', 'root', '', 'lab5');
    if ($conn->connect_error) {
        die("Помилка підключення: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("UPDATE users SET email = ?, fullname = ?, phone = ?, birthdate = ?, address = ?, gender = ? WHERE id = ?");
    $stmt->bind_param("ssssssi", $email, $fullname, $phone, $birthdate, $address, $gender, $_SESSION['user_id']);

    if ($stmt->execute()) {
        echo "<p class='success'>Дані успішно оновлено!</p>";
    } else {
        echo "<p class='error'>Помилка: " . $stmt->error . "</p>";
    }

    $stmt->close();
    $conn->close();
}

$conn = new mysqli('localhost', 'root', '', 'lab5');
if ($conn->connect_error) {
    die("Помилка підключення: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT email, fullname, phone, birthdate, address, gender FROM users WHERE id = ?");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$stmt->bind_result($email, $fullname, $phone, $birthdate, $address, $gender);
$stmt->fetch();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редагування профілю</title>
    <link rel="stylesheet" href="/templates/styles/edit_style.css">
</head>
<body>
<div class="edit-profile-container">
    <h1>Редагування профілю</h1>
    <form action="edit_profile.php" method="post">
        <div class="input-group">
            <input type="email" name="email" value="<?php echo $email; ?>" required>
            <label>Email</label>
        </div>
        <div class="input-group">
            <input type="text" name="fullname" value="<?php echo $fullname; ?>">
            <label>FullName</label>
        </div>
        <div class="input-group">
            <input type="text" name="phone" value="<?php echo $phone; ?>">
            <label>Phone</label>
        </div>
        <div class="input-group">
            <input type="date" name="birthdate" value="<?php echo $birthdate; ?>">
            <label>Birth</label>
        </div>
        <div class="input-group">
            <textarea name="address"><?php echo $address; ?></textarea>
            <label>Address</label>
        </div>
        <div class="input-group">
            <label>↓ You ↓</label>
            <br>
            <select name="gender">
                <option value="male" <?php echo ($gender == 'male') ? 'selected' : ''; ?>>Man</option>
                <option value="female" <?php echo ($gender == 'female') ? 'selected' : ''; ?>>Woman</option>
            </select>
        </div>
        <button type="submit">Update</button>
        <h4><a href="index.php">Continue</a></h4>
    </form>
</div>
</body>
</html>