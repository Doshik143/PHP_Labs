<title>Task9[AbstractClasses]</title>
<link rel="stylesheet" href="/templates/styles/style.css">
<?php
include 'templates/parts/menu.php';

use Classes\Programmer;
use Classes\Student;

require_once 'Classes/Student.php';
require_once 'Classes/Programmer.php';

$student = new Student(180, 70, 20, "Київський університет", 2);

echo "<b>Студент:</b>";
$student->giveBirth();

$programmer = new Programmer(175, 65, 25, ["PHP", "JavaScript"], 3);

echo "<br><b>Програміст:</b>";
$programmer->giveBirth();