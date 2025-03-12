<title>Task5[ClassCreate.GET/SET]</title>
<link rel="stylesheet" href="/templates/styles/style.css">
<?php

include 'templates/parts/menu.php';

require_once 't5/Circle.php';

$circle = new Circle(3, 4, 5);
// __toString()
echo $circle . "<br><br>";
//GET
echo "Координата X: " . $circle->getX() . "<br>";
echo "Координата Y: " . $circle->getY() . "<br>";
echo "Радіус: " . $circle->getRadius() . "<br>";
//SET
$circle->setX(10);
$circle->setY(20);
$circle->setRadius(15);

echo "<br>" . $circle;