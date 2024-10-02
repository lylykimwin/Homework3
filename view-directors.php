<h1>Directors</h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th> 
          <th></th>
      </tr>
    </thead>
    <tbody>
<?php
// Loop through the directors array
foreach ($directors as $director) {
?>
  <tr>
    <td><?php echo htmlspecialchars($director['director_id']); ?></td>
    <td><?php echo htmlspecialchars($director['director_name']); ?></td>
    <td><a  href ="shows-by-director.php?id=<?php echo htmlspecialchars($director['director_id']); ?>">Shows</a></td>
  </tr>
<?php 
}
?>
    </tbody>
  </table>
</div>
