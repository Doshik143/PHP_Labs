<?php
include('../../parts/tasksParts/header1_4.php');
if (isset($_POST['date1']) && isset($_POST['date2'])) {
    $date1 = DateTime::createFromFormat('d-m-Y', $_POST['date1']);
    $date2 = DateTime::createFromFormat('d-m-Y', $_POST['date2']);
    if ($date1 && $date2) {
        $interval = $date1->diff($date2);
        $daysDifference = $interval->days;
    } else {
        $daysDifference = "Невірний формат дати";
    }
}
include('../../parts/tasksParts/main1_4.php');
include('../../parts/footer.php');