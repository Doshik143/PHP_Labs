<title>Task4[MonthSeason]</title>
<link rel="stylesheet" href="../styles/style.css">
<?php include 'menu.php'; ?>
<?php
function getSeason($month) {
    if ($month == 12 || $month == 1 || $month == 2) {
        return "Зима";
    } elseif ($month >= 3 && $month <= 5) {
        return "Весна";
    } elseif ($month >= 6 && $month <= 8) {
        return "Літо";
    } elseif ($month >= 9 && $month <= 11) {
        return "Осінь";
    } else {
        return "Некоректний номер місяця";
    }
}
$month = 4;
echo "$month місяць це " . getSeason($month);
?>