<form method="post">
    <label>Введіть назви міст(через пробіл)</label><br>
    <textarea rows="5" cols="50" name="cities"><?= htmlspecialchars($_POST['cities'] ?? '') ?></textarea><br>
    <button type="submit">Sort</button>
</form>
<?php if (isset($sortedCities)): ?>
    <h4>---------------------Відсортовані міста---------------------</h4>
    <textarea rows="2" cols="50" readonly><?= htmlspecialchars($sortedCities) ?></textarea>
<?php endif; ?>