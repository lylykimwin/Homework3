<?php
require_once("model-shows.php");
?>

<h1>Genres</h1>

<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Genre Name</th>
        <th>Show Title</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($genres as $genre) { ?>
        <tr>
          <td><?php echo htmlspecialchars($genre['genre_id']); ?></td>
          <td><?php echo htmlspecialchars($genre['genre_name']); ?></td>
          <td><?php echo htmlspecialchars($genre['show_title']); ?></td>
          <td>

            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editGenreModal<?php echo $genre['genre_id']; ?>">Edit</button>

            <form method="POST" action="delete_genre.php" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this genre?');">
              <input type="hidden" name="genre_id" value="<?php echo $genre['genre_id']; ?>">
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </td>
        </tr>

        <div class="modal fade" id="editGenreModal<?php echo $genre['genre_id']; ?>" tabindex="-1" aria-labelledby="editGenreLabel<?php echo $genre['genre_id']; ?>" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <form method="POST" action="edit_genre.php">
                <div class="modal-header">
                  <h5 class="modal-title" id="editGenreLabel<?php echo $genre['genre_id']; ?>">Edit Genre</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <input type="hidden" name="genre_id" value="<?php echo $genre['genre_id']; ?>">
                  <div class="mb-3">
                    <label for="genreName" class="form-label">Genre Name</label>
                    <input type="text" class="form-control" id="genreName" name="genre_name" value="<?php echo htmlspecialchars($genre['genre_name']); ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="showId" class="form-label">Show</label>
                    <select name="show_id" class="form-select" required>
                      <option value="">Select Show</option>
                      <?php
                      $shows = selectShows();  // Fetch all shows from the Shows table
                      if (empty($shows)) {
                          echo "<option value=''>No shows available</option>";
                      } else {
                          foreach ($shows as $show) {
                              // If this show is currently associated with the genre, mark it as selected
                              $selected = $show['show_id'] == $genre['show_id'] ? "selected" : "";
                              echo "<option value='" . $show['show_id'] . "' $selected>" . htmlspecialchars($show['title']) . "</option>";
                          }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>

      <?php } ?> <!-- Closing foreach loop -->
    </tbody>
  </table>
</div>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addGenreModal">
  Add Genre
</button>

<div class="modal fade" id="addGenreModal" tabindex="-1" aria-labelledby="addGenreLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="add_genre.php">
        <div class="modal-header">
          <h5 class="modal-title" id="addGenreLabel">Add Genre</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="genreName" class="form-label">Genre Name</label>
            <input type="text" class="form-control" id="genreName" name="genre_name" required>
          </div>
          <div class="mb-3">
            <label for="showId" class="form-label">Show</label>
            <select name="show_id" class="form-select" required>
              <option value="">Select Show</option>
              <?php
              $shows = selectShows();  // Fetch all shows from the Shows table
              foreach ($shows as $show) {
                  echo "<option value='" . $show['show_id'] . "'>" . htmlspecialchars($show['title']) . "</option>";
              }
              ?>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add Genre</button>
        </div>
      </form>
    </div>
  </div>
</div>
