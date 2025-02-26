<?php
include('../../parts/tasksParts/header2_2.php');
function generatePetName($syllables, $length = 3) {
    $name = '';
    $syllableCount = count($syllables);
    for ($i = 0; $i < $length; $i++) {
        $name .= $syllables[rand(0, $syllableCount - 1)];
    }
    return ucfirst($name);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['syllables'])) {
        $inputSyllables = explode(',', str_replace(' ', '', $_POST['syllables']));
        $nameLength = isset($_POST['name_length']) ? (int)$_POST['name_length'] : 3;

        if (!empty($inputSyllables)) {
            $generatedName = generatePetName($inputSyllables, $nameLength);
        }
    }
}
include('../../parts/tasksParts/main2_2.php');
include('../../parts/footer.php');