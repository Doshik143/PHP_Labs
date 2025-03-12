<title>Task10[Interfaces]</title>
<link rel="stylesheet" href="/templates/styles/style.css">
<?php

use Classes\Programmer;
use Classes\Student;

include 'templates/parts/menu.php';

require_once 'Classes/Student.php';
require_once 'Classes/Programmer.php';

$student = new Student(180, 70, 20, "Київський університет", 2);

echo "<b>Студент:</b>";
echo $student->cleanRoom() . "<br>";
echo $student->cleanKitchen() . "<br>";

$programmer = new Programmer(175, 65, 25, ["PHP", "JavaScript"], 3);

echo "<br><b>Програміст:</b>";
echo $programmer->cleanRoom() . "<br>";
echo $programmer->cleanKitchen() . "<br>";