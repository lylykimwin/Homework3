<h1>Directors with Shows</h1>

<div class="container">
  <div class="row">
    <?php foreach ($directors as $director) { ?>
      <div class="col-md-4">
        <div class="card mb-4">
          <div class="card-body">
            <h5 class="card-title"><?php echo htmlspecialchars($director['director_name']); ?></h5>
            <p class="card-text">
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
            </p>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
