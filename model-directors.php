<?php
require_once("util-db.php");

function selectDirectors() {
  
    $conn = get_db_connection();

    if (!$conn) {
        die("Database connection failed.");
    }

    $sql = "SELECT director_id, director_name FROM director";
    $result = $conn->query($sql);

    $directors = [];
    if ($result && $result->num_rows > 0) {
        // Fetch data
        while ($row = $result->fetch_assoc()) {
            $directors[] = $row;
        }
    }

    if ($result) {
        $result->close();
    }

    $conn->close();

    return $directors;
}
?>
