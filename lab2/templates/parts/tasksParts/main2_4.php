<form method="post">
    <label>↓Sort by↓</label><br>
    <select name="sort_by">
        <option value="age">Age</option>
        <option value="name">Name</option>
    </select>
    <button type="submit">Sort</button>
</form>
<h3>---------------------Users Sort List---------------------</h3>
<ul>
    <?php foreach ($users as $name => $age): ?>
        <li><?= htmlspecialchars($name) ?> - <?= $age ?> y.o.</li>
    <?php endforeach; ?>
</ul>