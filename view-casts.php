<h1>Cast for Show ID: <?php echo htmlspecialchars($show_id); ?></h1>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Cast Name</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($casts)) {
                foreach ($casts as $cast) {
                    echo "<tr><td>" . htmlspecialchars($cast['cast_name']) . "</td></tr>";
                }
            } else {
                echo "<tr><td>No cast found for this show.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
