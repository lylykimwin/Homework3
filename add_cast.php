<?php
require_once("util-db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cast_name = $_POST['cast_name'];
    $show_id = $_POST['show_id'];

    $conn = get_db_connection();
    if ($conn) {
        $stmt = $conn->prepare("INSERT INTO casts (cast_name, show_id) VALUES (?, ?)");
        $stmt->bind_param("si", $cast_name, $show_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<script>
                alert('Cast member added successfully!');
                window.location.href = 'casts.php';
              </script>";
        } else {
            echo "<script>
                alert('Failed to add cast member.');
                window.location.href = 'casts.php';
              </script>";
        }

        $stmt->close();
        $conn->close();
    } else {
        die("Database connection failed.");
    }
}
?>
