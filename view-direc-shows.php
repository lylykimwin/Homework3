<h1>Directors with Shows</h1>

<div class="card-group">
<?php

foreach ($directors as $director) {
?>
   <div class="card">
    <div class="card-body">
      <h5 class="card-title"><?php echo htmlspecialchars($director['director_name']); ?></h5>
      <p class="card-text">
      <ul class="list-group">
<?php
  $shows = selectShowsByDirector($director['director_id']); 
  foreach ($shows as $show) {
?> 
    <li class="list-group-item"><?php echo htmlspecialchars($show['show_id']); ?> - <?php echo htmlspecialchars($show['title']); ?> - <?php echo htmlspecialchars($show['release_year']); ?></li>
<?php
  }
?>
      </ul>
      </p>
      <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
    </div>
  </div>
<?php 
}
?>
  </div>
