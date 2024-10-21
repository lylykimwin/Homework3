<h1>Shows</h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Release Year</th>
        <th>Actions</th> <!-- Edit/Delete actions -->
      </tr>
    </thead>
    <tbody>
      <?php foreach ($shows as $show) { ?>
        <tr>
          <td><?php echo htmlspecialchars($show['show_id']); ?></td>
          <td><?php echo htmlspecialchars($show['title']); ?></td>
          <td><?php echo htmlspecialchars($show['release_year']); ?></td>
          <td>
              
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editShowModal<?php echo $show['show_id']; ?>">Edit</button>

            <form method="POST" action="delete_show.php" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this show?');">
              <input type="hidden" name="show_id" value="<?php echo $show['show_id']; ?>">
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </td>
        </tr>

        <div class="modal fade" id="editShowModal<?php echo $show['show_id']; ?>" tabindex="-1" aria-labelledby="editShowLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <form method="POST" action="edit_show.php">
                <div class="modal-header">
                  <h5 class="modal-title" id="editShowLabel">Edit Show</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <input type="hidden" name="show_id" value="<?php echo $show['show_id']; ?>">
                  <div class="mb-3">
                    <label for="title" class="form-label">Show Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $show['title']; ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="releaseYear" class="form-label">Release Year</label>
                    <input type="number" class="form-control" id="releaseYear" name="release_year" value="<?php echo $show['release_year']; ?>" required>
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

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addShowModal">
  Add Show
</button>

<div class="modal fade" id="addShowModal" tabindex="-1" aria-labelledby="addShowLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="add_show.php">
        <div class="modal-header">
          <h5 class="modal-title" id="addShowLabel">Add Show</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="title" class="form-label">Show Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
          </div>
          <div class="mb-3">
            <label for="releaseYear" class="form-label">Release Year</label>
            <input type="number" class="form-control" id="releaseYear" name="release_year" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add Show</button>
        </div>
      </form>
    </div>
  </div>
</div>
