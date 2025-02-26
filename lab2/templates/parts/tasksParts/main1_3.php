<form method="post">
    <label>↓Write File Stream↓</label><br>
    <textarea rows="1" cols="50" name="filepath"><?= htmlspecialchars($_POST['filepath'] ?? '') ?></textarea><br>
    <button type="submit">GetFileName</button>
</form>
<?php if (isset($filename)): ?>
    <h4>---------------------FileName---------------------<br>↓↓↓</h4>
    <textarea rows="1" cols="50" readonly><?= htmlspecialchars($filename) ?></textarea>
<?php endif; ?>