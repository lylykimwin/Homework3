<?php
require_once("util-db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cast_id = $_POST['cast_id'];
    $cast_name = $_POST['cast_name'];
    $show_id = $_POST['show_id'];

    $conn = get_db_connection();
    if ($conn) {
        $stmt = $conn->prepare("UPDATE casts SET cast_name = ?, show_id = ? WHERE cast_id = ?");
        $stmt->bind_param("sii", $cast_name, $show_id, $cast_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<script>
                alert('Cast member updated successfully!');
                window.location.href = 'casts.php';
              </script>";
        } else {
            echo "<script>
                alert('No changes were made.');
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
