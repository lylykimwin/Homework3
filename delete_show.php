<?php
require_once("util-db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $show_id = $_POST['show_id'];

    $conn = get_db_connection();
    if ($conn) {
        $stmt = $conn->prepare("DELETE FROM shows WHERE show_id = ?");
        $stmt->bind_param("i", $show_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<script>
                alert('Show deleted successfully!');
                window.location.href = 'shows.php';
              </script>";
        } else {
            echo "<script>
                alert('Failed to delete show.');
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
