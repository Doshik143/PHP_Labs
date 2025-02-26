<?php
include('../../parts/tasksParts/header1_2.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cities = explode(' ', $_POST['cities']);
    sort($cities);
    $sortedCities = implode(' ', $cities);
}
include('../../parts/tasksParts/main1_2.php');
include('../../parts/footer.php');