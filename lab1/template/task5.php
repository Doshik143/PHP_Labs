<title>Task5[Letters]</title>
<link rel="stylesheet" href="../styles/style.css">
<?php include 'menu.php'; ?>
<?php
function checkVowelOrConsonant($char) {
    $char = strtolower($char);
    switch ($char) {
        case 'a':
        case 'e':
        case 'i':
        case 'o':
        case 'u':
        case 'а':
        case 'е':
        case 'є':
        case 'и':
        case 'і':
        case 'ї':
        case 'о':
        case 'у':
        case 'ю':
        case 'я':
            return "Голосна";
        default:
            return "Приголосна";
    }
}
$char = "а";
echo "Буква $char - " . checkVowelOrConsonant($char);
?>