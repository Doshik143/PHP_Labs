<title>Task6[AccessModifiers]</title>
<link rel="stylesheet" href="/templates/styles/style.css">
<?php
use Classes\Circle;

include 'templates/parts/menu.php';

require_once 'Classes\Circle.php';

$circle1 = new Circle(0, 0, 5);
$circle2 = new Circle(4, 0, 3);

echo "○1: $circle1<br><br>";
echo "○2: $circle2<br><br>";

if ($circle1->intersects($circle2)) {
    echo "Кола перетинаються.<br><br>";
} else {
    echo "Кола не перетинаються.<br><br>";
}

$circle2->setX(10);
$circle2->setY(0);

echo "○2 (після зміни): $circle2<br><br>";

if ($circle1->intersects($circle2)) {
    echo "Кола перетинаються.<br>";
} else {
    echo "Кола не перетинаються.<br>";
}