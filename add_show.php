<?php
require_once("util-db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $release_year = $_POST['release_year'];

    $conn = get_db_connection();
    if ($conn) {
        $stmt = $conn->prepare("INSERT INTO shows (title, release_year) VALUES (?, ?)");
        $stmt->bind_param("si", $title, $release_year);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<script>
                alert('Show added successfully!');
                window.location.href = 'shows.php';
              </script>";
        } else {
            echo "<script>
                alert('Failed to add show.');
                window.location.href = 'shows.php';
              </script>";
        }

        $stmt->close();
        $conn->close();
    } else {
        die("Database connection failed.");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Show</title>
    <!-- Link to your JavaScript file for validation -->
    <script src="js/scripts.js"></script>
</head>
<body>
    <h1>Add New Show</h1>
    <form method="POST" action="add_show.php" onsubmit="return validateShowForm()">
        <div class="mb-3">
            <label for="show-title" class="form-label">Show Title</label>
            <input type="text" id="show-title" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="release-year" class="form-label">Release Year</label>
            <input type="number" id="release-year" name="release_year" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Show</button>
    </form>
</body>
</html>

<script src="scripts.js"></script> <!-- Replace 'path/to/' with the actual path -->
</body>
</html>
