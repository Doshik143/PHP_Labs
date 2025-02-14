<title>1[Table]</title>
<link rel="stylesheet" href="../../styles/t7_style.css">
<link rel="stylesheet" href="../../styles/t7_1_style.css">
<?php include 'menu.php'; ?>
<?php
function generateColorfulTable($rows, $cols) {
    echo "<table>";
    for ($i = 0; $i < $rows; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $cols; $j++) {
            $color = sprintf("#%06X", mt_rand(0, 0xFFFFFF));
            echo "<td style='background-color: $color;'></td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
$rows = 3;
$cols = 7;
generateColorfulTable($rows, $cols);
?>