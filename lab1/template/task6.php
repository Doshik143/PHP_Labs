<title>Task6[RandNum]</title>
<link rel="stylesheet" href="../styles/style.css">
<?php include 'menu.php'; ?>
<?php
function getRandomThreeDigitNumber() {
    return mt_rand(100, 999);
}
function sumOfDigits($number) {
    $sum = 0;
    while ($number > 0) {
        $sum += $number % 10;
        $number = (int)($number / 10);
    }
    return $sum;
}
function reverseNumber($number) {
    return (int)strrev((string)$number);
}
function getMaxPossibleNumber($number) {
    $digits = str_split((string)$number);
    rsort($digits);
    return (int)implode('', $digits);
}
$randomNumber = getRandomThreeDigitNumber();
echo "Випадкове число: $randomNumber<br>";
echo "-------------------------------------------------<br>";
echo "Сума цифр: " . sumOfDigits($randomNumber) . "<br>";
echo "Число у зворотному порядку: " . reverseNumber($randomNumber) . "<br>";
echo "Максимальне можливе число: " . getMaxPossibleNumber($randomNumber);
?>