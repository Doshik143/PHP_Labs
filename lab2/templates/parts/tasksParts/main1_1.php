<form method="post">
    <label>↓Write the text↓</label><br>
    <textarea name="text" rows="4" cols="50"><?= htmlspecialchars($text ?? '') ?></textarea><br><br>

    <label>►Find◄</label><br>
    <input type="text" name="find" value="<?= htmlspecialchars($find ?? '') ?>"><br><br>

    <label>¦Replace¦</label><br>
    <input type="text" name="replace" value="<?= htmlspecialchars($replace ?? '') ?>"><br><br>

    <button type="submit">Go!</button>
</form>
<?php if (isset($result)): ?>
    <h4>›----------------------------Results----------------------------‹</h4>
    <textarea rows="4" cols="50" readonly><?= htmlspecialchars($result) ?></textarea>
<?php endif; ?>