<?php
require_once("util-db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $director_id = $_POST['director_id'];
    $director_name = $_POST['director_name'];

    $conn = get_db_connection();
    if ($conn) {
        $stmt = $conn->prepare("UPDATE director SET director_name = ? WHERE director_id = ?");
        $stmt->bind_param("si", $director_name, $director_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<script>
                alert('Director updated successfully!');
                window.location.href = 'directors.php';
              </script>";
        } else {
            echo "<script>
                alert('No changes were made.');
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
