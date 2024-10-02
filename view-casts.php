<h1>Cast for Show ID: <?php echo htmlspecialchars($show_id); ?></h1>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Cast Name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($casts as $cast): ?>
            <tr>
                <td><?php echo htmlspecialchars($cast['cast_name']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
