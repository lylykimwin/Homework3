<?php
require_once("util-db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $director_id = $_POST['director_id'];

    $conn = get_db_connection();
    if ($conn) {
        $stmt = $conn->prepare("DELETE FROM director WHERE director_id = ?");
        $stmt->bind_param("i", $director_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<script>
                alert('Director deleted successfully!');
                window.location.href = 'directors.php';
              </script>";
        } else {
            echo "<script>
                alert('Failed to delete director.');
                window.location.href = 'directors.php';
              </script>";
        }

        $stmt->close();
        $conn->close();
    } else {
        die("Database connection failed.");
    }
}
?>
