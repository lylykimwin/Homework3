
<h1>Directors with Shows</h1>

<div class="card-group">
<?php

foreach ($directors as $director) {
?>
   <div class="card">
    <div class="card-body">
      <h5 class="card-title"><?php echo htmlspecialchars($director['director_name']); ?></h5>
      <p class="card-text">
<?php
  $shows = selectShowsByDirector($director['director_id']);
  while ($show = $shows->fetch_assoc()) {
?> 
<?php
  }
?>
      </p>
      <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
    </div>
  </div>
<?php 
}
?>
  </div>
