<?php
function getConnection() {
    $servername = "mis4013db.mysql.database.azure.com"; 
    $username = "lylykimwin@mis4013db"; 
    $password = "UN113498602!"; 
    $dbname = "lyly_azure_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn; // Return the connection object
}
?>
