<h1>Cast for Show></h1>
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
    <td><?php echo htmlspecialchars($cast['show_id']; ?></td>
    <td><?php echo htmlspecialchars($cast['cast_name']); ?></td>
  </tr>
<?php 
}
?>
    </tbody>
  </table>
</div>
