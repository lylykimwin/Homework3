<?php
function getConnection() {
    $servername = "mis4013db.mysql.database.azure.com:3306"; // e.g., "localhost" or your Azure MySQL server
    $username = "lylykimwin";           // Your database username
    $password = "UN113498602!";            // Your database password
    $dbname = "lyly azure db";         // Your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn; // Return the connection object
}
?>
