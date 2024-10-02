
<?php
require_once("util-db.php");

function selectShowsByDirector($did) {
    $conn = get_db_connection(); // Use get_db_connection() to get the database connection
    if (!$conn) {
        error_log("Failed to connect to the database.");
        return []; // Return an empty array if the connection fails
    }

    $sql = "SELECT s.show_id, s.title, s.release_year, c.cast_name
FROM shows s
JOIN casts c ON c.show_id = s.show_id
WHERE s.show_id = ?"; // Your SQL query
    $stmt->bind_param("i", $did);
  
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
