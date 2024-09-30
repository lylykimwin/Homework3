<?php if (!empty($directors)): ?>
    <h2>Directors List</h2>
    <ul>
        <?php foreach ($directors as $director): ?>
            <li>ID: <?= htmlspecialchars($director['director_id']) ?> - Name: <?= htmlspecialchars($director['director_name']) ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No directors found.</p>
<?php endif; ?>
