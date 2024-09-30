<?php
function get_db_connection(){
    // Create connection
    $conn = new mysqli('20.48.202.167', 'lylykimwin', 'UN113498602!', 'mis4013db');
    
    // Check connection
    if ($conn->connect_error) {
      return false;
    }
    return $conn;
}
?>
