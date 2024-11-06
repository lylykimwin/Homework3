<h1>Directors with Shows</h1>

<div class="container">
  <div class="row">
    <?php foreach ($directors as $director) { ?>
      <div class="col-md-4">
        <div class="card mb-4">
          <div class="card-body">
            <!-- Make director's name clickable to toggle shows -->
            <h5 class="card-title" onclick="toggleDirectorDetails(<?php echo $director['director_id']; ?>)" style="cursor: pointer;">
              <?php echo htmlspecialchars($director['director_name']); ?>
            </h5>
            <p class="card-text">
              <!-- Show list wrapper with unique ID based on director_id -->
              <div id="details-<?php echo $director['director_id']; ?>" style="display: none;">
                <ul class="list-group">
                  <?php
                  $shows = selectShowsByDirector($director['director_id']);
                  foreach ($shows as $show) {
                  ?> 
                    <li class="list-group-item">
                      <?php echo htmlspecialchars($show['title']); ?> (<?php echo htmlspecialchars($show['release_year']); ?>)
                    </li>
                  <?php } ?>
                </ul>
              </div>
            </p>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
