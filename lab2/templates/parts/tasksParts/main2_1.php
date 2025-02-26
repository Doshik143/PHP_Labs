<form method="post">
    <label>Введіть масив(через кому)</label><br>
    <textarea rows="3" cols="50" name="array_input"><?= htmlspecialchars($_POST['array_input'] ?? '') ?></textarea><br>
    <button type="submit">Find</button>
</form>
<?php if (isset($duplicates)): ?>
    <h4>---------------------Повторювані елементи---------------------</h4>
    <textarea rows="3" cols="50" readonly><?= htmlspecialchars(implode(', ', $duplicates)) ?></textarea>
<?php endif; ?>