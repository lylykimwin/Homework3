<h1>Genres</h1>

<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Genre Name</th>
        <th>Show Title</th> <!-- Show title associated with the genre -->
        <th>Actions</th> <!-- For Edit/Delete actions -->
      </tr>
    </thead>
    <tbody>
      <?php foreach ($genres as $genre) { ?>
        <tr>
          <td><?php echo htmlspecialchars($genre['genre_id']); ?></td>
          <td><?php echo htmlspecialchars($genre['genre_name']); ?></td>
          <td><?php echo htmlspecialchars($show['title']); ?></td>
          <td>
            <!-- Edit Button to trigger modal -->
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editGenreModal<?php echo $genre['genre_id']; ?>">Edit</button>

            <!-- Delete Button Form -->
            <form method="POST" action="delete_genre.php" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this genre?');">
              <input type="hidden" name="genre_id" value="<?php echo $genre['genre_id']; ?>">
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </td>
        </tr>

        <!-- Edit Genre Modal -->
        <div class="modal fade" id="editGenreModal<?php echo $genre['genre_id']; ?>" tabindex="-1" aria-labelledby="editGenreLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <form method="POST" action="edit_genre.php">
                <div class="modal-header">
                  <h5 class="modal-title" id="editGenreLabel">Edit Genre</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <input type="hidden" name="genre_id" value="<?php echo $genre['genre_id']; ?>">
                  <div class="mb-3">
                    <label for="genreName" class="form-label">Genre Name</label>
                    <input type="text" class="form-control" id="genreName" name="genre_name" value="<?php echo $genre['genre_name']; ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="showId" class="form-label">Show ID</label>
                    <input type="number" class="form-control" id="showId" name="show_id" value="<?php echo $genre['show_id']; ?>" required>
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
      <?php } ?>
    </tbody>
  </table>
</div>

<!-- Add Genre Button -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addGenreModal">
  Add Genre
</button>

<!-- Modal for Adding a Genre -->
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
            <label for="showId" class="form-label">Show ID</label>
            <input type="number" class="form-control" id="showId" name="show_id" required>
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
