<?php

$file_path = "comments.txt";

if (!file_exists($file_path)) {
    $file = fopen($file_path, "w");
    fclose($file);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $comment = $_POST['comment'];

    $file = fopen($file_path, "a");

    fwrite($file, $name . "|" . $comment . "\n");

    fclose($file);

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>
<?php
    include('../../parts/tasksParts/header3_1.php');
    include('../../parts/tasksParts/main3_1.php');
    include('../../parts/footer.php');
    ?>