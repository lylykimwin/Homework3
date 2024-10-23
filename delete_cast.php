<?php
require_once("util-db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cast_id = $_POST['cast_id'];

    $conn = get_db_connection();
    if ($conn) {
        $stmt = $conn->prepare("DELETE FROM casts WHERE cast_id = ?");
        $stmt->bind_param("i", $cast_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<script>
                alert('Cast member deleted successfully!');
                window.location.href = 'casts.php';
              </script>";
        } else {
            echo "<script>
                alert('Failed to delete cast member.');
                window.location.href = 'casts.php';
              </script>";
        }

        $stmt->close
