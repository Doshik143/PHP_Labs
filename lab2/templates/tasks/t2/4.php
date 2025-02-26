<?php
include('../../parts/tasksParts/header2_4.php');
function sortUsers(&$users, $sortBy) {
    if ($sortBy === 'age') {
        asort($users); //Сортування за віком
    } elseif ($sortBy === 'name') {
        ksort($users); //Сортування за іменами
    }
}
$users = [
    "Ivan" => 21,
    "Lilia" => 35,
    "Petro" => 25,
    "Hope" => 42,
    "David" => 12
];
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sort_by'])) {
    $sortBy = $_POST['sort_by'];
    sortUsers($users, $sortBy);
}
include('../../parts/tasksParts/main2_4.php');
include('../../parts/footer.php');