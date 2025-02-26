<h2>PasswordGenerator</h2>
<form method="POST">
    <label for="password_length">Length►</label>
    <input type="number" id="password_length" name="password_length" min="4" max="50" value="<?= htmlspecialchars($_POST['password_length'] ?? '') ?>">
    <button type="submit">Generate</button>
</form>
<?php if (!empty($generatedPassword)): ?>
    <p><strong>Generated Password →</strong> <?= htmlspecialchars($generatedPassword) ?></p>
<?php endif; ?>
<hr>
<h2>PasswordCheck</h2>
<form method="POST">
    <label for="user_password">Write Password►</label>
    <input type="text" id="user_password" name="user_password" value="<?= htmlspecialchars($userPassword) ?>">
    <button type="submit">Check</button>
</form>
<?php if ($userPassword !== ""): ?>
    <p><strong>Result:</strong> <?= $isStrong ?></p>
<?php endif; ?>