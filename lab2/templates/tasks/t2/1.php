<?php
include('../../parts/tasksParts/header2_1.php');
function findDuplicates($array) {
    $counts = array_count_values($array);
    $duplicates = array_keys(array_filter($counts, function($count) {
        return $count > 1;
    }));
    return $duplicates;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['array_input'])) {
        $inputArray = explode(',', str_replace(' ', '', $_POST['array_input']));
        $duplicates = findDuplicates($inputArray);
    }
}
include('../../parts/tasksParts/main2_1.php');
include('../../parts/footer.php');