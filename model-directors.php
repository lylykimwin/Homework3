<?php
require_once("util-db.php");

function selectDirectors() {
    $conn = getConnection(); // Get the database connection
    $sql = "SELECT director_id, director_name FROM directors"; // Your SQL query
    $result = $conn->query($sql);

    // Check if query was successful
    if (!$result) {
        error_log("SQL Error: " . $conn->error); // Log SQL error
        return []; // Return an empty array on error
    }

    $directors = []; // Initialize an array for directors
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $directors[] = $row; // Add each row to the directors array
        }
    }

    $conn->close(); // Close the database connection
    return $directors; // Return the directors array
}
?>
