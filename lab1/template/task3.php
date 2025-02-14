<title>Task3[CurrencyConverter]</title>
<link rel="stylesheet" href="../styles/style.css">
<?php include 'menu.php'; ?>
<?php
$dollarPerUah = 0.024;
$uahCount = 11037;
$dollarsCount = $uahCount * $dollarPerUah;
echo "$uahCount грн. можна обміняти на $dollarsCount $";
?>