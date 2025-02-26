<?php
include('../../parts/tasksParts/header1_3.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filepath = $_POST['filepath'];
    $filename = pathinfo($filepath, PATHINFO_FILENAME);
}
include('../../parts/tasksParts/main1_3.php');
include('../../parts/footer.php');