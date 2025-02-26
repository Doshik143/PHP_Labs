<title>CalculateResults</title>
<link rel="stylesheet" href="/templates/styles/t3_style.css">
<?php
require 'Function/func.php';
$x = $_POST['x'];
$y = $_POST['y'];

if (!is_numeric($x) || ($y && !is_numeric($y))) {
    die("Будь ласка, введіть числові значення.");
}

$sin_x = my_sin($x);
$cos_x = my_cos($x);
$tg_x = my_tg($x);
$pow_xy = $y ? my_pow($x, $y) : "Не вказано y";
$factorial_x = my_factorial($x);

echo "<h2>Результати обчислень:</h2>";
echo "<table>";
echo "<tr><th>x^y</th><th>x!</th><th>my_tg(x)</th><th>sin(x)</th><th>cos(x)</th><th>tg(x)</th></tr>";
echo "<tr>";
echo "<td>" . $pow_xy . "</td>";
echo "<td>" . $factorial_x . "</td>";
echo "<td>" . $tg_x . "</td>";
echo "<td>" . $sin_x . "</td>";
echo "<td>" . $cos_x . "</td>";
echo "<td>" . $tg_x . "</td>";
echo "</tr>";
echo "</table>";
?>

<a href="index.php">Повернутися до форми</a>