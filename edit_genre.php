<?php
require_once("util-db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $genre_name = $_POST['genre_name'];
    $show_id = $_POST['show_id'];

    $conn = get_db_connection();
    if ($conn) {
        $stmt = $conn->prepare("INSERT INTO genres (genre_name, show_id) VALUES (?, ?)");
        $stmt->bind_param("si", $genre_name, $show_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<script>
                alert('Genre added successfully!');
                window.location.href = 'genres.php';
              </script>";
        } else {
            echo "<script>
                alert('Failed to add genre.');
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
