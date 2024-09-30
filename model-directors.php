<?php
function selectDirectors() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT director_id, director_name FROM directors");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
?>
