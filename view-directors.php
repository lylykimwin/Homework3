<h1>Directors</h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th> 
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($directors as $director) { ?>
      <tr>
        <td><?php echo htmlspecialchars($director['director_id']); ?></td>
        <td><?php echo htmlspecialchars($director['director_name']); ?></td>
        <td>
          <!-- Edit Button -->
          <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editDirectorModal<?php echo $director['director_id']; ?>">Edit</button>

          <!-- Delete Form with custom confirmation -->
          <form method="POST" action="delete_director.php" style="display:inline;" 
                onsubmit="return confirmDirectorDeletion('<?php echo htmlspecialchars($director['director_name']); ?>');">
            <input type="hidden" name="director_id" value="<?php echo $director['director_id']; ?>">
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </td>
      </tr>

      <!-- Edit Director Modal -->
      <div class="modal fade" id="editDirectorModal<?php echo $director['director_id']; ?>" tabindex="-1" aria-labelledby="editDirectorLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form method="POST" action="edit_director.php">
              <div class="modal-header">
                <h5 class="modal-title" id="editDirectorLabel">Edit Director</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <input type="hidden" name="director_id" value="<?php echo $director['director_id']; ?>">
                <div class="mb-3">
                  <label for="directorName" class="form-label">Director Name</label>
                  <input type="text" class="form-control" id="directorName" name="director_name" value="<?php echo $director['director_name']; ?>" required>
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

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDirectorModal">
  Add Director
</button>

<div class="modal fade" id="addDirectorModal" tabindex="-1" aria-labelledby="addDirectorLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="add_director.php">
        <div class="modal-header">
          <h5 class="modal-title" id="addDirectorLabel">Add Director</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="directorName" class="form-label">Director Name</label>
            <input type="text" class="form-control" id="directorName" name="director_name" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add Director</button>
        </div>
      </form>
    </div>
  </div>
</div>
