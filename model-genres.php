<?php
require_once("util-db.php");

function selectGenres() {
    $conn = get_db_connection();
    if (!$conn) {
        die("Database connection failed.");
    }

    $sql = "
        SELECT 
            g.genre_id, 
            g.genre_name, 
            COUNT(s.show_id) AS num_shows
        FROM genres g
        LEFT JOIN shows s ON g.genre_id = s.genre_id
        GROUP BY g.genre_id, g.genre_name;
    ";
    $result = $conn->query($sql);

    $genres = [];
    if ($result && $result->num_rows > 0) {
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
