<div class="icon-container">
    <a href="index.php?lang=ukr">
        <img src="/templates/tasks/t3/icons/ukr.png" alt="UA" class="icon">
    </a>
    <a href="index.php?lang=eng">
        <img src="/templates/tasks/t3/icons/eng.png" alt="EN" class="icon">
    </a>
</div>
<h5><?= $langText[$language] ?? 'Вибрана мова: Українська.' ?></h5>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<form action="/templates/tasks/t3/display.php" method="post" enctype="multipart/form-data">
    <!-- Логін -->
    <label>Логін: <input type="text" name="login" value="<?= htmlspecialchars($_SESSION['login'] ?? '') ?>" required></label><br><br>
    <!-- Пароль -->
    <label>Пароль:
        <div class="password1">
            <input type="password" name="password" id="password" required>
            <span class="password-toggle" onclick="togglePasswordVisibility('password')">
                <i class="fas fa-eye-slash"></i>
            </span>
        </div>
    </label><br><br>
    <!-- Підтвердження пароля -->
    <label>Пароль (ще раз):
        <div class="password1">
            <input type="password" name="password_confirm" id="password_confirm" required>
            <span class="password-toggle" onclick="togglePasswordVisibility('password_confirm')">
                <i class="fas fa-eye-slash"></i> <!-- Початкова іконка (перекреслене око) -->
            </span>
        </div>
    </label><br><br>

    <script>
        function togglePasswordVisibility(inputId) {
            const input = document.getElementById(inputId);
            const icon = input.nextElementSibling.querySelector('i');

            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            } else {
                input.type = "password";
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            }
        }
    </script>

    <!-- Стать -->
    <fieldset>
        <legend>Стать:</legend>
        <label><input type="radio" name="gender" value="male" <?= isset($_SESSION['gender']) && $_SESSION['gender'] === 'male' ? 'checked' : '' ?> required> Чоловіча</label>
        <label><input type="radio" name="gender" value="female" <?= isset($_SESSION['gender']) && $_SESSION['gender'] === 'female' ? 'checked' : '' ?> required> Жіноча</label>
    </fieldset><br>
    <!-- Місто -->
    <label>Місто:
        <select name="city" required>
            <option value="zhytomyr" <?= isset($_SESSION['city']) && $_SESSION['city'] === 'zhytomyr' ? 'selected' : '' ?>>Житомир</option>
            <option value="kyiv" <?= isset($_SESSION['city']) && $_SESSION['city'] === 'kyiv' ? 'selected' : '' ?>>Київ</option>
            <option value="lviv" <?= isset($_SESSION['city']) && $_SESSION['city'] === 'lviv' ? 'selected' : '' ?>>Львів</option>
            <option value="odessa" <?= isset($_SESSION['city']) && $_SESSION['city'] === 'odessa' ? 'selected' : '' ?>>Одеса</option>
            <option value="kharkiv" <?= isset($_SESSION['city']) && $_SESSION['city'] === 'kharkiv' ? 'selected' : '' ?>>Харків</option>
            <option value="dnipro" <?= isset($_SESSION['city']) && $_SESSION['city'] === 'dnipro' ? 'selected' : '' ?>>Дніпро</option>
        </select>
    </label><br><br>
    <!-- Улюблені ігри -->
    <fieldset>
        <legend>Улюблені ігри:</legend>
        <label><input type="checkbox" name="games[]" value="football" <?= isset($_SESSION['games']) && in_array('football', $_SESSION['games']) ? 'checked' : '' ?>> Футбол</label>
        <label><input type="checkbox" name="games[]" value="basketball" <?= isset($_SESSION['games']) && in_array('basketball', $_SESSION['games']) ? 'checked' : '' ?>> Баскетбол</label>
        <label><input type="checkbox" name="games[]" value="volleyball" <?= isset($_SESSION['games']) && in_array('volleyball', $_SESSION['games']) ? 'checked' : '' ?>> Волейбол</label>
        <label><input type="checkbox" name="games[]" value="chess" <?= isset($_SESSION['games']) && in_array('chess', $_SESSION['games']) ? 'checked' : '' ?>> Шахи</label>
        <label><input type="checkbox" name="games[]" value="wot" <?= isset($_SESSION['games']) && in_array('wot', $_SESSION['games']) ? 'checked' : '' ?>> World of Tanks</label>
    </fieldset><br>
    <!-- Про себе -->
    <label>Про себе:<br>
        <textarea name="about" rows="4" cols="30"><?= htmlspecialchars($_SESSION['about'] ?? '') ?></textarea>
    </label><br><br>
    <!-- Фотографія -->
    <label>Фотографія: <input type="file" name="photo" accept="image/*" required></label><br>
    <br><br><br>
    <button type="submit">Надіслати</button>
</form>