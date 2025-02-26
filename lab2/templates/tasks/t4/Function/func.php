<?php
//sin x
function my_sin($x) {
    return sin($x);
}
//cos x
function my_cos($x) {
    return cos($x);
}
//tg x
function my_tg($x) {
    return tan($x);
}
//x^y
function my_pow($x, $y) {
    return pow($x, $y);
}
//x!
function my_factorial($x) {
    if ($x <= 1) {
        return 1;
    } else {
        return $x * my_factorial($x - 1);
    }
}