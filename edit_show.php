<?php
require_once("util-db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $show_id = $_POST['show_id'];
    $title = $_POST['title'];
    $release_year = $_POST['release_year'];

    $conn = get_db_connection();
    if ($conn) {
        $stmt = $conn->prepare("UPDATE shows SET title = ?, release_year = ? WHERE show_id = ?");
        $stmt->bind_param("sii", $title, $release_year, $show_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<script>
                alert('Show updated successfully!');
                window.location.href = 'shows.php';
              </script>";
        } else {
            echo "<script>
                alert('No changes were made.');
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
