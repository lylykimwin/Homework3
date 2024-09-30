<h1>Directors</h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
      <th>ID</th>
      <th>Name</th>        
      </tr>
    <thead>
    <tbody>
<?php
while($Director = $directors->fetch_assoc()) {
?>
  <tr>
    <td><?php echo $director['director_id']; ?></td>
    <td><?php echo $director['director_name']; ?></td>
  </tr>
<?php 
}
?>
    </tbody>
  </table>
</div>
