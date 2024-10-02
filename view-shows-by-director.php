
<h1>Shows by Director</h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>    
        <th>Release Year</th>

      </tr>
    </thead>
    <tbody>
<?php
// Loop through the directors array
foreach ($shows as $show) {
?>
  <tr>
    <td><?php echo htmlspecialchars($show['show_id']); ?></td>
    <td><?php echo htmlspecialchars($show['title']); ?></td>
   <td><?php echo htmlspecialchars($show['release_year']); ?></td>

  </tr>
<?php 
}
?>
    </tbody>
  </table>
</div>
