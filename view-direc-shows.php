<h1>Directors with Shows</h1>

<div class="container">
  <div class="row">
    <?php foreach ($directors as $director) { ?>
      <div class="col-md-4">
        <div class="card mb-4">
          <div class="card-body">

            <h5 class="card-title" onclick="toggleDirectorDetails(<?php echo $director['director_id']; ?>)" style="cursor: pointer;">
              <?php echo htmlspecialchars($director['director_name']); ?>
            </h5>
            <!-- Details section, initially hidden -->
            <div id="details-<?php echo $director['director_id']; ?>" style="display: none;">
              <ul class="list-group">
                <?php
                $shows = selectShowsByDirector($director['director_id']);
                if (!empty($shows)) {
                  foreach ($shows as $show) { ?>
                    <li class="list-group-item">
                      <?php echo htmlspecialchars($show['title']); ?> (<?php echo htmlspecialchars($show['release_year']); ?>)
                    </li>
                  <?php }
                } else { ?>
                  <li class="list-group-item">No shows available</li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
