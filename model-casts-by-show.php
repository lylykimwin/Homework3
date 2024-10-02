<?php
require_once("util-db.php");

function selectCastsByShow($show_id) {
    $conn = get_db_connection(); 
    if (!$conn) {
        error_log("Failed to connect to the database.");
        return []; 
    }

    $sql = "SELECT cast_name FROM casts WHERE show_id = ?"; // Your SQL query

    $stmt = $conn->prepare($sql);
  
    if (!$stmt) {
        error_log("SQL Prepare Error: " . $conn->error); // Log SQL error
        return []; 
    }


    $stmt->bind_param("i", $show_id); 

    $stmt->execute();

    $result = $stmt->get_result();

    $casts = []; 
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $casts[] = $row; 
        }
    }

    $stmt->close(); 
    $conn->close(); 
    return $casts; 
}
?>
