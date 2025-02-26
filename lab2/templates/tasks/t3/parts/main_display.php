<h1>Дані форми</h1>
<table>
    <tr>
        <td><strong>Логін</strong></td>
        <td><?= $_SESSION['login'] ?? 'Немає даних' ?></td>
    </tr>
    <tr>
        <td><strong>Пароль</strong></td>
        <td><?= isset($_SESSION['passwords_match']) ? ($_SESSION['passwords_match'] ? 'Співпадає' : 'Не співпадає') : 'Немає даних' ?></td>
    </tr>
    <tr>
        <td><strong>Стать</strong></td>
        <td><?= $_SESSION['gender'] ?? 'Немає даних' ?></td>
    </tr>
    <tr>
        <td><strong>Місто</strong></td>
        <td><?= $_SESSION['city'] ?? 'Немає даних' ?></td>
    </tr>
    <tr>
        <td><strong>Улюблені ігри</strong></td>
        <td>
            <?php if (isset($_SESSION['games']) && is_array($_SESSION['games'])): ?>
                <ul>
                    <?php foreach ($_SESSION['games'] as $game): ?>
                        <li><?= htmlspecialchars($game) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                Немає даних
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <td><strong>Про себе</strong></td>
        <td><?= $_SESSION['about'] ?? 'Немає даних' ?></td>
    </tr>
    <tr>
        <td><strong>Фотографія</strong></td>
        <td>
            <?php if (isset($_SESSION['photo_path']) && $_SESSION['photo_path'] !== 'Файл не був завантажений.'): ?>
                <img src="<?= $_SESSION['photo_path'] ?>" alt="Завантажена фотографія" class="loadImg">
            <?php else: ?>
                <?= $_SESSION['photo_path'] ?? 'Немає даних' ?>
            <?php endif; ?>
        </td>
    </tr>
</table>
<a href="index.php" class="back-button">Повернутися до форми</a>