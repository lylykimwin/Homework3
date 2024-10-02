<h1>Shows</h1>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Release Year</th>
                <th>Cast</th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($shows as $show) {
            ?>
            <tr>
                <td><?php echo htmlspecialchars($show['show_id']); ?></td>
                <td><?php echo htmlspecialchars($show['title']); ?></td>
                <td><?php echo htmlspecialchars($show['release_year']); ?></td>
                <td>
                    <form method="POST" action="shows-by-cast.php"> <!-- Form for the Cast button -->
                        <input type="hidden" name="show_id" value="<?php echo htmlspecialchars($show['show_id']); ?>">
                        <button type="submit">Cast</button>
                    </form>
                </td>
            </tr>
            <?php 
            }
            ?>
        </tbody>
    </table>
</div>
