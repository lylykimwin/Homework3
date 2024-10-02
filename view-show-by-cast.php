<h1>Show Cast</h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>Show Name</th>
        <th>Cast Name</th>
      </tr>
    </thead>
    <tbody>
<?php
foreach ($casts as $index => $cast) {
?>
  <tr>
    <td><?php echo htmlspecialchars($show['title']); ?></td>
    <td><?php echo htmlspecialchars($cast['cast_name']); ?></td>
  </tr>
<?php 
}
?>
    </tbody>
  </table>
</div>
