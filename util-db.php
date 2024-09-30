<?php
function getConnection() {
    $servername = "mis4013db.mysql.database.azure.com"; // Your server name
    $username = "lylykimwin@mis4013db"; // Your username (include the server name)
    $password = "UN113498602!"; // Your MySQL password
    $dbname = "lyly_azure_db"; // Your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the connection is still alive
    if (!$conn->ping()) {
        // Attempt to reconnect if connection is lost
        $conn->close();
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Reconnection failed: " . $conn->connect_error);
        }
    }

    return $conn; // Return the connection object
}
?>
