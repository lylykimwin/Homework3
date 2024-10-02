<?php
require_once("util-db.php");

function getShowById($show_id) {
    $conn = get_db_connection();
    if (!$conn) {
        die("Database connection failed.");
    }

    $sql = "SELECT show_id, title, release_year FROM shows WHERE show_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $show_id); // Assuming show_id is an integer
    $stmt->execute();
    $result = $stmt->get_result();

    $show = null;
    if ($result && $result->num_rows > 0) {
        $show = $result->fetch_assoc();
    }

    $stmt->close();
    $conn->close();

    return $show;
}
?>
