<title>RedSquares</title>
<link rel="stylesheet" href="../../styles/t7_2_style.css">
<?php include 'menu.php'; ?>
<?php
function generateRandomSquares($n) {
    echo "<div class='squareContainer'>";
    for ($i = 0; $i < $n; $i++) {
        $size = mt_rand(20, 100);
        $left = mt_rand(0, 90);
        $top = mt_rand(0, 90);
        echo "<div class='randSizePosition' style='width: {$size}px; height: {$size}px; left: {$left}vw; top: {$top}vh;'></div>";
    }
    echo "</div>";
}
$n = 7;
generateRandomSquares($n);
?>