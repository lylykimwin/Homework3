<?php
require_once("util-db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $release_year = $_POST['release_year'];

    $conn = get_db_connection();
    if ($conn) {
        $stmt = $conn->prepare("INSERT INTO shows (title, release_year) VALUES (?, ?)");
        $stmt->bind_param("si", $title, $release_year);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<script>
                alert('Show added successfully!');
                window.location.href = 'shows.php';
              </script>";
        } else {
            echo "<script>
                alert('Failed to add show.');
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
