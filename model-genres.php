<?php
require_once("util-db.php");

// Function to select all genres and their associated shows
function selectGenres() {
    $conn = get_db_connection();
    if (!$conn) {
        die("Database connection failed.");
    }

    // SQL query to retrieve genres and their associated shows
    $sql = "
        SELECT g.genre_id, g.genre_name, s.title AS show_title, s.show_id
        FROM genres g
        JOIN shows s ON g.show_id = s.show_id
    ";
    $result = $conn->query($sql);

    $genres = [];
    if ($result && $result->num_rows > 0) {
        // Fetch the data
        while ($row = $result->fetch_assoc()) {
            $genres[] = $row;
        }
    }

    if ($result) {
        $result->close();
    }

    $conn->close();

    return $genres;
}

// Function to get a genre by its ID
function getGenreById($genre_id) {
    $conn = get_db_connection();
    if (!$conn) {
        die("Database connection failed.");
    }

    $sql = "SELECT genre_id, genre_name, show_id FROM genres WHERE genre_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $genre_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $genre = null;
    if ($result && $result->num_rows > 0) {
        $genre = $result->fetch_assoc();
    }

    $stmt->close();
    $conn->close();

    return $genre;
}
?>
