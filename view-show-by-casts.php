<h1>Cast for <?php echo htmlspecialchars($show['title']); ?></h1> <!-- You can comment this out if not fetching show details -->
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Cast Name</th>
      </tr>
    </thead>
    <tbody>
<?php
foreach ($casts as $index => $cast) {
?>
  <tr>
    <td><?php echo htmlspecialchars($index + 1); ?></td>
    <td><?php echo htmlspecialchars($cast['cast_name']); ?></td>
  </tr>
<?php 
}
?>
    </tbody>
  </table>
</div>
