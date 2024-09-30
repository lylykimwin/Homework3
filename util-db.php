<?php
function getConnection() {
    $servername = "mis4013db.mysql.database.azure.com"; // Your server name
    $username = "lylykimwin@mis4013db"; // Your username (include the server name)
    $password = "your-password"; // Your MySQL password
    $dbname = "lyly_azure_db"; // Your database name

    // MySQLi connection with SSL enabled
    $conn = new mysqli($servername, $username, $password, $dbname, 3306, null, MYSQLI_CLIENT_SSL);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn; // Return the connection object
}
?>
