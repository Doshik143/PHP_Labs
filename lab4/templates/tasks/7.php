<title>Task7[StaticPropertiesAndMethods]</title>
<link rel="stylesheet" href="/templates/styles/style.css">
<?php
include 'templates/parts/menu.php';

use Classes\FileHandler;

require_once 'Classes/FileHandler.php';

echo "Читання файлу file1.txt:";
echo FileHandler::readFile("file1.txt") . "<br><br>";

echo "Запис у файл file1.txt:<br>";
echo FileHandler::writeFile("file1.txt", "Новий рядок для file1.txt\n") . "<br>";

echo "Читання файлу file1.txt після запису:<br>";
echo FileHandler::readFile("file1.txt") . "<br><br>";

echo "Очищення файлу file1.txt:<br>";
echo FileHandler::clearFile("file1.txt") . "<br>";

echo "Читання файлу file1.txt після очищення:<br>";
echo FileHandler::readFile("file1.txt") . "<br><br>";