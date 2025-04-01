<title>Stats</title>
<link rel="stylesheet" href="/templates/styles/style.css">
<?php

require __DIR__ . '/traffic_logger.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require 'db_connect.php';

global $pdo;

$stmt = $pdo->prepare("SELECT COUNT(*) AS count_404 FROM traffic WHERE status = 404 AND time >= NOW() - INTERVAL 1 DAY");
$stmt->execute();
$count_404 = $stmt->fetchColumn();

$stmt = $pdo->prepare("SELECT COUNT(*) AS total_requests FROM traffic WHERE time >= NOW() - INTERVAL 1 DAY");
$stmt->execute();
$total_requests = $stmt->fetchColumn();

$percentage = ($total_requests > 0) ? ($count_404 / $total_requests) * 100 : 0;

echo "Кількість 404 за добу: $count_404<br>";
echo "Відсоток 404: " . round($percentage, 2) . "%<br>";

if ($percentage > 10) {
    $admin_email = "ipz232_ddo@student.ztu.edu.ua";

    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'tomridzevel@gmail.com';
        $mail->Password = 'rcgb xqsd dtgn gpdh';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('tomridzevel@gmail.com', 'Monitoring System');
        $mail->addAddress($admin_email);

        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';

        $mail->Subject = 'Попередження: високий рівень 404';
        $mail->Body = "Відсоток 404 помилок за останню добу: " . round($percentage, 2) . "%";

        $mail->send();
        echo "Повідомлення адміністратору надіслано.";
    } catch (Exception $e) {
        echo "Помилка відправки листа: {$mail->ErrorInfo}";
    }
}