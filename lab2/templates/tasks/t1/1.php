<?php
include('../../parts/tasksParts/header1_1.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text = $_POST['text'] ?? '';
    $find = $_POST['find'] ?? '';
    $replace = $_POST['replace'] ?? '';
    $result = str_replace($find, $replace, $text);
}
include('../../parts/tasksParts/main1_1.php');
include('../../parts/footer.php');