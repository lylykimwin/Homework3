<?php
require_once("util-db.php");

function selectShowsByDirector($did) {
    $conn = get_db_connection(); // Use get_db_connection() to get the database connection
    if (!$conn) {
        error_log("Failed to connect to the database.");
        return []; // Return an empty array if the connection fails
    }

    $sql = "SELECT s.show_id, s.title, s.release_year 
            FROM shows s
            JOIN shows_directors sd ON s.show_id = sd.show_id
            WHERE sd.director_id = ?"; // Change this to the correct column if needed

    // Prepare the statement
    $stmt = $conn->prepare($sql);
    
    // Check if the preparation was successful
    if (!$stmt) {
        error_log("SQL Prepare Error: " . $conn->error); // Log SQL error
        return []; // Return an empty array on error
    }

    // Bind parameters
    $stmt->bind_param("i", $did); // Assuming $did is an integer (director ID)

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    $shows = []; // Initialize an array for shows
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $shows[] = $row; // Add each row to the shows array
        }
    }

    $stmt->close(); // Close the prepared statement
    $conn->close(); // Close the database connection
    return $shows; // Return the shows array
}
?>
