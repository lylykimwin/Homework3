<?php
require_once("util-db.php");

function selectCasts() {
    $conn = get_db_connection(); 
    if (!$conn) {
        error_log("Failed to connect to the database.");
        return []; 
    }

    $sql = "SELECT cast_id, cast_name, show_id FROM casts";
    $result = $conn->query($sql);

    // Check if query was successful
    if (!$result) {
        error_log("SQL Error: " . $conn->error);
        return [];
    }

    $casts = []; 
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $casts[] = $row;
        }
    }

    $conn->close();
    return $casts; 
}

// Function to get a cast by ID
function getCastById($cast_id) {
    $conn = get_db_connection();
    if (!$conn) {
        die("Database connection failed.");
    }

    $sql = "SELECT cast_id, cast_name FROM casts WHERE cast_id = ?"; 
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $cast_id); 
    $stmt->execute();
    $result = $stmt->get_result();

    $cast = null;
    if ($result && $result->num_rows > 0) {
        $cast = $result->fetch_assoc();
    }

    $stmt->close();
    $conn->close();

    return $cast;
}
?>
