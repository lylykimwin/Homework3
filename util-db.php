<?php
function getConnection() {
    $servername = "mis4013db.mysql.database.azure.com"; // Your server name
    $username = "lylykimwin@mis4013db"; // Your username
    $password = "UN113498602!"; // Your MySQL password
    $dbname = "lyly_azure_db"; // Your database name
    $port = 3306; // The port MySQL is using
    $flags = MYSQLI_CLIENT_SSL; // SSL flag for the connection

    // Correct MySQLi connection using 6 arguments (with SSL flag)
    $conn = new mysqli($servername, $username, $password, $dbname, $port, null, $flags);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn; // Return the connection object
}
