<?php
function selectShowsByDirector($did) {
    $conn = get_db_connection(); 
    if (!$conn) {
        error_log("Failed to connect to the database.");
        return []; 
    }

    $sql = "
    SELECT s.show_id, s.title, s.release_year
    FROM shows s
    WHERE s.director_id = ?
    ";

    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        error_log("SQL Prepare Error: " . $conn->error);
        return []; 
    }

    $stmt->bind_param("i", $did); 

    $stmt->execute();

    $result = $stmt->get_result();

    $shows = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $shows[] = $row; 
        }
    }

    $stmt->close(); 
    $conn->close(); 
    return $shows;
}
?>
