<?php
function get_db_connection(){
    // Create connection
    $conn = new mysqli('mis4013db.mysql.database.azure.com', 'lylykimwin', 'UN113498602!', 'mis4013db');
    
    // Check connection
    if ($conn->connect_error) {
      return false;
    }
    return $conn;
}
?>
