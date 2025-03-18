<?php
 $message = "";
 $error = "";

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     try {
         if (isset($_POST['name']) && isset($_POST['cost']) && isset($_POST['kol']) && isset($_POST['date'])) {
             $pdo = new PDO('mysql:host=localhost;dbname=lab5;charset=utf8', 'root', '');
             $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

             $name = $_POST['name'];
             $cost = $_POST['cost'];
             $kol = $_POST['kol'];
             $date = $_POST['date'];

             $sql = "INSERT INTO tov (name, cost, kol, date) VALUES (:name, :cost, :kol, :date)";
             $stmt = $pdo->prepare($sql);

             $stmt->bindParam(':name', $name);
             $stmt->bindParam(':cost', $cost);
             $stmt->bindParam(':kol', $kol);
             $stmt->bindParam(':date', $date);

             $stmt->execute();
             $message = "Запис успішно додано!";
         } else {
             $error = "Будь ласка, заповніть всі поля форми.";
         }
     } catch (PDOException $e) {
         $error = "Помилка: " . $e->getMessage();
     }
 }
 ?>

 <!DOCTYPE html>
 <html lang="uk">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>AddNewTov</title>
     <link rel="stylesheet" href="/templates/styles/insert_style.css">
 </head>
 <body>
 <form action="insert.php" method="post">
     <h2>Додати новий товар</h2>
     <label for="name">Назва товару:</label>
     <input type="text" id="name" name="name" required>

     <label for="cost">Вартість:</label>
     <input type="number" id="cost" name="cost" required>

     <label for="kol">Кількість:</label>
     <input type="number" id="kol" name="kol" required>

     <label for="date">Дата постачання:</label>
     <input type="date" id="date" name="date" required>

     <button type="submit">Додати</button>

     <h4><a href="index.php">Повернутися до таблиці</a></h4>

     <?php
     if (!empty($message)) {
         echo "<p class='message'>$message</p>";
     }
     if (!empty($error)) {
         echo "<p class='error'>$error</p>";
     }
     ?>
 </form>
 </body>
 </html>