<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome!</title>
    <link rel="stylesheet" href="/templates/styles/t2_welcome_style.css">
</head>
<body>
<div class="card">
    <div class="card-border-top">
    </div>
    <div class="img">
    </div>
    <span>Welcome!</span>
    <div class="greeting">
        <?php echo "Добрий день, $username!"; ?>
    </div>
    <button onclick="window.location.href='logout.php'" class="logout-button">
        Exit
    </button>
</div>
</body>
</html>