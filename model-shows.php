<?php
require_once("util-db.php");

function selectShows() {
    $conn = getConnection(); // Get the database connection
    $sql = "SELECT show_id, title, release_year FROM shows"; // Your SQL query
    $result = $conn->query($sql);

    // Check if query was successful
    if (!$result) {
        error_log("SQL Error: " . $conn->error); // Log SQL error
        return []; // Return an empty array on error
    }

    $shows = []; // Initialize an array for shows
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $shows[] = $row; // Add each row to the shows array
        }
    }

    $conn->close(); // Close the database connection
    return $shows; // Return the shows array
}
?>
