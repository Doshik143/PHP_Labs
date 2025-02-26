<form method="post">
    <label>First Date(dd-mm-yyyy)</label><br>
    <input type="text" name="date1" value="<?= htmlspecialchars($_POST['date1'] ?? '') ?>"><br><br>
    <label>Second Date(dd-mm-yyyy)</label><br>
    <input type="text" name="date2" value="<?= htmlspecialchars($_POST['date2'] ?? '') ?>"><br><br>
    <button type="submit">GetDays</button>
</form>
<?php if (isset($daysDifference)): ?>
    <h3>---------------------Days---------------------</h3>
    <textarea rows="1" cols="50" readonly><?= htmlspecialchars($daysDifference) ?></textarea>
<?php endif; ?>