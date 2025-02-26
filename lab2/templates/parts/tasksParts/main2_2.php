<form method="post">
    <label>Введіть склади або символи(через кому)</label><br>
    <textarea rows="3" cols="30" name="syllables"><?= htmlspecialchars($_POST['syllables'] ?? '') ?></textarea><br>
    <label>LengthNameArray</label><br>
    <input type="number" name="name_length" min="2" max="5" value="3"><br><br>
    <button type="submit">Generate</button>
</form>
<?php if (isset($generatedName)): ?>
    <h4>---------------------Generated Name---------------------</h4>
    <textarea rows="1" cols="30" readonly><?= htmlspecialchars($generatedName) ?></textarea>
<?php endif; ?>