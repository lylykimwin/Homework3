<h1>Cast for <?php echo htmlspecialchars($show['title']); ?></h1>
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
// Loop through the casts for the specific show
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
