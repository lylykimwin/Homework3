<?php
require_once("util-db.php");

function selectCasts() {
    $conn = get_db_connection();
    if (!$conn) {
        die("Database connection failed.");
    }

    $sql = "
        SELECT cast_id, cast_name, show_id 
        FROM casts
    ";
    $result = $conn->query($sql);

    $casts = [];
    if ($result && $result->num_rows > 0) {
        // Fetch the data
        while ($row = $result->fetch_assoc()) {
            $casts[] = $row;
        }
    }

    if ($result) {
        $result->close();
    }

    $conn->close();

    return $casts;
}

function getCastById($cast_id) {
    $conn = get_db_connection();
    if (!$conn) {
        die("Database connection failed.");
    }

    $sql = "SELECT cast_id, cast_name, show_id FROM casts WHERE cast_id = ?";
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
