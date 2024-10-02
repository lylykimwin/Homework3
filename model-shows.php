<?php
require_once("util-db.php");

function selectShows() {
    $conn = get_db_connection(); 
    if (!$conn) {
        error_log("Failed to connect to the database.");
        return []; 
    }

    $sql = "SELECT show_id, title, release_year FROM shows";
    $result = $conn->query($sql);

    // Check if query was successful
    if (!$result) {
        error_log("SQL Error: " . $conn->error);
        return [];
    }

    $shows = []; 
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $shows[] = $row;
        }
    }

    $conn->close();
    return $shows; 
}

function getShowById($show_id) {
    $conn = get_db_connection();
    if (!$conn) {
        die("Database connection failed.");
    }

    $sql = "SELECT show_id, title, release_year FROM shows WHERE show_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $show_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $show = null;
    if ($result && $result->num_rows > 0) {
        $show = $result->fetch_assoc();
    }

    $stmt->close();
    $conn->close();

    return $show;
}

function selectShowsByDirector($did) {
    $conn = get_db_connection();
    if (!$conn) {
        error_log("Failed to connect to the database.");
        return []; 
    }

    $sql = "
    SELECT s.show_id, s.title, s.release_year
    FROM shows s
    WHERE s.director_id = ?";
    
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        error_log("SQL Prepare Error: " . $conn->error);
        return [];
    }


    $stmt->bind_param("i", $did);
    $stmt->execute();
    $result = $stmt->get_result();

    $shows = []; // Initialize an array for shows
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
