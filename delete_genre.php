<?php
require_once("util-db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $genre_id = $_POST['genre_id'];

    $conn = get_db_connection();
    if ($conn) {
        $stmt = $conn->prepare("DELETE FROM genres WHERE genre_id = ?");
        $stmt->bind_param("i", $genre_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<script>
                alert('Genre deleted successfully!');
                window.location.href = 'genres.php';
              </script>";
        } else {
            echo "<script>
                alert('Failed to delete genre.');
                window.location.href = 'genres.php';
              </script>";
        }

        $stmt->close();
        $conn->close();
    } else {
        die("Database connection failed.");
    }
}
?>
