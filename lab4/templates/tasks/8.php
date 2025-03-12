<title>Task8[Imitation]</title>
<link rel="stylesheet" href="/templates/styles/style.css">
<?php
include 'templates/parts/menu.php';

use t8\Programmer;
use t8\Student;

require_once 't8/Student.php';
require_once 't8/Programmer.php';

$student = new Student(180, 70, 20, "Київський університет", 2);

echo "<b>Студент:</b>";
echo "Зріст: " . $student->getHeight() . " см<br>";
echo "Маса: " . $student->getWeight() . " кг<br>";
echo "Вік: " . $student->getAge() . " років<br>";
echo "ВНЗ: " . $student->getUniversity() . "<br>";
echo "Курс: " . $student->getCourse() . "<br>";

$student->promoteToNextCourse();
echo "Після переходу на новий курс: " . $student->getCourse() . "<br><br>";

$programmer = new Programmer(175, 65, 25, ["PHP", "JavaScript"], 3);

echo "<b>Програміст:</b>";
echo "Зріст: " . $programmer->getHeight() . " см<br>";
echo "Маса: " . $programmer->getWeight() . " кг<br>";
echo "Вік: " . $programmer->getAge() . " років<br>";
echo "Мови програмування: " . implode(", ", $programmer->getLanguages()) . "<br>";
echo "Досвід роботи: " . $programmer->getExperience() . " роки<br>";

$programmer->addLanguage("Python");
echo "Після додавання нової мови: " . implode(", ", $programmer->getLanguages()) . "<br>";