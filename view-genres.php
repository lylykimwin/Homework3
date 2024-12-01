<?php
require_once("model-shows.php");
?>

<h1>Genres</h1>

<div class="table-responsive">
  <!-- DataTable -->
  <table id="genresTable" class="table">
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
            <!-- Edit Button -->
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editGenreModal<?php echo $genre['genre_id']; ?>">Edit</button>
            
            <!-- Delete Form -->
            <form method="POST" action="delete_genre.php" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this genre?');">
              <input type="hidden" name="genre_id" value="<?php echo $genre['genre_id']; ?>">
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<!-- Add Chart Section -->
<div class="my-4">
  <h2>Genres Overview</h2>
  <canvas id="genresChart" width="400" height="200"></canvas>
</div>

<script>
  // DataTable Initialization
  $(document).ready(function () {
    $('#genresTable').DataTable();
  });

  // Prepare Data for Chart.js
  const genreData = <?php echo json_encode($genres); ?>;
  const labels = genreData.map(genre => genre.genre_name);
  const showCounts = genreData.map(genre => genre.num_shows || 0); // Ensure `num_shows` exists

  // Initialize Chart.js
  const ctx = document.getElementById('genresChart').getContext('2d');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: labels,
      datasets: [{
        label: 'Number of Shows',
        data: showCounts,
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
