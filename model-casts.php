function selectCastsByShow($show_id) {
    $conn = get_db_connection();
    if (!$conn) {
        die("Database connection failed.");
    }

    $sql = "SELECT cast_name FROM casts WHERE show_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $show_id);
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
