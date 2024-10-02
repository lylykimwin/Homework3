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

function selectShowsByDirector($did) {
    $conn = get_db_connection();
    if (!$conn) {
        error_log("Failed to connect to the database.");
        return []; 
    }

$sql = "
SELECT s.show_id, s.title, s.release_year, c.cast_name
FROM shows s
JOIN casts c ON s.show_id = c.show_id
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
