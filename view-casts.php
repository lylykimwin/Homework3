<h1>Cast Members</h1>

<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Cast Name</th>
        <th>Show ID</th> <!-- Show ID only, as per your schema -->
        <th>Actions</th> <!-- For Edit/Delete actions -->
      </tr>
    </thead>
    <tbody>
      <?php foreach ($casts as $cast) { ?>
        <tr>
          <td><?php echo htmlspecialchars($cast['cast_id']); ?></td>
          <td><?php echo htmlspecialchars($cast['cast_name']); ?></td>
          <td><?php echo htmlspecialchars($cast['show_id']); ?></td>
          <td>
            <!-- Edit Button to trigger modal -->
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editCastModal<?php echo $cast['cast_id']; ?>">Edit</button>

            <!-- Delete Button Form -->
            <form method="POST" action="delete_cast.php" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this cast member?');">
              <input type="hidden" name="cast_id" value="<?php echo $cast['cast_id']; ?>">
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </td>
        </tr>

        <!-- Edit Cast Modal -->
        <div class="modal fade" id="editCastModal<?php echo $cast['cast_id']; ?>" tabindex="-1" aria-labelledby="editCastLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <form method="POST" action="edit_cast.php">
                <div class="modal-header">
                  <h5 class="modal-title" id="editCastLabel">Edit Cast</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <input type="hidden" name="cast_id" value="<?php echo $cast['cast_id']; ?>">
                  <div class="mb-3">
                    <label for="castName" class="form-label">Cast Name</label>
                    <input type="text" class="form-control" id="castName" name="cast_name" value="<?php echo $cast['cast_name']; ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="showId" class="form-label">Show ID</label>
                    <input type="number" class="form-control" id="showId" name="show_id" value="<?php echo $cast['show_id']; ?>" required>
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

<!-- Add Cast Button -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCastModal">
  Add Cast
</button>

<!-- Modal for Adding a Cast -->
<div class="modal fade" id="addCastModal" tabindex="-1" aria-labelledby="addCastLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="add_cast.php">
        <div class="modal-header">
          <h5 class="modal-title" id="addCastLabel">Add Cast</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="castName" class="form-label">Cast Name</label>
            <input type="text" class="form-control" id="castName" name="cast_name" required>
          </div>
          <div class="mb-3">
            <label for="showId" class="form-label">Show ID</label>
            <input type="number" class="form-control" id="showId" name="show_id" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add Cast</button>
        </div>
      </form>
    </div>
  </div>
</div>
