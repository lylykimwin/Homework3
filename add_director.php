<?php
require_once("util-db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $director_name = $_POST['director_name'];

    $conn = get_db_connection();
    if ($conn) {
        $stmt = $conn->prepare("INSERT INTO director (director_name) VALUES (?)");
        $stmt->bind_param("s", $director_name);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<script>
                alert('Director added successfully!');
                window.location.href = 'directors.php';
              </script>";
        } else {
            echo "<script>
                alert('Failed to add director.');
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
