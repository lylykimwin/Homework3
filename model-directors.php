<?php
require_once("util-db.php");

function selectDirectors() {
    // Get the database connection
    $conn = get_db_connection();

    if (!$conn) {
        die("Database connection failed.");
    }

    // Prepare and execute the SQL query
    $sql = "SELECT director_id, director_name FROM directors";
    $result = $conn->query($sql);

    $directors = [];
    if ($result && $result->num_rows > 0) {
        // Fetch data
        while ($row = $result->fetch_assoc()) {
            $directors[] = $row;
        }
    }

    // Close the result set and the connection
    if ($result) {
        $result->close();
    }

    $conn->close();

    return $directors;
}
?>
