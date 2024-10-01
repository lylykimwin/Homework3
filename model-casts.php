<?php
require_once("util-db.php");

function selectCasts() {
    $conn = getConnection(); // Get the database connection
    $sql = "SELECT cast_id, cast_name FROM casts"; // Your SQL query
    $result = $conn->query($sql);

    // Check if query was successful
    if (!$result) {
        error_log("SQL Error: " . $conn->error); // Log SQL error
        return []; // Return an empty array on error
    }

    $casts = []; // Initialize an array for casts
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $casts[] = $row; // Add each row to the casts array
        }
    }

    $conn->close(); // Close the database connection
    return $casts; // Return the casts array
}
?>
