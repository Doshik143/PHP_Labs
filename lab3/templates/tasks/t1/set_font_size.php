<?php
if (isset($_GET['size'])) {
    $size = $_GET['size'];

    switch ($size) {
        case 'large':
            $fontSize = '24px';
            break;
        case 'medium':
            $fontSize = '16px';
            break;
        case 'small':
            $fontSize = '12px';
            break;
        default:
            $fontSize = '16px';
    }

    setcookie('font_size', $fontSize, time() + (86400 * 30), "/");

    header('Location: http://lab3.local/templates/tasks/t1/1.php');
    exit();
}