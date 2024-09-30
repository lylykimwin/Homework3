<?php
function getConnection() {
    $servername = "mis4013db.mysql.database.azure.com"; // Your server name
    $username = "lylykimwin@mis4013db"; // Your username (include the server name)
    $password = "your-password"; // Your MySQL password
    $dbname = "lyly_azure_db"; // Correct database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn; // Return the connection object
}
?>
